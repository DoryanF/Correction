<?php

namespace dao;

use PDO;
use model\User;

class UserDao{
    private PDO $pdo;
    public function __construct()
    {
        $conf = [
            "dsn" => "mysql: host=localhost; dbname=ccib;charset=UTF8",
            "user" => "root",
            "password" => "",
        ];
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        $this->pdo = new PDO($conf["dsn"], $conf["user"], $conf["password"], $options);
    }

    public function addUser(User $user){
        $req = $this->pdo->prepare("INSERT INTO user (pseudo, mail, mdp) VALUES (:pseudo, :mail, :mdp)");

        $req -> execute([
            ":pseudo"=>$user->getPseudo(),
            ":mail"=>$user->getMail(),
            ":mdp"=>$user->getMdp()
        ]);
    }

    public function selectAllUser():array{
        $req = $this->pdo->prepare("SELECT u.id_user AS id,
        u.nom AS nom,
        u.prenom AS prenom,
        u.pseudo AS pseudo,
        u.mail AS mail,
        u.date_crea AS date_crea,
        g.nom_genre AS genre,
        r.nom_role AS role
        FROM user AS u
        LEFT OUTER JOIN genre AS g ON u.id_genre = g.id_genre
        LEFT OUTER JOIN role AS r ON u.id_role = r.id_role");
        $req->execute();
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        
        foreach($result as $key => $user){
            $result[$key] = (new User())
            ->setId_user($user["id"])
            ->setNom($user["nom"])
            ->setPrenom($user["prenom"])
            ->setPseudo($user["pseudo"])
            ->setMail($user["mail"])
            ->setDate_crea($user["date_crea"])
            ->setGenre($user["genre"])
            ->setRole($user["role"]);
        }
        return $result;
    }

    public function selectUserbyId($id): ?User{
        $req = $this->pdo->prepare("SELECT u.id_user AS id,
                                    u.nom AS nom,
                                    u.prenom AS prenom,
                                    u.pseudo AS pseudo,
                                    u.mail AS mail,
                                    u.date_crea AS date_crea,
                                    g.nom_genre AS genre,
                                    r.nom_role AS role
                                    FROM user AS u
                                    LEFT OUTER JOIN genre AS g ON u.id_genre = g.id_genre
                                    LEFT OUTER JOIN role AS r ON u.id_role = r.id_role
                                    WHERE u.id_user = :id_user");
        $req->execute([
            ":id_user" => $id
        ]);
        $result = $req->fetch(PDO::FETCH_ASSOC);
        if (!empty($result)) {
            return (new User())
            ->setId_user($result["id"])
            ->setNom($result["nom"])
            ->setPrenom($result["prenom"])
            ->setPseudo($result["pseudo"])
            ->setMail($result["mail"])
            ->setDate_crea($result["date_crea"])
            ->setGenre($result["genre"])
            ->setRole($result["role"]);
        }else{
            return null;
        }
    }

    public function selectUserbyMail($mail): ?User{
        $req = $this->pdo->prepare("SELECT id_user, mail, mdp
                                    FROM user
                                    WHERE mail = :mail");
        $req->execute([
            ":mail" => $mail
        ]);
        $result = $req->fetch(PDO::FETCH_ASSOC);

        if(!empty($result)){
          return (new User())
          ->setId_user($result["id_user"])
          ->setMail($result["mail"])
          ->setMdp($result["mdp"]);
        }else{
            return null;
        }

    }

    public function updateUser(User $user){
        $dbh = getPDO();
    $req = $dbh->prepare("UPDATE user AS u 
                        SET u.nom = :nom,
                        u.prenom = :prenom, 
                        u.pseudo = :pseudo, 
                        u.mdp = :mdp, 
                        g.nom_genre = :genre, 
                        r.nom_role = :role
                        LEFT OUTER JOIN genre AS g ON u.id_genre = g.id_genre
                        LEFT OUTER JOIN role AS r ON u.id_role = r.id_role
                        WHERE u.id_user = :id_user");
        $req->execute([
            "id_user" => $user->getId_user(),
            ":nom" => $user->getNom(),
            ":prenom" => $user->getPrenom(),
            ":pseudo" => $user->getPseudo(),
            ":mdp" => $user->getMdp(),
            ":genre" => $user->getGenre(),
            ":role" => $user->getRole()
        ]);
    }

    
}