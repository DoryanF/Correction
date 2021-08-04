<?php
session_start();

use dao\UserDao;
use model\User;

include "../../vendor/autoload.php";

try{
    
    $resultDao = new UserDao();
    $listUsers = $resultDao->selectAllUser();
    // foreach($listUsers as $key => $user){
    //     $listUsers[$key] = (new User())
    //     ->setId_user($user["id"])
    //     ->setNom($user["nom"])
    //     ->setPrenom($user["prenom"])
    //     ->setPseudo($user["pseudo"])
    //     ->setMail($user["mail"])
    //     ->setDate_crea($user["date_crea"])
    //     ->setGenre($user["genre"])
    //     ->setRole($user["role"]);
    // }
    include '../View/show_users.php';
}catch(PDOException $e){
    echo $e -> getMessage();
}