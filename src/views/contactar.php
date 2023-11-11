<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contacta amb nosaltres</title>
    <?php require 'libs.php'; ?>
    <script src="js/scripts.js"></script>
</head>
<body class="p-0 m-0 border-0 bd-example m-0 border-0">
    <?php require "menu.php" ?>
    <div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6 d-flex flex-column align-items-center">
                <div class="card p-4 bg-dark container-opacity formlogin" data-bs-theme="dark">
                    <div class="col-12 d-flex justify-content-center align-items-center">
                        <img src="/img/ApartamentsFiguerencs2.ico" alt="ApartamentsFiguerencs" width="100px" height="100px">
                    </div>
                    <form method="post" action="index.php?r=sendmessage">
                        <div class="mb-3">
                            <label for="name" class="form-label text-white">Nom:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-id-card"></i></span>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nom d'usuari" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label text-white">Correu electrònic:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Correu electrònic:" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="name" class="form-label text-white">Cos del missatge:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-book"></i></span>
                                <textarea class="form-control" id="message" name="message" rows="4" placeholder="El teu missatge:" required></textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <button type="submit" class="btn btn-primary btnformcontactar">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <h5 class="text-center">On ens pots trobar ?</h5> 
    <div id="map" style="height: 300px;"></div>
    <?php require "footer.php"; ?>
</body>
<script src="js/map.js"></script>
</html>
