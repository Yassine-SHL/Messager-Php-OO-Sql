<?php
class UtilisateurManager {
    private $_db;

    public function __construct() {
        try {
            $this->_db = new PDO("mysql:host=localhost;dbname=messanger", "root", "");
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    /**
     * Ajouter un utilisateur (simple ou admin)
     *
     * @param Utilisateur_simple|Utilisateur_admin $utilisateur
     * @return bool
     */
    public function addUtilisateur($utilisateur) {
        $query = $this->_db->prepare('INSERT INTO utilisateur(id, nom, prenom, age, role) VALUES (:id, :nom, :prenom, :age, :role);');
        $query->bindValue(':id', $utilisateur->getId());
        $query->bindValue(':nom', $utilisateur->getNom());
        $query->bindValue(':prenom', $utilisateur->getPrenom());
        $query->bindValue(':age', $utilisateur->getAge(), PDO::PARAM_INT);
        $query->bindValue(':role', $utilisateur instanceof Utilisateur_admin ? 'admin' : 'simple');

        return $query->execute();
    }

    /**
     * Supprimer un utilisateur
     *
     * @param Utilisateur_simple|Utilisateur_admin $utilisateur
     * @return bool
     */
    public function deleteUtilisateur($utilisateur) {
        $query = $this->_db->prepare('DELETE FROM utilisateur WHERE id = :id');
        $query->bindValue(':id', $utilisateur->getId());

        return $query->execute();
    }

    /**
     * Mettre à jour un utilisateur (simple ou admin)
     *
     * @param Utilisateur_simple|Utilisateur_admin $utilisateur
     * @return bool
     */
    public function updateUtilisateur($utilisateur) {
        $query = $this->_db->prepare('UPDATE utilisateur SET nom = :nom, prenom = :prenom, age = :age, role = :role WHERE id = :id');
        $query->bindValue(':nom', $utilisateur->getNom());
        $query->bindValue(':prenom', $utilisateur->getPrenom());
        $query->bindValue(':age', $utilisateur->getAge(), PDO::PARAM_INT);
        $query->bindValue(':role', $utilisateur instanceof Utilisateur_admin ? 'admin' : 'simple');
        $query->bindValue(':id', $utilisateur->getId());

        return $query->execute();
    }
    /**
     * Vérification des informations de l'utilisateur pour la connexion
     *
     * @param string $id
     * @param [string $mdp
     * @return $user
     */
    public function connexion($id, $mdp) {
        $query = $this->_db->prepare('SELECT * FROM utilisateur WHERE id = :id AND mot_de_passe = :mdp');
        $query->bindValue(':id', $id);
        $query->bindValue(':mdp', $mdp);
        if ($query->execute()) {
            $user = $query->fetch(PDO::FETCH_ASSOC);
            if ($user) {
                return $user;
            } else {
                return false;
            }
        } else {
            return false; 
        }
    }
    /**
     * Récupérer les données d'un utilisateur a partir de son id
     *
     * @param [type] $id
     * @return void
     */
    public function getUtilisateurById($id) {
        $query = $this->_db->prepare('SELECT * FROM utilisateur WHERE id = :id');
        $query->bindValue(':id', $id);
        $query->execute();
    
        $user = $query->fetch(PDO::FETCH_ASSOC);
    
        if ($user) {
            return $user;
        } else {
            return null;
        }
    }
    /**
     * Récupérer tous les utilisateurs
     *
     * @return array
     */
    public function getAllUtilisateurs(){
        $query=$this->_db->prepare('SELECT * FROM utilisateur ;');
        $query->execute();
        $allUsers=$query->fetchAll();
        return $allUsers;
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
