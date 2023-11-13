<!DOCTYPE html>
<html lang="ca">
<head>
    <title>Formulari d'Inscripció</title>
    <?php require 'libs.php' ?>
</head>
<body>
<h1>Formulari d'Inscripció</h1>
<div class="container mt-5">
    <form method="post" action="index.php?r=doinscripcio" enctype="multipart/form-data">
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="col-md-6">
                <label for="cognoms" class="form-label">Cognoms</label>
                <input type="text" class="form-control" id="cognoms" name="cognoms" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="data_naixement" class="form-label">Data de Naixement</label>
            <input type="date" class="form-control" id="data_naixement" name="data_naixement" required>
        </div>

        <div class="mb-3">
            <label for="carrer" class="form-label">Carrer</label>
            <input type="text" class="form-control" id="carrer" name="carrer" required>
        </div>
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="numero" class="form-label">Número</label>
                <input type="text" class="form-control" id="numero" name="numero" required>
            </div>
            <div class="col-md-6">
                <label for="ciutat" class="form-label">Ciutat</label>
                <input type="text" class="form-control" id="ciutat" name="ciutat" required>
            </div>
        </div>
        <div class="mb-3">
            <label for="codi_postal" class="form-label">Codi Postal</label>
            <input type="text" class="form-control" id="codi_postal" name="codi_postal" required>
        </div>

        <div class="mb-3">
            <label for="resguard_pagament" class="form-label">Resguard del Pagament</label>
            <input type="file" class="form-control" id="resguard_pagament" name="resguard_pagament" accept=".pdf, .jpg, .jpeg, .png" required>
        </div>

        <button type="submit" class="btn btn-primary">Enviar Inscripció</button>
    </form>
</div>
</body>
</html>
