<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET,POST,PUT");
header("Access-Control-Allow-Headers: *");
header("Content-Type: application/json");

$dummyData=["data"=>[["id"=>1,"name"=>"Reuben","age"=>33,"sex"=>"male"],["id"=>2,"name"=>"Jeremy","age"=>27,"sex"=>"male"],["id"=>3,"name"=>"Amandine","age"=>24,"sex"=>"female"],["id"=>4,"name"=>"Cecile","age"=>40,"sex"=>"female"]]];
    
echo json_encode($dummyData);

?>