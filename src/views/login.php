<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Form</title>
    <?php require 'libs.php' ?>
    <script src="js/scripts.js"></script>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Login</div>
                <div class="card-body">
                <form action="" method="post" id="loginForm">
                    <input type="hidden" name="r" value="dologin">
                    <div class="form-group">
                        <label for="identification_code">Codi d'identificació</label>
                        <input type="text" class="form-control" id="identification_code" name="identification_code" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Entrar</button>
                </form>

                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
