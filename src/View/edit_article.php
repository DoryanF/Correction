<?php

include 'header.php';

if($id == true):?>
<form action="" method="post" style="display: flex; flex-direction:column; width: 500px; height:300px">
    <h3><?= $article['titre'] ?></h3>
    <input type="text" name="title">
    <p><?= $article['descr']?></p>
    <textarea name="description" id="description" cols="30" rows="10"></textarea>
    <button type="submit">Modifier</button>
    <a href="../Controller/display_article_controler.php"><button type="button">Retour</button></a>
</form>

<?php endif;
 include 'footer.php';?>