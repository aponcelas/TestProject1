<!DOCTYPE html>
<html lang="en">

<head>
    <title>ApartamentsFiguerencs</title>
    <?php require 'libs.php'; ?>
    <script src="js/scripts.js"></script>
</head>

<body>
    <?php require "menu.php"; ?>
    <div class="container mt-5 contenidorcompte">
        <div class="row">
            <div class="col-md-6 mb-3 mt-md-0">
                <div class="bg-primary p-3 bg-dark rounded">
                    <div class="p-3 text-center">
                        <i class="fa-solid fa-user fa-3x d-block mx-auto" style="color: #ffffff;"></i>
                    </div>
                    <h1 class="mt-1 text-center text-white">DADES PERSONALS</h1>
                    <div class="p-3">
                        <form id="formulariName" method="post" action="index.php?r=updateuser" class="text-center">
                            <div class="mb-1">
                                <p class="textform">Nom</p>
                                <input type="text" class="texteditdades" id="name" name="name"
                                    value="<?php echo $users[0]["name"]; ?>" placeholder="Nom" required>
                            </div>
                            <div class="mb-1">
                                <p class="textform">Cognom:</p>
                                <input type="text" class="texteditdades" id="last_name" name="last_name"
                                    value="<?php echo $users[0]["last_name"]; ?>" required>
                            </div>
                            <div class="mb-1">
                                <p class="textform">Telèfon:</p>
                                <input type="text" class="texteditdades" id="telephone" name="telephone"
                                    value="<?php echo $users[0]["telephone"]; ?>" required>
                            </div>
                            <div class="mb-1">
                                <p class="textform">Correu Electrònic:</p>
                                <input type="text" class="texteditdades" id="email" name="email"
                                    value="<?php echo $users[0]["email"]; ?>" required>
                            </div>
                            <div class="mb-1">
                                <p class="textform">Tarjeta de crèdit:</p>
                                <input type="text" class="texteditdades" id="card_number" name="card_number"
                                    value="<?php echo $users[0]["card_number"]; ?>" required>
                            </div>
                            <button type="submit" class="confirmaredit">Confirmar</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Sección derecha -->
            <div class="col-md-6 mb-3 mt-md-0">
                <div class="bg-second p-3 bg-dark rounded">
                    <div class="p-3 text-center">
                        <i class="fa-solid fa-house fa-3x d-block mx-auto" style="color: #ffffff;"></i>
                    </div>
                    <h1 class="mt-1 text-center text-white">RESERVES</h1>
                    <?php
                    $numeroreserva = 0;
                    $numeroreservanum = 1;
                    $yesterday = date('Y-m-d', strtotime('-1 day'));

                    foreach ($reservations as $reservation) {
                        ?>
                        <div class="accordion" id="reservationsAccordion">
                            <div class="accordion-item">
                                <h2 class="accordion-header"
                                    id="heading<?php echo $reservations[$numeroreserva]["id_reserved"] ?>">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapse<?php echo $reservations[$numeroreserva]["id_reserved"] ?>"
                                            aria-expanded="true"
                                            aria-controls="collapse<?php echo $reservations[$numeroreserva]["id_reserved"] ?>">
                                        <?php echo 'Reserva: ' . $numeroreservanum; ?>
                                    </button>
                                </h2>
                                <div id="collapse<?php echo $reservations[$numeroreserva]["id_reserved"] ?>"
                                     class="accordion-collapse collapse show"
                                     aria-labelledby="heading<?php echo $reservations[$numeroreserva]["id_reserved"] ?>"
                                     data-bs-parent="#reservationsAccordion">
                                    <div class="accordion-body">
                                        <strong>Data de la entrada:</strong>
                                        <?php echo $reservations[$numeroreserva]["entry_date"] ?><br>
                                        <strong>Data de la sortida:</strong>
                                        <?php echo $reservations[$numeroreserva]["output_date"] ?><br>
                                        <strong>Estat:</strong>
                                        <?php
                                        $state = $reservations[$numeroreserva]["state"];
                                        if ($state === "Pending") {
                                            echo '<span style="color: red;"><strong>' . $state . '</strong></span>';
                                        } elseif ($state === "Confirmed") {
                                            echo '<span style="color: green;"><strong>' . $state . '</strong></span>';
                                        } else {
                                            echo '<strong>' . $state . '</strong>';
                                        }
                                        ?><br>
                                        <strong>Preu:</strong>
                                        <?php echo $reservations[$numeroreserva]["price"] ?><br>
                                        <a class="dropdown-item" href="index.php?r=exportICSuser&id=<?php echo $reservations[$numeroreserva]["id_reserved"]; ?>" style="text-decoration: underline;">Exportar Calendario en ICS</a>
                                        <div class="row">
                                        <div class="col-3 mt-2">
                                        <form method="POST" action="index.php?r=generatepdf">
                                            <input type="hidden" name="reservation_id" value="<?php echo $reservations[$numeroreserva]["id_reserved"]; ?>">
                                            <button type="submit" class="btn btn-success">Resguard</button>
                                        </form>
                                        </div>
                                        <div class="col-6 mt-2">
                                        <form method="POST" action="index.php?r=deletereservationuser">
                                            <input type="hidden" name="reservation_id" value="<?php echo $reservations[$numeroreserva]["id_reserved"]; ?>">
                                            <button type="submit" class="btn btn-danger">Eliminar reserva</button>
                                        </form>
                                        </div>
                                        </div>
                                        <?php
                                        if ($reservations[$numeroreserva]['entry_date'] < $yesterday) {
                                            echo '<h6 class="card-text text-danger mt-2">La teva reserva a vençut</h6>';
                                        } else {
                                            echo '<h6 class="card-text text-success mt-2">La teva reserva encara és</h6>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        $numeroreserva++;
                        $numeroreservanum++;
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <?php require "footer.php"; ?>
</body>

</html>
