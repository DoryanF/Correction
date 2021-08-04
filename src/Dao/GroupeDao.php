<?php

namespace dao;

use model\Groupe;
use PDO;

class GroupeDao 
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

    public function getAllRole()
    {
        $req = $this->pdo->prepare("SELECT * FROM role");
        $req->execute();
        $result = $req->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $key => $role)
        {
            $result[$key] = (new Groupe)
                ->setId_role($role["id_role"])
                ->setNom_role($role["role"])
                ->setId_user($role["id_user"]);
        }
        return $result;
    }
}