$('#btnNuevaCat').on('click', function () {
    $('#headerCreateUpdate').html('Crear');

    $('#formCreateUpdate').attr('action', '/categoria/create');

    $('.ui.modal.create.update').modal('show');
});

$('#btnCancelElim').on('click', function (event) {
    event.preventDefault();
    $('.ui.modal.delete').modal('hide');
})

$('#btnCancelCreateUpdate').on('click', function (event) {
    event.preventDefault();
    $('.ui.modal.create.update').modal('hide');
})

function modalEdit(id) {
    $.get('/categoria/edit/' + id, function (data) {
        $('#headerCreateUpdate').html('Editar');

        $('#formCreateUpdate').attr('action', '/categoria/edit/' + data['id']);

        $('#inpModalCreateUpdate').attr('value', data['cat_nom']);

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