<?php

$titre = "Titre Test";
$description =<<<PHP
BONJOUR
PHP;


/*$dbh = new PDO(
    "mysql: host=localhost; dbname=test;charset=UTF8","root","",
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

$id = 1;

$req = $dbh->prepare("SELECT * FROM sujet WHERE id = :id");
$req->bindValue(":id",$id);
$req->execute();
$result = $req->fetch();

if(!empty($result)){
    try{
        $dbh->beginTransaction();

        $sth = $dbh->prepare("UPDATE sujet SET titre = :titre,descr = :descr, id_user = :id_user WHERE id = :id");
        $sth->bindValue(":id",2);
        $sth->bindValue(":titre",$titre);
        $sth->bindValue(":descr",$description);
        $sth->bindValue("id_user", 1);
        $sth->execute();
        
        $dbh->commit();
    } catch(\Throwable $e){
        echo $e->getMessage();
        $dbh->rollBack();
    }
}else{
    echo "cet id n'existe pas";
};

function foo(){
    static $bar = 0;
    return ++$bar;
};

echo foo();
echo '<br>';
echo foo();*/

function Connexion(){
  
    static $bdd = '';

    if(!$bdd instanceof PDO){
        $bdd = new PDO("mysql: host=localhost; dbname=test;charset=UTF8","root","",[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        echo 'pdo instancier';
    }else{
        echo 'pdo non instancier';
    }
    return $bdd;
}
Connexion();