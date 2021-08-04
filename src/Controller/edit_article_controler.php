<?php
session_start();
include "../../vendor/autoload.php";
include '../Dao/article_dao.php';
$id = filter_input(INPUT_GET, "id"); 
$newTitle = filter_input(INPUT_POST,'title');
$newDescription = filter_input(INPUT_POST,'description');

if($id !==false){
    try{
        $article = get_article_by_id($id);
        include '../View/edit_article.php';
        update_article($newTitle,$newDescription,$id);
    }catch(PDOException $e){
        echo $e -> getMessage();
    }
}
else{
    echo 'CA MARCHE PAS !';
}


