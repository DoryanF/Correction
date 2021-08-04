<?php
session_start();

use dao\UserDao;
use model\User;

include "../../vendor/autoload.php";

if (isset($_SESSION["user"])) {
    header("Location: display_article_controler.php");
    exit;
}


if (empty($_POST)) {
    include "../View/signin.php";
}else{
    $args =[
        "email"=>[
            "filter"=>FILTER_VALIDATE_EMAIL
        ],
        "password"=>[]
    ];

    $signin_post = filter_input_array(INPUT_POST, $args);

    
    if ($signin_post["email"] === false) {
        $error_messages[] = "Mauvais Email";
    }
    if (empty(trim($signin_post["password"]))) {
        $error_messages[] = "Mauvais Mot de Passe";
    }

    if (empty($error_messages)) {

        $signin_user = (new User())
        ->setMail($signin_post["email"])
        ->setMdp($signin_post["password"]);

        try{
            $userDao = new UserDao();
            $user = $userDao->selectUserbyMail($signin_user->getMail());
            // var_dump($user);
            if (!is_null($user)) {                
                if (password_verify($signin_user->getMdp(), $user->getMdp())) {
                    $user = $userDao ->selectUserbyId($user->getId_user());
                    session_regenerate_id(true);
                    $_SESSION["user"] = serialize($user);
                    header("Location: display_article_controler.php");
                    exit;
                }else{
                    $error_messages[] = "Mot de passe érronné";
                    include '../View/signin.php';
                    exit;
                }
           
            }else{
                $error_messages[] = "Email érronné";
                    include '../View/signin.php';
                    exit;
            }
        }catch(PDOException $e){
             echo $e->getMessage();
        }
    }else{
        include "../View/signin.php";
    }
}
