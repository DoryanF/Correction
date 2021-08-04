<?php
namespace model;

class Genre{
    private int $id_genre;
    private string $nom_genre;

    public function __construct()
    {
        
    }

    

    /**
     * Get the value of id_genre
     */ 
    public function getId_genre()
    {
        return $this->id_genre;
    }

    /**
     * Set the value of id_genre
     *
     * @return  self
     */ 
    public function setId_genre($id_genre)
    {
        $this->id_genre = $id_genre;

        return $this;
    }

    /**
     * Get the value of nom_genre
     */ 
    public function getNom_genre()
    {
        return $this->nom_genre;
    }

    /**
     * Set the value of nom_genre
     *
     * @return  self
     */ 
    public function setNom_genre($nom_genre)
    {
        $this->nom_genre = $nom_genre;

        return $this;
    }
}