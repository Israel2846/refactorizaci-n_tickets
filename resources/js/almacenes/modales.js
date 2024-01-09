$(document).ready(function () {
    $('#btnNuevoAlmacen').on('click', function () {
        $('#headerCreateUpdate').html('Crear');

        $('#formCreateUpdate').attr('action', '/almacen/create');

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
});

function modalEdit(id) {
    $.get('/almacen/edit/' + id, function (data) {
        $('#headerCreateUpdate').html('Editar');

        $('#formCreateUpdate').attr('action', '/almacen/edit/' + data['id']);

        $('#inpModalCreateUpdate').val(data['nombre_almacen']);

        $('.ui.modal.create.update').modal('show');
    })
        .fail(function (textStatus, errorThrown) {
            console.error('Error en la solicitud', textStatus, errorThrown);
        });
}

function modalDelete(id) {
    let urlDelete = '/almacen/delete/' + id;

    $('#formDelete').attr('action', urlDelete);

    $('.ui.modal.delete').modal('show');
}