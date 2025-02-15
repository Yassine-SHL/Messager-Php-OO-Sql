<?php
require_once("./header.php");









?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Admin</title>
    <style>
        body{
            background-color: burlywood;
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
    .nom{
        width: 100px;
        color: black;
    }
    .container{
        width: 700px;
        margin-top: 170px;
        display: flex;
        justify-content: space-between;
    }
    .btn{
        padding: 17px;
        width: 200px;
    }
</style>
</head>
<body>
    <div class="container">
        <a href="annonces.php"><button type="button" class="btn btn-success">Les Annonces</button></a>
        <a href="utilisateurs.php"><button type="button" class="btn btn-warning">Les Utilisateurs</button></a>
        <a href="composer.php"><button type="button" class="btn btn-primary">Composer un message</button></a>
    </div>
</body>
</html>