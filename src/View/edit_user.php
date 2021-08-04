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

<form action="">
    <label for="">Nom: </label><input type="text" name="nom" id="nom" value="<?= $user->getNom() ?>">
    <label for="">Prenom: </label><input type="text" name="prenom" id="prenom" value="<?= $user->getPrenom() ?>">
    <label for="">Pseudo: </label><input type="text" name="pseudo" id="pseudo" value="<?= $user->getPseudo() ?>">
    <label for="">Email: </label><input type="text" name="mail" id="mail" value="<?= $user->getMail() ?>">
    <label for="">Mot de Passe: </label><input type="password" name="mdp" id="mdp" value="<?= $user->getMdp() ?>">
    <select name="genre" id="genre">
        <?php foreach ($genres as $genre) : ?>
        <option value="<?= $genre["id_genre"] ?>"<?= ($user->getGenre() === $genre["nom_genre"]) ? "selected" :"";?><?= $genre["nom_genre"]?>></option>
        <?php endforeach; ?>
    </select>
    <select name="groupe" id="groupe">
        <?php foreach ($groupes as $groupe):?>
        <option value="<?= $groupe["id_role"]?>"<?= ($user->getRole() === $groupe["nom_genre"]) ? "selected" : "";?><?=$groupe["nom_role"]?>></option>
        <?php endforeach; ?>
    </select>
    <input type="submit" value="Envoyer">
</form>

<?php include 'footer.php'?>
