<!DOCTYPE html>
<html lang="en">
<head>
    <title>Missatges rebuts</title>
    <script src="js/scripts.js"></script>
    <?php require 'libs.php'; ?>

</head>
<body>
    <?php require "menu.php" ?>
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nom</th>
                <th scope="col">Correu electrònic</th>
                <th scope="col">Missatge</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($messages as $messages): ?>
            <tr>
                <th scope="row"><?= $messages['id'] ?></th>
                <td><?= $messages['name'] ?></td>
                <td><?= $messages['email'] ?></td>
                <td><?= $messages['message'] ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>