$(document).ready(function () {
    $('.ui.dropdown').dropdown();

    $('#btnNuevoUsuario').on('click', function () {
        $('#headerCreateUpdate').html('Crear');

        $('#formCreateUpdate').attr('action', '/usuario/create');

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

function modalEdit(id) {
    $.get("/usuario/edit/" + id,
        function (data) {
            $('#headerCreateUpdate').html('Crear');

            $('#formCreateUpdate').attr('action', '/usuario/edit/' + data['id']);

            $('#inpNombre').val(data['usu_nom']);
            $('#inpApellido').val(data['usu_ape']);
            $('#inpNumColab').val(data['num_colab']);
            $('#inpMail').val(data['usu_correo']);
            $('#slcAlmacen').dropdown('set selected', data['usu_almacen']);
            $('#slcArea').dropdown('set selected', data['usu_area']);
            $('#rolId').dropdown('set selected', data['rol_id']);
            $('#usuTelf').val(data['usu_telf']);

            $('.ui.modal.create.update').modal('show');
        },
        "json"
    ).fail(
        function (textStatus, errorThrown) {
            console.error('Error en la solicitud', textStatus, errorThrown);
        }
    );
}

function modalDelete(id) {
    const urlDelete = '/usuario/delete/' + id;

    $('#formDelete').attr('action', urlDelete);

    $('.ui.modal.delete').modal('show');
}