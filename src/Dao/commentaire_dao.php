<?php

require_once "Pdo/pdo_dao.php";

function get_commentaire_by_id(int $article_id): array{
    $dbh = getPDO();
    $req = $dbh->prepare("SELECT * FROM commentaire where id_article = :id ORDER BY date_crea DESC");
    $req->execute(
        [
            ":id" => $article_id
        ]
    );
    return $req->fetchAll(PDO::FETCH_ASSOC);
};

function add_commentaire(array $contenu):void{
    $dbh = getPDO();
    $req = $dbh->prepare("INSERT INTO commentaire (id_article, contenu ) 
                        VALUES (:id_article, :contenu)");
    $req->execute([
        ":id_article" => $contenu["id_article"],
        ":contenu" => $contenu["contenu"]
    ]);
};

function update_commentaire(array $contenu):void{
    $dbh = getPDO();
    $req = $dbh->prepare("UPDATE commentaire SET contenu = :contenu WHERE id_commentaire = :id");
    $req->execute([
        ":id"=>$contenu["id_commentaire"],
        ":contenu"=>$contenu["contenu"]
    ]);
}

function delete_commentaire($id){
    $dbh = getPDO();
    $req = $dbh->prepare("DELETE FROM commentaire WHERE id_commentaire = :id");
    $req -> execute([
        ":id"=>$id
    ]);
}