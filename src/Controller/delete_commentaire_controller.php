<?php
session_start();
include "../../vendor/autoload.php";
$idCom = filter_input(INPUT_GET,"idCom",FILTER_VALIDATE_INT);
$id = filter_input(INPUT_GET,"id",FILTER_VALIDATE_INT);
if($idCom !== false){
    try{
        include '../Dao/commentaire_dao.php';
        delete_commentaire($idCom);
        header(sprintf("location:display_one_article_controler.php?id=%d",$id));
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}
