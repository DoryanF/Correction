<?php

$title = "Liste des articles";
include 'header.php';


foreach($result as $article) :?>
    <article>
    <h1 name = "articleTitre"><?= $article['titre'] ?></h1>
    <p><?= $article['descr']?></p>
    <a href="../Controller/display_one_article_controler.php?id=<?= $article['id_article']?>"><button type="button">Lire</button></a>
    <a href=""><button type="button">Supprimer</button></a>
    </article>
    

<?php endforeach;
include 'footer.php'; ?>