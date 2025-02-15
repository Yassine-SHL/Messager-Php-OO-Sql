<?php
require_once("./header.php");
$error="";
if(isset($_POST["conn"])){
    $id=$_POST["id"];
    $mdp=$_POST["mdp"];
    $userManager=new UtilisateurManager();
    $res=$userManager->connexion($id,$mdp);
    if($res){
        $_SESSION["id"]=$id;
        if($res['role']=="user"){
        ?>
        
        <script>
            window.location.href='accueil.php';
        </script>
        <?php
        }
        else{
            ?>
        
        <script>
            window.location.href='pageAdmin.php';
        </script>
        <?php
        }
    }
    else{
        $error= "<div class='mb-3 msgErreur'>
        <p>Identifiant ou Mot de passe Incorrect</p>
      </div>";
    }
}







?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Page de Connexion</title>
    <style>
        body{
            background-color:burlywood;
        }
    h1{
        font-size: 70px;
        font-weight: bolder;
    }
    .container{
        border: 5px dashed blue;
        border-radius: 10px;
        margin-top: 130px;
        padding: 30px;
        background-color:transparent;
        width: 700px;
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
    .msgErreur{
        color:red;

    }
    </style>
</head>
<body>
    <div class="container form-container">
        <form method="post">
            <div class="mb-3">
                <label for="id" class="form-label">Identifiant</label>
                <input type="text" class="form-control" id="id" name="id" required>
            </div>
            <div class="mb-3">
                <label for="mdp" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="mdp" name="mdp">
            </div>
            <button type="submit" class="btn btn-primary" name="conn">Connexion</button>
            <?= $error; ?>
        </form>
    </div>
</body>
</html>