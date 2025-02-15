<?php

class Annonce_prv extends Annonces {
    private $_receveurId;

    public function __construct($description, $date, $envoyeurId, $receveurId) {
        parent::__construct($description, $date, $envoyeurId);
        $this->_receveurId = $receveurId;
    }

    public function getReceveurId() {
        return $this->_receveurId;
    }

    public function setReceveurId($receveurId) {
        $this->_receveurId = $receveurId;
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