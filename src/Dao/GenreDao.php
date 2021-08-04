<?php

namespace dao;

use model\Genre;
use PDO;

class GenreDao 
{
    private PDO $pdo;

    public function __construct()
    {
        $conf = 
        [
            "dsn" => "mysql:host=localhost;dbname=ccib;charset=UTF8",
            "user" => "root",
            "password" => "",
        ];
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $this->pdo = new PDO(
            $conf["dsn"],
            $conf["user"],
            $conf["password"],
            $options
        );
    }

    public function getAllGenre()
    {
        $req = $this->pdo->prepare("SELECT * FROM genre");
        $req->execute();
        $result = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $key => $genre)
        {
            $result[$key] = (new Genre)
                ->setId_genre($genre["id_role"])
                ->setNom_genre($genre["role"]);
        }
        return $result;
    }
}