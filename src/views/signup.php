<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registrar-se</title>
    <?php require 'libs.php'; ?>
    <script src="js/scripts.js"></script>
</head>
<body class="p-0 m-0 border-0 bd-example m-0 border-0">
    <?php require "menu.php" ?>
    <div class="container mt-5 mb-5 formloginsignup">
        <div class="row justify-content-center">
            <div class="col-md-6 d-flex flex-column align-items-center">
                <div class="card p-4 bg-dark container-opacity formsignup" data-bs-theme="dark">
                    <div class="col-12 d-flex justify-content-center align-items-center">
                        <img src="/img/ApartamentsFiguerencs2.ico" alt="ApartamentsFiguerencs" width="100px" height="100px">
                    </div>
                    <form method="POST" action="index.php?r=registrar">
                        <div class="mb-3">
                            <label for="name" class="form-label text-white">Nom:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-id-card"></i></span>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nom" required/>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="last_name" class="form-label text-white">Cognoms:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-id-card"></i></span>
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Cognoms" required/>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="form-label text-white">Telèfon:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-mobile"></i></span>
                                <input type="tel" class="form-control" id="telephone" name="telephone" placeholder="Telèfon" required/>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label text-white">Correu Electrònic:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Correu Electrònic" required/>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label text-white">Contrasenya:</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Contrasenya" required/>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <a class=""><button type="submit" class="btnlogin btn btn-primary mb-2 text-center" id="BotonLogin">Registrar-se</button></a>
                        </div>
                        <div class="mb-3">
                            <p class="text-center text-white">Ja tens un compte creat ? <a href="index.php?r=login" class="text-decoration-none text-primary-emphasis">Iniciar sessió</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php require "footer.php"; ?>
</body>
</html>