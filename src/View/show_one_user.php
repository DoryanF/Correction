<?php
$title = (unserialize($_SESSION["user"])->getId_user() === $user->getId_user()) ? "Mon profil" : sprintf("le profil de %d", $user->getPseudo());
include 'header.php';
?>

<div><span>Nom:</span><span><?= $user->getNom() ?? 'N/A'?></span></div>
<div><span>Prenom:</span><span><?= $user->getPrenom() ?? 'N/A'?></span></div>
<div><span>Pseudo:</span><span><?= $user->getPseudo()?></span></div>
<div><span>Mail:</span><span><?= $user->getMail()?></span></div>
<div><span>Date Création:</span><span><?= $user->getDate_crea()?></span></div>
<div><span>Genre:</span><span><?= $user->getGenre() ?? 'N/A'?></span></div>
<div><span>Role:</span><span><?= $user->getRole() ?? 'N/A'?></span></div>
<br>
<a href="edit_user_controller.php?id=<?= unserialize($_SESSION["user"])->getId_user();?>"><button>Modifier Profil</button></a>

<?php include 'footer.php'?>