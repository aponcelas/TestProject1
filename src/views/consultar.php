<!DOCTYPE html>
<html lang="en">
<head>
    <title>Consultar Inscripciones</title>
    <?php require 'libs.php' ?>
    <script src="js/scripts.js"></script>
</head>
<body>

<div>
    <h2>Consultar Inscripciones</h2>

    <table id="inscripcionesTable">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Cognoms</th>
                <th>Data de naixement</th>
                <th>Carrer</th>
                <th>Número</th>
                <th>Ciutat</th>
                <th>Codi Postal</th>
                <th>Ruta Resguard</th>   
            </tr>
        </thead>
        <tbody>
            <?php foreach ($inscripcions as $inscipcio) : ?>
                <tr>
                    <td><?= $inscipcio['id']; ?></td>
                    <td><?= $inscipcio['nom']; ?></td>
                    <td><?=$inscipcio['cognoms']; ?></td>
                    <td><?= $inscipcio['data_naixement']; ?></td>
                    <td><?= $inscipcio['adreca_carrer']; ?></td>
                    <td><?= $inscipcio['adreca_numero']; ?></td>
                    <td><?= $inscipcio['adreca_ciutat']; ?></td>
                    <td><?= $inscipcio['codi_postal']; ?></td>
                    <td><?= $inscipcio['resguard_pagament_path']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


</body>
</html>
