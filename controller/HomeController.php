<?php
require_once("Connect.php");
class HomeController{

 
    public function findAllUsers(){
        $db=Connect::connectToDB();
        $sql="SELECT * FROM users";
        $statement=$db->query($sql);
        $users=$statement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($users);
    }

    public function insertUser(){
        // ici je vais recuperer le corps de la requette qui a etait envoyé par le client. En l'occurence, elle va contenir toutes les informations par rapport a l'utilisateur que je souhaite inserer qui aurai etait defini par mon client.
        $data=json_decode(file_get_contents('php://input'),true);
    
        $sql="INSERT INTO users (firstname,lastname,email,password,description) VALUES (?,?,?,?,?)";
        $db=Connect::connectToDB();
        $statement=$db->prepare($sql);
        $hash=password_hash($data["password"],PASSWORD_BCRYPT);
        $statement->execute([$data["firstname"],$data["lastname"],$data["email"],$hash,$data["description"]]);
        echo json_encode(["message"=>"User Inserted !"]);
           
    }

 
    public function findUser($id){
        $db=Connect::connectTODB();
        $sql="SELECT * FROM users WHERE id=?";
        $statement=$db->prepare($sql);
        $statement->execute([$id]);
        $user=$statement->fetch(PDO::FETCH_ASSOC);
        echo json_encode($user);
    }
}

?>