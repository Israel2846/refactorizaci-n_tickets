$(document).ready(function () {
    $('#select').dropdown();

    $('#btnNuevaArea').on('click', function () {
        $('#headerCreateUpdate').html('Crear');

        $('#formCreateUpdate').attr('action', '/area/create');

        $('#inpModalCreateUpdate').val('');

        $('#select').dropdown('clear');

        $('.ui.modal.create.update').modal('show');
    });

    $('#btnCancelCreateUpdate').on('click', function (event) {
        event.preventDefault();
        $('.ui.modal.create.update').modal('hide');
    });

    $('#btnCancelElim').on('click', function (event) {
        event.preventDefault();
        $('.ui.modal.delete').modal('hide');
    });
});

function modalEdit(id) {
    $.get("/area/edit/" + id,
        function (data) {
            $('#headerCreateUpdate').html('editar');

            $('#formCreateUpdate').attr('action', '/area/edit/' + data['id']);

            $('#inpModalCreateUpdate').val(data['nombre_area']);

            $('#select').dropdown('set selected', data['id_almacen']);

            $('.ui.modal.create.update').modal('show');
        }
    ).fail(function (textStatus, errorThrown) {
        console.error('Error en la solicitud', textStatus, errorThrown);
    });
}

function modalDelete(id) {
    let urlDelete = '/area/delete/' + id;

    $('#formDelete').attr('action', urlDelete);

    $('.ui.modal.delete').modal('show');
}