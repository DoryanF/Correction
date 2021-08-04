<?php
$title = "Modif Commentaire";
include 'header.php';

if($idCom == true):?>
<form action="" method="post" style="display: flex; flex-direction:column; width: 500px; height:300px">
    <input type="text" name="contenu">
    <button type="submit">Modifier</button>
    <a href="../Controller/display_one_article_controler.php?id=<?=$id?>"><button type="button">Retour</button></a>
</form>

<?php endif;
 include 'footer.php';?>