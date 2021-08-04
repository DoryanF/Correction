<?php
session_start();

include "../../vendor/autoload.php";
//$article_id = htmlspecialchars($_GET["id"]); //possibilite 2

$article_id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT); //possibilite 1

if ($article_id !== false) {
include "../Dao/article_dao.php";
include "../Dao/commentaire_dao.php";

    try {
        $articles = get_article_by_id($article_id);

        if (!empty($articles)) {
            $commentaires = get_commentaire_by_id($article_id);
            include "../View/display_one_article.php";
        }
        else {
            header("location:display_articles_controller.php");
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    };
}
else{
    header("location:display_articles_controller.php");
}
