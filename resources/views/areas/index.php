<?php include_once '../resources/views/base/header.php'; ?>

<div class="ui segment container">

    <button class="ui blue button" id="btnNuevaArea">Crear área</button>

    <table class="ui celled striped table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Álmacen</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($areas as $area) : ?>

                <tr>
                    <td><?= $area['nombre_area'] ?></td>

                    <?php foreach ($almacenes as $almacen) : ?>

                        <?php if ($area['id_almacen'] == $almacen['id']) : ?>

                            <td>
                                <?= $almacen['nombre_almacen'] ?>
                            </td>

                        <?php endif ?>

                    <?php endforeach ?>

                    <td class="right aligned collapsing">

                        <button class="ui red circular button" onclick="modalDelete(<?= $area['id'] ?>)">Eliminar</button>

                        <button class="ui yellow circular button" onclick="modalEdit(<?= $area['id'] ?>)">Editar</button>

                    </td>
                </tr>

            <?php endforeach ?>

        </tbody>

    </table>

</div>

<?php

include_once '../resources/views/areas/modales.php';
include_once '../resources/views/base/footer.php';

?>