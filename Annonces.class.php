<?php

abstract class Annonces{
    private $_id;
    private $_description;
    private $_date;
    private $_envoyeurId;
    public function __construct($description,$date,$envoyeurId)
    {
        $this->_description=$description;
        $this->_date=$date;
        $this->_envoyeurId=$envoyeurId;
    }

    public function getId() {
        return $this->_id;
    }

    public function setId($id) {
        $this->_id = $id;
    }

    public function getDescription() {
        return $this->_description;
    }

    public function setDescription($description) {
        $this->_description = $description;
    }

    public function getDate() {
        return $this->_date;
    }

    public function setDate($date) {
        $this->_date = $date;
    }

    public function getEnvoyeurId() {
        return $this->_envoyeurId;
    }

    public function setEnvoyeurId($envoyeurId) {
        $this->_envoyeurId = $envoyeurId;
    }
}






?>