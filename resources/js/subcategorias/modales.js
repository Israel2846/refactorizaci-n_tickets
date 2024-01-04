$(document).ready(function () {
    $('#select').dropdown();

    $('#btnNuevaSubCat').on('click', function () {
        $('#headerCreateUpdate').html('Crear');

        $('#formCreateUpdate').attr('action', '/subcategoria/create');

        $('#inpModalCreateUpdate').val('');

        $('#select').dropdown('clear');

        $('.ui.modal.create.update').modal('show');
    })

    $('#btnCancelCreateUpdate').on('click', function (event) {
        event.preventDefault();
        $('.ui.modal.create.update').modal('hide');
    })

    $('#btnCancelElim').on('click', function (event) {
        event.preventDefault();
        $('.ui.modal.delete').modal('hide');
    })
})

function modalEdit(id) {
    $.get('/subcategoria/edit/' + id, function (data) {
        $('#headerCreateUpdate').html('Editar');

        $('#formCreateUpdate').attr('action', '/subcategoria/edit/' + data['id']);

        $('#inpModalCreateUpdate').val(data['cats_nom']);

        $('#select').dropdown('set selected', data['cat_id']);

        $('.ui.modal.create.update').modal('show');
    })
        .fail(function (jqXHR, textStatus, errorThrown) {
            console.log('Error en la solicitud', textStatus, errorThrown);
        })
}

function modalDelete(id) {
    let urlDelete = '/subcategoria/delete/' + id;

    $('#formDelete').attr('action', urlDelete);

    $('.ui.modal.delete').modal('show');
}