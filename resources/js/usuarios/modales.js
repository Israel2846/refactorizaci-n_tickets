$(document).ready(function () {
    $('.ui.dropdown').dropdown();

    $('#btnNuevoUsuario').on('click', function () {
        $('#headerCreateUpdate').html('Crear');

        $('#formCreateUpdate').attr('action', '/usuario/create');

        $('#inpModalCreateUpdate').val('');

        $('.ui.modal.create.update').modal('show');
    });

    $('#btnCancelCreateUpdate').on('click', function (event) {
        event.preventDefault();
        $('.ui.modal.create.update').modal('hide');
    })

    $('#btnCancelElim').on('click', function (event) {
        event.preventDefault();
        $('.ui.modal.delete').modal('hide');
    })

    $('#slcAlmacen').on('change', function () {
        const valorSeleccionado = $(this).val();

        llenarArea(valorSeleccionado);
    });
});

function llenarArea(valorSeleccionado) {
    obtenerOpcionesDinamicas(valorSeleccionado, function (opcionesDinamicas) {
        $('#slcArea').empty();

        $.each(opcionesDinamicas, function (indice, opcion) {
            $('#slcArea').append('<option value="' + opcion.id + '">' + opcion.nombre_area + '</option>');
        });

        $('#slcArea').dropdown('refresh');
    });
}

function obtenerOpcionesDinamicas(valorSeleccionado, callback) {
    $.ajax({
        type: "GET",
        url: "/usuario/comboArea/" + valorSeleccionado,
        dataType: "json",
        success: function (data) {
            callback(data);
        }
    });
}