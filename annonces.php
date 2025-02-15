<?php
require_once("./header.php");
$annoncesManager = new AnnoncesManager();
$annoncesPub = $annoncesManager->getAllAnnoncesPublic();
$annoncesPrv = $annoncesManager->getAllAnnoncesPrivees();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Annonces</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <style>
        .tweet-card {
            border: 1px solid #e1e8ed;
            border-radius: 12px;
            padding: 15px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .tweet-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
        }
        .tweet-header {
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: bold;
        }
        .tweet-actions {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
        .tweet-text {
            margin-top: 10px;
            font-size: 14px;
            color: #333;
        }
    </style>
</head>
<body class="bg-light">
<div class="container mt-4">
    <h5 class="mb-3">Annonces Publiques <i class="bi bi-globe"></i></h5>
    <div class="d-flex flex-column gap-3">
        <?php foreach ($annoncesPub as $annonce) { ?>
        <div class="tweet-card">
            <div class="tweet-header">
                <img src="https://i.pravatar.cc/40?u=<?= $annonce['userId'] ?>" class="tweet-avatar">
                <span> <?= $annonce["userId"] ?></span>
            </div>
            <p class="tweet-text"><?= $annonce["description"] ?></p>
            <small class="text-muted"><i class="bi bi-clock"></i> <?= $annonce["date"] ?></small>
            <div class="tweet-actions">
                <a class="btn btn-outline-primary btn-sm" href="modifierAnnonce.php?id=<?= $annonce['id']; ?>&type=pub">
                    <i class="bi bi-pencil"></i> Modifier
                </a>
                <a class="btn btn-outline-danger btn-sm" href="supprimerAnnonce.php?id=<?= $annonce['id']; ?>&type=pub">
                    <i class="bi bi-trash"></i> Supprimer
                </a>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<div class="container mt-5">
    <h5 class="mb-3">Annonces Privées <i class="bi bi-lock"></i></h5>
    <div class="d-flex flex-column gap-3">
        <?php foreach ($annoncesPrv as $annonce) { ?>
        <div class="tweet-card">
            <div class="tweet-header">
                <img src="https://i.pravatar.cc/40?u=<?= $annonce['userId'] ?>" class="tweet-avatar">
                <span> <?= $annonce["userId"] ?> ➝ <strong><?= $annonce["destinataire"] ?></strong></span>
            </div>
            <p class="tweet-text"><?= $annonce["description"] ?></p>
            <small class="text-muted"><i class="bi bi-clock"></i> <?= $annonce["date"] ?></small>
            <div class="tweet-actions">
                <a class="btn btn-outline-primary btn-sm" href="modifierAnnonce.php?id=<?= $annonce['id']; ?>&type=prv">
                    <i class="bi bi-pencil"></i> Modifier
                </a>
                <a class="btn btn-outline-danger btn-sm" href="supprimerAnnonce.php?id=<?= $annonce['id']; ?>&type=prv">
                    <i class="bi bi-trash"></i> Supprimer
                </a>
            </div>
        </div>
        <?php } ?>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
