<?php
require_once("./header.php");
$annoncesManager = new AnnoncesManager();
$annonces = $annoncesManager->getAllAnnoncesPublic();
if (isset($_SESSION["id"])) {
    $mesAnnonces = $annoncesManager->getAnnoncesPrivees($_SESSION["id"]);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messager</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">
    <style>
        body {
            background-color: #f5f8fa;
        }
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
        .tweet-text {
            margin-top: 10px;
            font-size: 14px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="container mt-4">
        <h5 class="mb-3">Annonces Publiques <i class="bi bi-globe"></i></h5>
        <div class="d-flex flex-column gap-3">
            <?php foreach ($annonces as $annonce) { ?>
            <div class="tweet-card">
                <div class="tweet-header">
                    <img src="https://i.pravatar.cc/40?u=<?= $annonce['userId'] ?>" class="tweet-avatar">
                    <span> <?= $annonce["userId"] ?></span>
                </div>
                <p class="tweet-text">"<?= $annonce["description"] ?>"</p>
                <small class="text-muted"><i class="bi bi-clock"></i> <?= $annonce["date"] ?></small>
            </div>
            <?php } ?>
        </div>
    </div>

    <?php if (isset($_SESSION["id"])) { ?>
    <div class="container mt-5">
        <h5 class="mb-3">Annonces Privées <i class="bi bi-lock"></i></h5>
        <div class="d-flex flex-column gap-3">
            <?php foreach ($mesAnnonces as $annonce) { ?>
            <div class="tweet-card">
                <div class="tweet-header">
                    <img src="https://i.pravatar.cc/40?u=<?= $annonce['userId'] ?>" class="tweet-avatar">
                    <span> <?= $annonce["userId"] ?> ➝ <strong><?= $annonce["destinataire"] ?></strong></span>
                </div>
                <p class="tweet-text">"<?= $annonce["description"] ?>"</p>
                <small class="text-muted"><i class="bi bi-clock"></i> <?= $annonce["date"] ?></small>
            </div>
            <?php } ?>
        </div>
        <div class="text-center mt-4">
            <a href="composer.php" class="btn btn-info">Composer un message</a>
        </div>
    </div>
    <?php } ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
