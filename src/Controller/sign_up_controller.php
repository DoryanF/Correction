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
    include "../View/sign_up.php";
}else{
    $args =[
        "pseudo"=>[
            "filter"=>FILTER_VALIDATE_REGEXP,
            "options"=>[
                "regexp"=>"#^[\w\s-]+$#u"
            ]
        ],
        "email"=>[
            "filter"=>FILTER_VALIDATE_EMAIL
        ],
        "password"=>[]
    ];

    $signup_post = filter_input_array(INPUT_POST, $args);

    if ($signup_post["pseudo"] === false) {
        $error_messages[] = "Pseudo inexistant";
    }
    if ($signup_post["email"] === false) {
        $error_messages[] = "Email inexistant";
    }
    if (empty(trim($signup_post["password"]))) {
        $error_messages[] = "Password inexistant";
    }

    if (empty($error_messages)) {
        $signup_user = (new User())
        ->setPseudo($signup_post["pseudo"])
        ->setMail($signup_post["email"])
        ->setMdp(password_hash($signup_post["password"],PASSWORD_DEFAULT));

        try{
            $userDao = new UserDao();
            $userDao->addUser($signup_user);
            header("Location: display_article_controler.php");
            exit;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }else{
        include "../View/sign_up.php";
    }
}

