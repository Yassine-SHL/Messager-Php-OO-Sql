<?php
require_once("./header.php");
$error="";
$id=$_GET["id"];
$utilisateurManager=new UtilisateurManager();
$annonceManager=new AnnoncesManager();
$res=false;
$allUsers=$utilisateurManager->getAllUtilisateurs();
if($_GET["type"]=="pub"){
    $annonceAncienne=$annonceManager->getAnnoncePubById($id);
    if(isset($_POST["modifier"])){
        $envoyeur=$_POST["envoyeurs"];
        $desc=$_POST["description"];
        $date=date("Y-m-d H:i:s");
        $annonce=new Annonce_pub($desc,$date,$envoyeur);
        $annonce->setId($id);
        $res=$annonceManager->updateAnnoncePublic($annonce);
    }
    if($res && $annonce){
        header("Location: annonces.php");
    }
}
else{
    $annonceAncienne=$annonceManager->getAnnoncePrvById($id);
    if(isset($_POST["modifier"])){
        $envoyeur=$_POST["envoyeurs"];
        $destinataire=$_POST["destinataires"];
        $desc=$_POST["description"];
        $date=date("Y-m-d H:i:s");
        $annonce=new Annonce_prv($desc,$date,$envoyeur,$destinataire);
        $annonce->setId($id);
        $res=$annonceManager->updateAnnoncePrivee($annonce);
    }
    if($res && $annonce){
        header("Location: annonces.php");
    }
}



?>
<style>
    .container{
            margin-top: 100px;
            width: 400px;
        }
    .btn{
        margin-top: 25px;;
    }
</style>
<?=$error ?>
<div class="container form-container">
<form method="post">
  <div class="mb-3">
    <label for="description" class="form-label">nouvelle Description du message</label>
    <input type="text" class="form-control" id="description" name="description">
  </div>
  <label for="envoyeurs">Choisissez un nouvel envoyeur :</label><br>
    <select id="envoyeurs" name="envoyeurs">
      <option value="all"><?= "" ?></option>
      <?php foreach($allUsers as $user){ ?>
        <option value="<?= $user['id'] ?>"><?= $user['id'] ?></option>
      <?php } ?>
    </select><br>
    <?php if($_GET["type"]=="prv"){ ?>
        <label for="destinataires">Choisissez un nouveau destinataire :</label>
            <select id="destinataires" name="destinataires">
            <option value="all">Tous le monde</option>
            <?php foreach($allUsers as $user){ ?>
                <option value="<?= $user['id'] ?>"><?= $user['id'] ?></option>
            <?php } ?>
            </select><br>
    <?php } ?>
    <button type="submit" class="btn btn-primary" name="modifier">Modifier</button>
</form>
</div>