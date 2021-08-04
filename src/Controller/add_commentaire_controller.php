<?php
session_start();

include "../../vendor/autoload.php";
$article_id = filter_input(INPUT_GET,"id",FILTER_VALIDATE_INT);

if($article_id !== false){
        if(empty($_POST)){
        
        include "../View/add_commentaire.php";
    }else{
        $commentaire = [
            "id_article" => $article_id,
            "contenu" => filter_input(INPUT_POST, "contenu")
        ];

        if(isset($commentaire["contenu"]) && empty(trim($commentaire["contenu"]))){
            $error_messages[]="Commentaire inexistant";
        }

        if(!isset($commentaire["contenu"]) || !empty($error_messages)){
            include "../View/add_commentaire.php";
        }else{
            include "../Dao/commentaire_dao.php";
            try{
                add_commentaire($commentaire);
                header(sprintf("location:display_one_article_controler.php?id=%d",$commentaire["id_article"]));
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
        }
    }
}else{
    header("Location: display_article_controller.php");
}


