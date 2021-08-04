<?php

require_once 'Pdo/pdo_dao.php';

function add_article(string $title, string $description){
    $dbh = getPDO();
    $req = $dbh->prepare("INSERT INTO article (titre, descr) 
                        VALUES (:titre, :descr)");
    $req->execute([
        ":titre" => $title,
        ":descr" => $description
    ]);
};

function get_all_article() :array{
    $dbh = getPDO();
    $req = $dbh->prepare("SELECT * FROM article");
    $req-> execute();
    $result = $req -> fetchAll(PDO::FETCH_ASSOC);
    return $result;
};

function get_article_by_id($id) :bool|array{
    $dbh = getPDO();
    $req = $dbh->prepare("SELECT * FROM article WHERE id_article = :id");
    $req -> execute([":id" => $id]);
    $result = $req -> fetch(PDO::FETCH_ASSOC);
    return $result;
}


function update_article($titre,$descr,$id){
    $dbh = getPDO();
    $req = $dbh->prepare("UPDATE article SET titre = :titre ,descr = :descr WHERE id_article = :id");
    $req->execute([
        ":titre"=>$titre,
        ":descr"=>$descr,
        ":id"=>$id
    ]);
}

function delete_article($id){
    $dbh = getPDO();
    $req = $dbh->prepare("DELETE FROM article WHERE id_article = :id_article");
    $req->execute([":id_article"=>$id]);    
}


?>