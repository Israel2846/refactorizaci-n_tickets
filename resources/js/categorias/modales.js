$(document).ready(function () {
    $('#btnNuevaCat').on('click', function () {
        $('#headerCreateUpdate').html('Crear');

        $('#formCreateUpdate').attr('action', '/categoria/create');

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
    $.get('/categoria/edit/' + id, function (data) {
        $('#headerCreateUpdate').html('Editar');

        $('#formCreateUpdate').attr('action', '/categoria/edit/' + data['id']);

        $('#inpModalCreateUpdate').val(data['cat_nom']);

        $('.ui.modal.create.update').modal('show');
    })
        .fail(function (jqXHR, textStatus, errorThrown) {
            console.error('Error en la solicitud:', textStatus, errorThrown);
        });
}

function modalDelete(id) {
    let urlDelete = '/categoria/delete/' + id;

    $('#formDelete').attr('action', urlDelete);

    $('.ui.modal.delete').modal('show');
}