var map; // Inicialitzem una variable pel mapa

// Event que canvia el text del botó del buscador
$(document).ready(function() {
    var toggleSearchButton = $('#toggleSearchButton');
    var searchForm = $('#searchForm');

    searchForm.on('show.bs.collapse', function () {
        toggleSearchButton.text('Tancar');
    });

    searchForm.on('hide.bs.collapse', function () {
        toggleSearchButton.text('Obrir');
    });
});

// Funció anònima
$(function() {

    // Funció per formatar el calendari
    function initializeDatepicker(selector) {
        $(selector).datepicker({
            dateFormat: "yy-mm-dd",
            minDate: 0,
            maxDate: "+1Y",
            changeMonth: true,
            changeYear: true,
        });

        // Event per obrir el calendari
        $(selector).on("click", function() {
            $(this).datepicker("show");
        });
    }

    // Inicialitzem els calendaris
    initializeDatepicker("#end_Date");
    initializeDatepicker("#start_Date");
    initializeDatepicker("#endDate");
    initializeDatepicker("#startDate");
});

// Ajax
$(document).ready(function() {

    // Event per reajustar el mapa carregat
    $('#exampleModal').on('shown.bs.modal', function (e) {
        if (map) { map.invalidateSize(); }
    });

    // Event que fara una petició ajax a un controlador al obrir el modal
    $(".card-body").off("click").on("click", function() {

        // Obtenim l'id del apartament
        var $this = $(this);
        var apartamentId = $this.data("apartament-id");

        $.ajax({
            type: "GET",
            url: "index.php?r=infoapartamentajax",
            data: { apartament_id: apartamentId },
            contentType: "application/json; charset=utf-8",
            dataType: "json",
            success: function(data) {

                // Si existeix el mapa del anterior modal carregat, l'eliminem
                if (map) { map.remove(); }

                // Declarem les variables per l'apartament i les temporades
                var apartment = data['apartament'][0];
                var lowSeason = data['season'][0];
                var highSeason = data['season'][1];

                // Obtenim el preu per dia de l'apartament a partir de la temporada
                var price = getPrice(apartment, lowSeason, highSeason);

                // Emplenem el contingut del modal amb les dades del apartament
                $(".modal-title").text(apartment.title);
                $(".address").text(apartment.postal_address);
                $(".length_latitude").text(apartment.latitude + " - " + apartment.length);
                $(".square_metres").text(apartment.square_metres + " m²");
                $(".number_rooms").text(apartment.number_rooms + " habitaciones");
                $(".services_extra").text(apartment.services_extra);
                $(".short_description").text(apartment.short_description);
                $(".price").text(price + " € per dia");

                // Emplenem els valors ocults del formulari
                $("#apartment_id").val(apartment.id_apartment);
                $("#high_price").val(apartment.price_day_high_season);
                $("#low_price").val(apartment.price_day_low_season);

                // Actuaitzem el valors del formulario de reserva
                $("#start_Date").datepicker("option", "minDate", apartment.start_date);
                $("#start_Date").datepicker("option", "maxDate", apartment.end_date);
                $("#end_Date").datepicker("option", "minDate", apartment.start_date);
                $("#end_Date").datepicker("option", "maxDate", apartment.end_date);

                // Inicialitzem el calendari amb les dades de cada apartament
                map = L.map('map').setView([apartment.latitude, apartment.length], 7);

                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                 maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);
               
                var marker = L.marker([apartment.latitude, apartment.length]).addTo(map);
            },
            error: function(xhr, textStatus, errorThrown) {
                console.log("Error en la solicitud AJAX: " + errorThrown);
            }
        });
    });
});

// Funcio per obtenir el preu del apartament a partir de la temporada
function getPrice(apartment, lowSeason, highSeason) {
    if (apartment.start_date >= lowSeason.start_date && apartment.end_date <= lowSeason.end_date) {
        return price = apartment.price_day_low_season;
    } else if (apartment.start_date >= highSeason.start_date && apartment.end_date <= highSeason.end_date) {
        return price = apartment.price_day_high_season;
    } else {
        var daysLowSeason = Math.floor((lowSeason.end_date - apartment.start_date) / (1000 * 60 * 60 * 24));
        var daysHighSeason = Math.floor((apartment.end_date - highSeason.start_date) / (1000 * 60 * 60 * 24));
    
        if (daysHighSeason > daysLowSeason) {
            return price = apartment.price_day_high_season;
        } else {
            return price = apartment.price_day_low_season;
        }
    }
};



         

                

  // Aquestes funcions serveixen per navegar entre les taules del panel de control
$(document).ready(function() {
    $("#usuarios-tab").click(function() {
        $("#seasons-tab").removeClass("active");
        $("#editar-usuaris-content").removeClass("active");
        $("#afegir-apartaments-content").removeClass("active");
        $("#apartaments-tab").removeClass("active");
        $("#reservas-tab").removeClass("active");
        $("#usuarios-tab").addClass("active");
        $("#afegir-usuaris-content").removeClass("active");
        $("#apartament-images-tab").removeClass("active");
        $("#reservas-content").addClass("d-none");
        $("#usuarios-content").removeClass("d-none");
        $("#afegir-content").addClass("d-none");
        $("#apartament-content").addClass("d-none");
        $("#apartament-afegir").addClass("d-none");
        $("#seasons-content").addClass("d-none");
        $("#edit-users").addClass("d-none");
        $("#apartament-images-content").addClass("d-none");
    });

    $("#editar-usuaris-content").click(function() {
        $("#editar-usuaris-content").addClass("active");
        $("#usuarios-tab").removeClass("active");
        $("#reservas-tab").removeClass("active");
        $("#apartaments-tab").removeClass("active");
        $("#afegir-usuaris-content").removeClass("active");
        $("#afegir-apartaments-content").removeClass("active");
        $("#seasons-tab").removeClass("active");
        $("#apartament-images-tab").removeClass("active");
        $("#usuarios-content").addClass("d-none");
        $("#reservas-content").addClass("d-none");
        $("#afegir-content").addClass("d-none");
        $("#apartament-content").addClass("d-none");
        $("#seasons-content").addClass("d-none");
        $("#apartament-afegir").addClass("d-none");
        $("#edit-users").removeClass("d-none");
        $("#apartament-images-content").addClass("d-none");
    });

    $("#afegir-usuaris-content").click(function() {
        $("#afegir-usuaris-content").addClass("active");
        $("#editar-usuaris-content").removeClass("active");
        $("#apartaments-tab").removeClass("active");
        $("#usuarios-tab").removeClass("active");
        $("#reservas-tab").removeClass("active");
        $("#afegir-apartaments-content").removeClass("active");
        $("#seasons-tab").removeClass("active");
        $("#apartament-images-tab").removeClass("active");
        $("#usuarios-content").addClass("d-none");
        $("#afegir-content").removeClass("d-none");
        $("#reservas-content").addClass("d-none");
        $("#apartament-content").addClass("d-none");
        $("#seasons-content").addClass("d-none");
        $("#apartament-afegir").addClass("d-none");
        $("#edit-users").addClass("d-none");
        $("#apartament-images-content").addClass("d-none");
    });

    $("#reservas-tab").click(function() {
        $("#reservas-tab").addClass("active");
        $("#editar-usuaris-content").removeClass("active");
        $("#apartaments-tab").removeClass("active");
        $("#usuarios-tab").removeClass("active");
        $("#afegir-usuaris-content").removeClass("active");
        $("#afegir-apartaments-content").removeClass("active");
        $("#seasons-tab").removeClass("active");
        $("#apartament-images-tab").removeClass("active");
        $("#reservas-content").removeClass("d-none");
        $("#usuarios-content").addClass("d-none");
        $("#afegir-content").addClass("d-none");
        $("#apartament-content").addClass("d-none");
        $("#seasons-content").addClass("d-none");
        $("#apartament-afegir").addClass("d-none");
        $("#edit-users").addClass("d-none");
        $("#apartament-images-content").addClass("d-none");
    });


    $("#apartaments-tab").click(function() {
        $("#apartaments-tab").addClass("active");
        $("#editar-usuaris-content").removeClass("active");
        $("#reservas-tab").removeClass("active");
        $("#usuarios-tab").removeClass("active");
        $("#afegir-apartaments-content").removeClass("active");
        $("#afegir-usuaris-content").removeClass("active");
        $("#seasons-tab").removeClass("active");
        $("#apartament-images-tab").removeClass("active");
        $("#reservas-content").addClass("d-none");
        $("#usuarios-content").addClass("d-none");
        $("#afegir-content").addClass("d-none");
        $("#apartament-content").removeClass("d-none");
        $("#seasons-content").addClass("d-none");
        $("#apartament-afegir").addClass("d-none");
        $("#edit-users").addClass("d-none");
        $("#apartament-images-content").addClass("d-none");
    });

    $("#afegir-apartaments-content").click(function() {
        $("#afegir-apartaments-content").addClass("active");
        $("#apartaments-tab").removeClass("active");
        $("#editar-usuaris-content").removeClass("active");
        $("#reservas-tab").removeClass("active");
        $("#usuarios-tab").removeClass("active");
        $("#seasons-tab").removeClass("active");
        $("#afegir-usuaris-content").removeClass("active");
        $("#apartament-images-tab").removeClass("active");
        $("#reservas-content").addClass("d-none");
        $("#usuarios-content").addClass("d-none");
        $("#afegir-content").addClass("d-none");
        $("#apartament-content").addClass("d-none");
        $("#seasons-content").addClass("d-none");
        $("#apartament-afegir").removeClass("d-none");
        $("#edit-users").addClass("d-none");
        $("#apartament-images-content").addClass("d-none");
    });


    $("#seasons-tab").click(function() {
        $("#seasons-tab").addClass("active");
        $("#afegir-apartaments-content").removeClass("active");
        $("#apartaments-tab").removeClass("active");
        $("#editar-usuaris-content").removeClass("active");
        $("#reservas-tab").removeClass("active");
        $("#usuarios-tab").removeClass("active");
        $("#afegir-usuaris-content").removeClass("active");
        $("#apartament-images-tab").removeClass("active");
        $("#reservas-content").addClass("d-none");
        $("#usuarios-content").addClass("d-none");
        $("#afegir-content").addClass("d-none");
        $("#apartament-content").addClass("d-none");
        $("#apartament-afegir").addClass("d-none");
        $("#seasons-content").removeClass("d-none");
        $("#edit-users").addClass("d-none");
        $("#apartament-images-content").addClass("d-none");
        $("#apartament-images-tab").removeClass("active");
    });

    $("#apartament-images-tab").click(function() {
        $("#apartaments-tab").removeClass("active");
        $("#apartament-images-tab").addClass("active");
        $("#editar-usuaris-content").removeClass("active");
        $("#reservas-tab").removeClass("active");
        $("#usuarios-tab").removeClass("active");
        $("#afegir-apartaments-content").removeClass("active");
        $("#afegir-usuaris-content").removeClass("active");
        $("#seasons-tab").removeClass("active");
        $("#reservas-content").addClass("d-none");
        $("#usuarios-content").addClass("d-none");
        $("#afegir-content").addClass("d-none");
        $("#apartament-content").addClass("d-none");
        $("#seasons-content").addClass("d-none");
        $("#apartament-afegir").addClass("d-none");
        $("#edit-users").addClass("d-none");
        $("#apartament-images-content").removeClass("d-none");
    });
    
});
//Aquestes funcions serveixen per traduir els botons de DataTables d'anglès a català.
$(document).ready(function() {
    $('#usuarios-table').DataTable({
        "language": {
            "decimal":        "",
            "emptyTable":     "No hi ha dades disponibles a la taula",
            "info":           "Mostrant _START_ a _END_ de _TOTAL_ entrades",
            "infoEmpty":      "Mostrant 0 a 0 de 0 entrades",
            "infoFiltered":   "(filtrades d'un total de _MAX_ entrades)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Mostrar _MENU_ entrades",
            "loadingRecords": "Carregant...",
            "processing":     "Processant...",
            "search":         "Cerca:",
            "zeroRecords":    "No s'han trobat registres coincidents",
            "paginate": {
                "first":      "Primer",
                "last":       "Darrer",
                "next":       "Següent",
                "previous":   "Anterior"
            },
            "aria": {
                "sortAscending":  ": activar per ordenar la columna ascendentment",
                "sortDescending": ": activar per ordenar la columna descendentment"
            }
        }
    });
});


$(document).ready(function() {
    $('#reservas-table').DataTable({
        "language": {
            "decimal":        "",
            "emptyTable":     "No hi ha dades disponibles a la taula",
            "info":           "Mostrant _START_ a _END_ de _TOTAL_ entrades",
            "infoEmpty":      "Mostrant 0 a 0 de 0 entrades",
            "infoFiltered":   "(filtrades d'un total de _MAX_ entrades)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Mostrar _MENU_ entrades",
            "loadingRecords": "Carregant...",
            "processing":     "Processant...",
            "search":         "Cerca:",
            "zeroRecords":    "No s'han trobat registres coincidents",
            "paginate": {
                "first":      "Primer",
                "last":       "Darrer",
                "next":       "Següent",
                "previous":   "Anterior"
            },
            "aria": {
                "sortAscending":  ": activar per ordenar la columna ascendentment",
                "sortDescending": ": activar per ordenar la columna descendentment"
            }
        }
    });
});


$(document).ready(function() {
    $('#apartament-table').DataTable({
        "language": {
            "decimal":        "",
            "emptyTable":     "No hi ha dades disponibles a la taula",
            "info":           "Mostrant _START_ a _END_ de _TOTAL_ entrades",
            "infoEmpty":      "Mostrant 0 a 0 de 0 entrades",
            "infoFiltered":   "(filtrades d'un total de _MAX_ entrades)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Mostrar _MENU_ entrades",
            "loadingRecords": "Carregant...",
            "processing":     "Processant...",
            "search":         "Cerca:",
            "zeroRecords":    "No s'han trobat registres coincidents",
            "paginate": {
                "first":      "Primer",
                "last":       "Darrer",
                "next":       "Següent",
                "previous":   "Anterior"
            },
            "aria": {
                "sortAscending":  ": activar per ordenar la columna ascendentment",
                "sortDescending": ": activar per ordenar la columna descendentment"
            }
        }
    });
});

$(document).ready(function() {
    $('#seasons-table').DataTable({
         "language": {
            "decimal":        "",
            "emptyTable":     "No hi ha dades disponibles a la taula",
            "info":           "Mostrant _START_ a _END_ de _TOTAL_ entrades",
            "infoEmpty":      "Mostrant 0 a 0 de 0 entrades",
            "infoFiltered":   "(filtrades d'un total de _MAX_ entrades)",
            "infoPostFix":    "",
            "thousands":      ",",
            "lengthMenu":     "Mostrar _MENU_ entrades",
            "loadingRecords": "Carregant...",
            "processing":     "Processant...",
            "search":         "Cerca:",
            "zeroRecords":    "No s'han trobat registres coincidents",
            "paginate": {
                "first":      "Primer",
                "last":       "Darrer",
                "next":       "Següent",
                "previous":   "Anterior"
            },
            "aria": {
                "sortAscending":  ": activar per ordenar la columna ascendentment",
                "sortDescending": ": activar per ordenar la columna descendentment"
            }
        }
    });
});



