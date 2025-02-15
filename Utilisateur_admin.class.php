<?php
require_once("Utilisateur.class.php");
class Utilisateur_admin extends Utilisateur{
    private $_role;
    public function __construct($id,$nom, $prenom, $age,$role) {
        parent::__construct($id,$nom, $prenom,$age);
        $this->_role="admin";
    }
    
    public function getRole() {
        return $this->_role;
    }
}







?>