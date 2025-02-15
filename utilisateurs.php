<?php
require_once("./header.php");
$manager=new UtilisateurManager();
$allUtilisateurs=$manager->getAllUtilisateurs();








?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container mt-5">
    <h5>Tous les utilisateurs du site web</h5>
    <table class="table table-bordered border-primary">
        <thead style="color: green;">
            <tr>
            <th scope="col">Identifiant</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom</th>
            <th scope="col">Age</th>
            <th scope="col">rôle</th>
            <th scope="col">Mot de passe</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($allUtilisateurs as $user){ ?>
            <tr>
            <th scope="row"><?= $user["id"]  ?></th>
            <th scope="row"><?= $user["nom"]  ?></th>
            <th scope="row"><?= $user["prenom"]  ?></th>
            <td><?=$user["age"]  ?></td>
            <th scope="row"><?= $user["role"]  ?></th>
            <th scope="row"><?= $user["mot_de_passe"]  ?></th>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>