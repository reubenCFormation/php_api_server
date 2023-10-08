<?php
class Connect{
    public static function connectTODB(){
        $host="localhost";
        $username="root";
        $port=3306;
        $database="serie1_exo_1_solution";
        $password="";

        $pdo=new PDO("mysql:host=$host;dbname=$database;port=$port",$username,$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}

?>