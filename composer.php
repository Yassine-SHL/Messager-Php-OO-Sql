<?php
require_once("./header.php");
$utilisateurManager=new UtilisateurManager();
$annonceManager=new AnnoncesManager();
$allUsers=$utilisateurManager->getAllUtilisateurs();
$currentDate=date("Y-m-d H:i:s");
$error="";
if(isset($_POST["composer"])){
    $description = $_POST["description"];
    if($_POST["destinataires"]=="all"){
        $annonce=new Annonce_pub($description,$currentDate,$_SESSION["id"]);
        if($annonceManager->addAnnoncePublic($annonce)){
            $error="<div class='alert alert-info' role='alert'>
                Message envoyé avec succes.
            </div>";
        }
        else{
            $error="Une erreur s'est produite , utilisateur introuvable";
        }
    }
    else{
        $annonce=new Annonce_prv($description,$currentDate,$_SESSION["id"],$_POST["destinataires"]);
        if($annonceManager->addAnnoncePrivee($annonce)){
            $error="<div class='alert alert-info' role='alert'>
                Message envoyé avec succes.
            </div>";
        }
        else{
            $error="Une erreur s'est produite , utilisateur introuvable";
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Composer un Message</title>
    <style>
        .container{
            margin-top: 150px;
            width: 400px;
        }
        header {
        background-color: #f8f9fa;
        text-align: center;
        display: flex;
        align-items: center;
        gap: 15px;
        background-color:darkslategrey;
        height:100px;
    }
    </style>
</head>
<body>
    <?=$error ?>
<div class="container form-container">
<form method="post">
  <div class="mb-3">
    <label for="description" class="form-label">Description du message</label>
    <input type="text" class="form-control" id="description" name="description">
  </div>
  <label for="destinataires">Choisissez un destinataire :</label>
    <select id="destinataires" name="destinataires">
      <option value="all">Tous le monde</option>
      <?php foreach($allUsers as $user){ ?>
        <option value="<?= $user['id'] ?>"><?= $user['id'] ?></option>
      <?php } ?>
    </select><br>
  <button type="submit" class="btn btn-primary" name="composer">Poster</button>
</form>
</div>
</body>
</html>