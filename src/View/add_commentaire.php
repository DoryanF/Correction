<?php
$title = "ajout d'un commentaire";
include 'header.php';

if (!empty($error_messages)) :?>
<div>
    <ul>
        <?php foreach ($error_messages as $msg):?>
            <li><?=$msg?></li>
            <?php endforeach;?>
    </ul>
</div>
<?php endif; ?>
<form action="add_commentaire_controller.php?id=<?=$article_id?>" method="post">
    <textarea name="contenu" id="contenu" cols="30" rows="10"></textarea>
    <input type="submit" value="Envoyer">
</form>

<?php include 'footer.php'?>