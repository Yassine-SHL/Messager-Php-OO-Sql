<?php

class Utilisateur_simple extends Utilisateur{
    private $_role;
    public function __construct($id,$nom, $prenom, $age,$role) {
        parent::__construct($id,$nom, $prenom,$age);
        $this->_role="user";
    }
    
    public function getRole() {
        return $this->_role;
    }
}







?>