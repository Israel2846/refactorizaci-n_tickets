<?php include_once '../resources/views/base/header.php'; ?>

<div class="ui segment container">

    <button class="ui blue button" id="btnNuevaCat">Crear nueva categoría</button>

    <table class="ui celled striped table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($categorias as $categoria) : ?>
                <tr>
                    <td><?= $categoria['cat_nom'] ?></td>

                    <td class="right aligned collapsing">

                        <button class="ui red circular button" onclick="modalDelete(<?= $categoria['id'] ?>)">Eliminar</button>

                        <button class="ui yellow circular button" onclick="modalEdit(<?= $categoria['id'] ?>)">Editar</button>

                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>

</div>

<?php

include_once '../resources/views/categorias/modales.php';
include_once '../resources/views/base/footer.php';

?>