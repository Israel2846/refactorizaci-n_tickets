<?php include_once '../resources/views/base/header.php'; ?>

<div class="ui segment container">

    <button id="btnNuevaSubCat" class="ui blue button">Crear subcategoría</button>

    <table class="ui celled striped table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Categoría</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($subcategorias as $subcategoria) : ?>
                <tr>
                    <td><?= $subcategoria['cats_nom'] ?></td>

                    <?php foreach ($categorias as $categoria) : ?>

                        <?php if ($subcategoria['cat_id'] == $categoria['id']) : ?>
                            <td>
                                <?= $categoria['cat_nom'] ?>
                            </td>
                        <?php endif ?>

                    <?php endforeach ?>

                    <td class="right aligned collapsing">

                        <button class="ui red circular button" onclick="modalDelete(<?= $subcategoria['id'] ?>)">Eliminar</button>

                        <button class="ui yellow circular button" onclick="modalEdit(<?= $subcategoria['id'] ?>)">Editar</button>

                    </td>
                </tr>
            <?php endforeach ?>

        </tbody>
    </table>

</div>

<?php

include_once '../resources/views/subcategorias/modales.php';
include_once '../resources/views/base/footer.php';

?>