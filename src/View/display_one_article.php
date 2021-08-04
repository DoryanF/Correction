<?php 

$title = sprintf("Affiche l'article %d", $articles['id_article']);
include 'header.php';

?>

<article>
    <h1><?= trim(filter_var($articles["titre"], FILTER_SANITIZE_FULL_SPECIAL_CHARS)) ?></h1>
    <p><?= nl2br(trim(filter_var($articles["descr"], FILTER_SANITIZE_FULL_SPECIAL_CHARS))) ?></p>
    <a href="edit_article_controller.php?id=<?= $articles["id_article"]?>"><button>Editer l'article</button></a>
    <a href="../Controller/display_article_controler.php"><button>Retour</button></a>
    <a href="delete_article_controller.php?id=<?= $articles["id_article"]?>"><button>Supprimer l'article</button></a>
    <a href="add_commentaire_controller.php?id=<?= $articles["id_article"]?>"><button>Commentaire</button></a>
</article>

<?php if (!empty($commentaires)) : ?>
    <div>
        <?php foreach ($commentaires as $commentaire) :?>
        <div>
            <br>
            <span><?= $commentaire["date_crea"] ?></span>
            <p><?= $commentaire["contenu"] ?></p>
            <a href="update_commentaire_controller.php?idCom=<?=$commentaire['id_commentaire']?>&amp;id=<?=$articles['id_article']?>">Modifier</a>
            <a href="delete_commentaire_controller.php?idCom=<?=$commentaire['id_commentaire']?>&amp;id=<?=$articles['id_article']?>">Supprimer</a>
        </div>
        <?php endforeach ;?>
    </div>
<?php endif; ?>

<?php include 'footer.php';
    