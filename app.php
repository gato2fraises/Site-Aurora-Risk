<?php
require_once __DIR__ . '/functions.php';

$page = getActivePage();
$manager = new InterventionManager();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AURORA - Coordination Internationale des Crises</title>
    <meta name="description" content="Plateforme officielle de coordination des interventions d'urgence">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='75' font-size='75'>🌍</text></svg>">
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>
    <?php include 'includes/header.php'; ?>
    
    <main>
        <?php
            switch ($page) {
                case 'interventions':
                    include 'pages/interventions.php';
                    break;
                case 'about':
                    include 'pages/about.php';
                    break;
                case 'contact':
                    include 'pages/contact.php';
                    break;
                case 'demo':
                    include 'pages/demo.php';
                    break;
                case 'carte':
                    include 'pages/carte-interactive.php';
                    break;
                default:
                    include 'pages/accueil.php';
            }
        ?>
    </main>

    <?php include 'includes/footer.php'; ?>
</body>
</html>
