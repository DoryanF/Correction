<?php 
$title = "Liste Utilisateurs";
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
<?php
if(empty($listUsers)) : 
    echo "Rien à afficher";
else :
?>       
<table>
    <thead>
        <tr>
          <th>L'id</th>
          <th>Nom</th>
          <th>Prenom</th>
          <th>Pseudo</th>
          <th>Email</th>
          <th>Date Création</th>
          <th>Genre</th>
          <th>Groupe</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $user = current($listUsers);
        do {
        ?>    
        <tr>
            <td><?= $user->getId_user() ?></td>
            <td><?= $user->getNom() ?></td>
            <td><?= $user->getPrenom() ?></td>
            <td><?= $user->getPseudo() ?></td>
            <td><?= $user->getMail() ?></td>
            <td><?= $user->getDate_crea() ?></td>
            <td><?= $user->getGenre() ?></td>
            <td><?= $user->getRole() ?></td>
        </tr> 
        <?php
        } while ($user = next($listUsers)) ?>
    </tbody>
</table>
<?php
endif;

include 'footer.php';
?>