$(document).ready(function () {
    $('.ui.dropdown').dropdown();

    $('#btnNuevoTicket').on('click', function () {
        $('#headerCreateUpdate').html('Crear');

        $('#formCreateUpdate').attr('action', '/ticket/create');

        $('#formCreateUpdate')[0].reset();
        $('.ui.search.dropdown').dropdown('clear');

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

    $('#slcCategoria').on('change', function () {
        const valorSeleccionado = $(this).val();
        llenarSubCat(valorSeleccionado);
    })
});

function llenarSubCat(valorSeleccionado) {
    obtenerOpcionesDinamicas(valorSeleccionado, function (opcionesDinamicas) {
        $('#slcSubCategoria').empty();
        $('#slcSubCategoria').dropdown('clear');

        $.each(opcionesDinamicas, function (indice, opcion) {
            $('#slcSubCategoria').append('<option value="' + opcion.id + '">' + opcion.cats_nom + '</option>');
        });

        $('#slcSubCategoria').dropdown('refresh');
    });
}

function obtenerOpcionesDinamicas(valorSeleccionado, callback) {
    $.ajax({
        type: "GET",
        url: "/ticket/comboSubCat/" + valorSeleccionado,
        dataType: "json",
        success: function (data) {
            callback(data);
        }
    });
}