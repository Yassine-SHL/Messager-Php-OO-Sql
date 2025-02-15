<?php
session_start();
require_once("./AnnoncesManager.class.php");
require_once("./Annonce_pub.class.php");
require_once("./Annonce_prv.class.php");
require_once("./Utilisateur_admin.class.php");
require_once("./Utilisateur_simple.class.php");
require_once("./UtilisateurManagaer.class.php");

// spl_autoload_register(function ($classname) {
//     // Construction du chemin basé sur la convention
//     $path = __DIR__ . '/classes/' . $classname . '.class.php';

//     if (file_exists($path)) {
//         require_once $path;
//     } else {
//         die("La classe $classname n'a pas été trouvée dans $path");
//     }
// });






?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
    h1 {
        font-family: 'Arial', sans-serif;
        font-size: 50px;
        color: #4A90E2;
        text-transform: uppercase;
        letter-spacing: 2px;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }
    a:hover {
        color: inherit;
        text-decoration: none;
        background-color: transparent;
    }
</style>
<header>
        <a href="accueil.php"><h1 style="margin-right: 350px;">Messanger</h1></a>
        <?php if(isset($_SESSION["id"])){
            ?>
            <table class="table-primary">
                    <tr class="table-primary">
                        <td class="table-primary nom">BONJOUR</td>
                        <td class="table-primary nom"><?= $_SESSION["id"] ?></td>
                    </tr>
                </table>
            <?php
        } ?>
        <?php if (isset($_SESSION["id"])) { ?>
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <a class="nav-link" href="deconnexion.php"><i class="bi bi-arrow-bar-left"></i>Me Déconnecter</a>
                    
            <?php } ?>
            <a class="nav-link" href="conn.php">Page de Connexion</a>
                </nav>
    </header>
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
</style>