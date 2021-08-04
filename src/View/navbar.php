<a href="../Controller/display_article_controler.php"><button>Accueil</button></a>
<?php if (!isset($_SESSION["user"])) :?>
    <a href="../Controller/signin_controller.php"><button>Connexion</button></a>
    <a href="../Controller/sign_up_controller.php"><button>S'enregistrer</button></a>
    <?php else:?>
    <a href="../Controller/add_article_controler.php"><button>Ajout article</button></a>
    <a href="../Controller/show_one_user_controller.php?id=<?= unserialize($_SESSION["user"])->getId_user(); ?>"><button>Profil</button></a>
    <a href="../Controller/signout_controller.php"><button>Déconnexion</button></a>
<?php endif;?>