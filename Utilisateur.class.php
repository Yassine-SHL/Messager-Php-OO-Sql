<?php

abstract class Utilisateur{
    private $_id;
    private $_mdp;
    private $_nom;
    private $_prenom;
    private $_age;
    public function __construct($id,$mdp,$nom,$prenom,$age){
        $this->_id=$id;
        $this->_mdp=$mdp;
        $this->_nom=$nom;
        $this->_prenom=$prenom;
        $this->_age=$age;
    }

    public function getId() {
        return $this->_id;
    }

    public function setId($id) {
        $this->_id = $id;
    }

    
    public function getNom() {
        return $this->_nom;
    }

    public function setNom($nom) {
        $this->_nom = $nom;
    }

    
    public function getPrenom() {
        return $this->_prenom;
    }

    public function setPrenom($prenom) {
        $this->_prenom = $prenom;
    }

    
    public function getAge() {
        return $this->_age;
    }

    public function setAge($age) {
        $this->_age = $age;
    }


}





?>