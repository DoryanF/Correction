<?php

use dao\UserDao;

include "../../vendor/autoload.php";

session_start();

$user_id = filter_input(INPUT_GET,"id",FILTER_VALIDATE_INT);


if ($user_id !== false) {
    if(empty($_POST)){
        try{
            $userDao = new UserDao();
            $user = $userDao->selectUserbyId($user_id);
            
            if (!is_null($user)) {
                require "../View/edit_user.php";
            }else{
                header("location: display_article_controler.php");
                exit;
            }
        }catch(PDOException $e){
            echo $e -> getMessage();
        } 
    }else{
        
    }
}else{
    header("location: display_article_controler.php");
    exit;
}