<?php
session_start();

include "../../vendor/autoload.php";
$idCom = filter_input(INPUT_GET, "idCom",FILTER_VALIDATE_INT);
$idArticle = filter_input(INPUT_GET,"id",FILTER_VALIDATE_INT);
$newContenu = filter_input(INPUT_POST,'contenu');
$commentaire = [
    "id_commentaire" => $idCom,
    "contenu" => $newContenu,
    "id_article" => $idArticle
];
if($commentaire["id_commentaire"] !==false){
    if(empty($_POST)){
        include '../Dao/commentaire_dao.php';
        try{
            include "../View/update_commentaire.php";
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
    else{
        if(isset($commentaire["contenu"]) && empty(trim($commentaire["contenu"]))){
            $error_messages[]="Commentaire inexistant";
        }

        if(!isset($commentaire["contenu"]) || !empty($error_messages)){
            include "../View/update_commentaire.php";
        }else{
            include "../Dao/commentaire_dao.php";
            try{
                update_commentaire($commentaire);
                header(sprintf("location:display_one_article_controler.php?id=%d",$commentaire["id_article"]));
            }catch(PDOException $e){
                echo $e -> getMessage();
            }
        }
    }
    
}
else{
    header("Location: display_article_controller.php");
    exit;
}


