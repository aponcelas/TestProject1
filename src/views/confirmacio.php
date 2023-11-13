<!DOCTYPE html>
<html lang="ca">
<head>
    <title>Confirmation Page</title>
    <?php require 'libs.php' ?>
    <script src="js/scripts.js"></script>
</head>
<body>
    <h1>Confirmation Page</h1>
    <div class="container mt-5">
        <p>Thank you for your submission!</p>
        <p>The following data has been successfully inserted:</p>
        <ul>
            <li><strong>Nom:</strong> <?php echo htmlspecialchars($confirmacio['nom']); ?></li>
            <li><strong>Cognoms:</strong> <?php echo htmlspecialchars($confirmacio['cognoms']); ?></li>
            <li><strong>Data de Naixement:</strong> <?php echo htmlspecialchars($confirmacio['data_naixement']); ?></li>
            <li><strong>Carrer:</strong> <?php echo htmlspecialchars($confirmacio['carrer']); ?></li>
            <li><strong>Número:</strong> <?php echo htmlspecialchars($confirmacio['numero']); ?></li>
            <li><strong>Ciutat:</strong> <?php echo htmlspecialchars($confirmacio['ciutat']); ?></li>
            <li><strong>Codi Postal:</strong> <?php echo htmlspecialchars($confirmacio['codi_postal']); ?></li>
        </ul>
        <p><a href="index.php">Back to Home</a></p>
    </div>
</body>
</html>
