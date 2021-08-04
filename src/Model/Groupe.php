<?php
namespace model;

class Groupe{
    private int $id_role;
    private string $nom_role;
    private ?int $id_user;

    public function __construct()
    {
        
    }

    

    /**
     * Get the value of id_role
     */ 
    public function getId_role()
    {
        return $this->id_role;
    }

    /**
     * Set the value of id_role
     *
     * @return  self
     */ 
    public function setId_role($id_role)
    {
        $this->id_role = $id_role;

        return $this;
    }

    /**
     * Get the value of nom_role
     */ 
    public function getNom_role()
    {
        return $this->nom_role;
    }

    /**
     * Set the value of nom_role
     *
     * @return  self
     */ 
    public function setNom_role($nom_role)
    {
        $this->nom_role = $nom_role;

        return $this;
    }

    /**
     * Get the value of id_user
     */ 
    public function getId_user()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     *
     * @return  self
     */ 
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }
}
