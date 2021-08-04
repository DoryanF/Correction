<?php 
session_start();

include '../Dao/article_dao.php';
include "../../vendor/autoload.php";

try{
    $result = get_all_article();
    include '../View/display_article.php';
}catch(PDOException $e){
   echo $e -> getMessage();
}

