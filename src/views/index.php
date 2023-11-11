<!DOCTYPE html>
<html lang="en">
<head>
    <title>ApartamentsFiguerencs</title>
    <?php require 'libs.php'; ?>
    <script src="js/scripts.js"></script>
</head>
<body>
    <?php require "menu.php"; ?>
    <div class="bg-primary">
        <h1 class="sloganweb">Reserva el teu racó a Figueres, el teu apartament a la Costa Brava.</h1>
    </div>
    <div class="container mt-5 mb-5">
        <div class="divapartaments">
            <?php foreach ($apartaments as $apartament) { ?>
                <div class="card" id="card">
                    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <?php foreach ($images[$apartament['id_apartment']] as $key => $image) { ?>
                                <div class="carousel-item <?= $key === 0 ? 'active' : ''; ?>">
                                    <img src="<?= $image['image_path']; ?>" class="d-block w-100" alt="Image <?= $key + 1 ?> for <?= $apartament['title'] ?>">
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="card-body" data-bs-toggle="modal" data-bs-target="#exampleModal" data-apartament-id="<?= $apartament['id_apartment']; ?>">
                        <h5 class="card-title"><?= $apartament["title"]  . " - " . $prices[$apartament['id_apartment']] ?>€</h5>
                        <p class="card-text"><?= $apartament["postal_address"] ?></p>
                        <p class="card-text"><?= $apartament["short_description"] ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php require "footer.php"; ?>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h4>Formulari de reserva:</h4>
                    <div class="p-4 container-opacity border rounded mb-3">
                        <div class="col-12 d-flex justify-content-center align-items-center">
                            <img src="/img/ApartamentsFiguerencs2.ico" alt="ApartamentsFiguerencs" width="100px" height="100px">
                        </div>
                        <form id="DoReservation" method="POST" action="index.php?r=doreservation">
                            <input type="hidden" name="apartment_id" id="apartment_id" value="">
                            <input type="hidden" name="high_price" id="high_price" value="">
                            <input type="hidden" name="low_price" id="low_price" value="">
                            <div class="mb-3">
                                <label for="date" class="form-label">Data d'entrada:</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-regular fa-calendar"></i></span>
                                    <input class="form-control" type="text" id="start_Date" name="startDate" placeholder="Seleccionar data" min="" max="" style="z-index: 1060;"/>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Data de sortida:</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="fa-regular fa-calendar"></i></span>
                                    <input class="form-control" type="text" id="end_Date" name="endDate" placeholder="Seleccionar data" min="" max="" style="z-index: 1060;"/>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <button class="btn btn-primary" type="submit">Reservar</button>
                            </div>
                        </form>
                    </div>
                    <h4>Informació del apartament:</h4>
                    <ul class="list-group w-100 mb-3">
                        <li class="list-group-item">
                            <div class="list-item-container">
                                <i class="fa-solid fa-location-dot me-3"></i>
                                <p class="address"></p>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="list-item-container">
                                <i class="fa-solid fa-map me-3"></i>
                                <p class="length_latitude"></p>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="list-item-container">
                                <i class="fa-solid fa-house me-3"></i>
                                <p class="square_metres"></p>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="list-item-container">
                                <i class="fa-solid fa-house me-3"></i>
                                <p class="number_rooms"></p>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="list-item-container">
                                <i class="fa-solid fa-wifi me-3"></i>
                                <p class="services_extra"></p>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="list-item-container">
                                <i class="fa-solid fa-book me-3"></i>
                                <p class="short_description"></p>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="list-item-container">
                                <i class="fa-solid fa-money-bill-1"></i>
                                <p class="price"></p>
                            </div>
                        </li>
                    </ul>
                    <h4>Ubicació:</h4>
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
