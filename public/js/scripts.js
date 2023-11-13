
$(document).ready(function() {
    $('#inscripcionesTable').DataTable({
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

$(document).ready(function () {
    $('#cookieModal').modal('show');
});

$(document).ready(function () {
    $("#loginForm").submit(function (event) {
        event.preventDefault();

        var identificationCode = $("#identification_code").val();

        $.ajax({
            type: "POST",
            url: "index.php?r=validar",
            data: { code: identificationCode },
            success: function (data) {
                console.log(data);
            

                if (data.status === 'valid') {
                    $.ajax({
                        type: "GET",
                        url: "index.php?r=dologin",
                        success: function (consultasData) {
                        },
                        error: function (xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});