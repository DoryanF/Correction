<?php

$titre = "Titre Test";
$description =<<<PHP
BONJOUR
PHP;


$dbh = new PDO(
    "mysql: host=localhost; dbname=test;charset=UTF8","root","",
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

//$str =  $dbh->prepare("INSERT INTO sujet (titre,descr)VALUES(:titre,:descr)");
// $str->bindValue(":titre",$titre);
// $str->bindValue(":descr",$description);
$sth = $dbh->prepare("SELECT * FROM sujet");
$sth -> execute();

//$raw = $str->fetch();
$sth->setFetchMode(PDO::FETCH_ASSOC);
$raws = $sth->fetchAll();
//var_dump($raws);

/*while($raws = $sth->fetch()){
?> 
<div>
    <h1><?= $raws['titre'] ?></h1>
    <p><?= $raws['descr']?></p>
</div>
<?php
}*/
foreach($raws as $values){
?>
    <div>
    <h1><?= $values['titre'] ?></h1>
    <p><?= $values['descr']?></p>
    </div>
    <?php
}
?>

<?php

//ini_set("session.cookie_lifetime", 3600);
session_start();
// if(!array_key_exists("count", $_SESSION)){
//     $_SESSION["count"] = 0;
// }
// echo ++$_SESSION["count"];

$params = session_get_cookie_params();
setcookie(
    session_name(),
    session_id(),
    strtotime('+1 hour'),
    $params["path"], 
    $params["domain"],
    $params["secure"], 
    $params["httponly"]
);

//création cookie
/*
    $hello = 'world';
    setcookie('hello',$hello, strtotime('+30 days'));
*/

//suppresion d'un cookie
/*if(isset($_COOKIE['hello'])){
    unset($_COOKIE['hello']);
    setcookie('hello',null, strtotime('yesterday'));
    echo 'Cookie supprimé';
}
else{
    echo "Ce cookie n'existe plus";
}*/

//echo filter_input(INPUT_GET, "name");

/*echo preg_match('/(foo)(bar)/', 'foobar', $matches);
echo '<br>';
print_r($matches);*/



// $subject = "abcdef";
// echo preg_match('#[a-zA-Z]#', $subject);
// echo '<br>';
// $float = 4.2;
// echo preg_match('#[0-9]\.[0-9]#',$float);
// echo '<br>';
// $int = 4;
// echo preg_match('#[0-9]#', $int);
// echo '<br>';
// $pattern = '/^def/';
// preg_match($pattern, substr($subject,3), $matches, PREG_OFFSET_CAPTURE);
// print_r($matches);
// echo '<br>';
// $var = 'foobar';
// echo preg_match('#[foo](?=bar)#', $var);
// echo '<br>';
// $var2 = 'foofoo';
// echo preg_match('#[foo](2)#', $var2);
?>




