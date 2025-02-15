<?php
require_once("./header.php");
$error="";
$id=$_GET["id"];
$utilisateurManager=new UtilisateurManager();
$annonceManager=new AnnoncesManager();
$res=false;
$allUsers=$utilisateurManager->getAllUtilisateurs();
if($_GET["type"]=="pub"){
    $annonceManager->deleteAnnoncePublic($id);
    header("Location: annonces.php");
}
else{
    $annonceManager->deleteAnnoncePrivee($id);
    header("Location: annonces.php");
}



?>