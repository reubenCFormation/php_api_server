<?php
 

    
require_once('../vendor/autoload.php');
require_once('../controller/HomeController.php');

// ici je vais definir l'url du point d'entreé de mon application
$basePath=dirname($_SERVER["SCRIPT_NAME"]);

$router=new AltoRouter();
// ici je vais dire a mon routeur d'ecouter a partir de ce chemin de base
$router->setBasePath($basePath);


// ici je vais mapper mes chemins differentes qui vont declencher des actions selon la route
$router->map("GET","/",["HomeController","welcomeMessage"]);
$router->map("GET","/json",["HomeController","sampleJson"]);
$router->map("GET","/users/all",["HomeController","findAllUsers"]);
$router->map("GET","/users/find/[i:id]",["HomeController","findUser"]);
$router->map("POST","/user/insert",["HomeController","insertUser"]);

$getMatch=$router->match();



// ici si une route a bien matché dans mon url, je vais pouvoir recuperer les informations de cette route mappé qui contiendra la classe et l'action a effectuer
if($getMatch){
    echo '<pre>';
    var_dump($getMatch);
    echo '</pre>';
    $controller=$getMatch["target"][0];
    $action=$getMatch["target"][1];

    $newController=new $controller();

    if($getMatch["params"]){
        $params=$getMatch["params"]["id"];
        $newController->$action($params);
    }

    else{
       
        $newController->$action();
       
    }
}





?>