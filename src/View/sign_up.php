<?php 
$title = "Création utilisateur";
include 'header.php';

if (!empty($error_messages)) :?>
<div>
    <ul>
        <?php foreach ($error_messages as $msg) :?>
            <li><?= $msg ?></li>
            <?php endforeach; ?>
    </ul>
</div>
<?php endif; ?>

<form action="sign_up_controller.php" method="POST">
    <label for="pseudo">Pseudo:</label><input type="text" name="pseudo" id="pseudo">
    <label for="email">Email:</label><input type="text" name="email" id="email">
    <label for="password">Mot de Passe:</label><input type="password" name="password" id="password">
    <input type="submit" value="Envoyer">
</form>

<?php include 'footer.php' ?>