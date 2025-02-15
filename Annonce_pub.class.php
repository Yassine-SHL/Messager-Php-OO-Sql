<?php
require_once("./Annonces.class.php");
class Annonce_pub extends Annonces {
    public function __construct($description, $date, $envoyeurId) {
        parent::__construct($description, $date, $envoyeurId);
    }

    public function hydrate($data){
        foreach($data as $key=>$value){
            $method='set'.ucfirst($key);
            if(method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }
}


?>