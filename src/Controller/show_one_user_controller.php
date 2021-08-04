<?php

use dao\UserDao;

include '../../vendor/autoload.php';

session_start();

$user_id = filter_input(INPUT_GET,"id",FILTER_VALIDATE_INT);

if ($user_id !== false) {
    try{
        $userDao = new UserDao();
        $user = $userDao->selectUserbyId($user_id);

        if (!empty($user)) {
            require "../View/show_one_user.php";
            
        }else{
            header("location: display_article_controler.php");
            exit;
        }

    }catch(PDOException $e){
        echo $e->getMessage();
    }
}else{
    header("location: display_article_controler.php");
    exit;
}
