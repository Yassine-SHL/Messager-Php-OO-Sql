<?php
class AnnoncesManager{
    private $_db;
    

    public function __construct()
    {
        try{
            $this->_db=new PDO("mysql:host=localhost;dbname=messanger","root","");
        }
        catch(Exception $e){
            echo "erreur : ".$e;
        }
    }

    
    /**
     * Inserer dans la table annoncepub une annonce publique
     *
     * @param Annonce_pub $annonce
     * @return bool
     */
    public function addAnnoncePublic(Annonce_pub $annonce){
        $query=$this->_db->prepare('INSERT INTO annoncepub(description,date,userId) VALUES (:description,:date,:userId);');
        $query->bindValue(':description',$annonce->getDescription());
        $query->bindValue(':date',$annonce->getDate());
        $query->bindValue(':userId',$annonce->getEnvoyeurId());
        if($query->execute()){
            $annonce->setId($this->_db->lastInsertId());
            return true;
        }
        else{
            return false;
        }
        
    }
    /**
     * Supprimer une annonce publique
     *
     * @param Annonce_pub $annonce
     * @return bool
     */
    public function deleteAnnoncePublic($id){
        $query=$this->_db->prepare('DELETE FROM annoncepub WHERE id=:id');
        $query->bindValue(':id',$id);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }
    /**
     * Mise a jour d'une annonce publique
     *
     * @param Annonce_pub $annonce
     * @return bool
     */
    public function updateAnnoncePublic(Annonce_pub $annonce){
        $query=$this->_db->prepare('UPDATE annoncepub SET description=:description , date=:date , userId=:userId  WHERE id=:id ');
        $query->bindValue(':description',$annonce->getDescription());
        $query->bindValue(':date',$annonce->getDate());
        $query->bindValue(':userId',$annonce->getEnvoyeurId());
        $query->bindValue(':id',$annonce->getId());
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }
    /**
     * Récupérer toutes les annonces publics
     *
     * @return array $annonces
     */
    public function getAllAnnoncesPublic(){
        $query=$this->_db->prepare('SELECT * FROM annoncepub ;');
        $query->execute();
        $allAnnonces=$query->fetchAll();
        return $allAnnonces;
    }
    /**
     * Récupérer une annonce publique par ID
     *
     * @param int $id
     * @return array|false
     */
    public function getAnnoncePubById($id){
        $query = $this->_db->prepare('SELECT * FROM annoncepub WHERE id = :id;');
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $data=$query->fetch(PDO::FETCH_ASSOC);
        $annonce=new Annonce_pub("","","");
        $annonce->hydrate($data);
        return $annonce;
    }








    /**
     * Inserer dans la table annonceprv une annonce privee
     *
     * @param annonce_prv $annonce
     * @return bool
     */
    public function addAnnoncePrivee(Annonce_prv $annonce){
        $query=$this->_db->prepare('INSERT INTO annonceprv(description,date,userId,destinataire) VALUES (:description,:date,:userId,:destinataire);');
        $query->bindValue(':description',$annonce->getDescription());
        $query->bindValue(':date',$annonce->getDate());
        $query->bindValue(':userId',$annonce->getEnvoyeurId());
        $query->bindValue(':destinataire',$annonce->getReceveurId());
        if($query->execute()){
            $annonce->setId($this->_db->lastInsertId());
            return true;
        }
        else{
            return false;
        }
    }
    /**
     * Supprimer une annonce privee
     *
     * @param Annonce_prv $annonce
     * @return bool
     */
    public function deleteAnnoncePrivee($id){
        $query=$this->_db->prepare('DELETE FROM annonceprv WHERE id=:id');
        $query->bindValue(':id',$id);
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }
    /**
     * Mise a jour d'une annonce privée
     *
     * @param Annonce_prv $annonce
     * @return bool
     */
    public function updateAnnoncePrivee(Annonce_prv $annonce){
        $query=$this->_db->prepare('UPDATE annonceprv SET description=:description , date=:date , userId=:userId ,destinataire=:destinataire  WHERE id=:id ');
        $query->bindValue(':description',$annonce->getDescription());
        $query->bindValue(':date',$annonce->getDate());
        $query->bindValue(':userId',$annonce->getEnvoyeurId());
        $query->bindValue(':destinataire',$annonce->getReceveurId());
        $query->bindValue(':id',$annonce->getId());
        if($query->execute()){
            return true;
        }
        else{
            return false;
        }
    }
    /**
     * Récupérer les annonces privées d'un utilisateur 
     *
     * @return array $annonces
     * @param string $id
     */
    public function getAnnoncesPrivees($destinataire){
        $query=$this->_db->prepare('SELECT * FROM annonceprv WHERE destinataire=:destinataire ;');
        $query->bindValue(':destinataire',$destinataire);
        $query->execute();
        $mesAnnonces=$query->fetchAll();
        return $mesAnnonces;
    }
    /**
     * Récupérer toutes les annonces privées pour l'admin
     *
     * @return array
     */
    public function getAllAnnoncesPrivees(){
        $query=$this->_db->prepare('SELECT * FROM annonceprv ;');
        $query->execute();
        $allAnnonces=$query->fetchAll();
        return $allAnnonces;
    }
    /**
     * Récupérer une annonce privée par ID
     *
     * @param int $id
     * @return array|false
     */
    public function getAnnoncePrvById($id){
        $query = $this->_db->prepare('SELECT * FROM annonceprv WHERE id = :id;');
        $query->bindValue(':id', $id, PDO::PARAM_INT);
        $query->execute();
        $annonce = $query->fetch();
        return $annonce ? $annonce : false;
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