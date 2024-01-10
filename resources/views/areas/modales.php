<!-- Start modal de creación modificación -->
<div class="ui modal create update">

    <div class="header" id="headerCreateUpdate"></div>

    <div class="content">

        <form id="formCreateUpdate" method="post" class="ui fluid form">

            <div class="field">
                <label for="cats_nom">Nombre del área</label>
                <input type="text" name="nombre_area" id="inpModalCreateUpdate" placeholder="Ingrese el nombre del área" required>
            </div>

            <div class="field">

                <label for="cat_id">Álmacen al que pertenece</label>

                <select name="id_almacen" class="ui search selection dropdown" id="select" required>
                    <option value="">Seleccione almacén</option>

                    <?php foreach ($almacenes as $almacen) : ?>

                        <option value="<?= $almacen['id'] ?>"><?= $almacen['nombre_almacen'] ?></option>

                    <?php endforeach ?>

                </select>

            </div>

            <button type="submit" class="ui blue button">Envíar</button>

            <button id="btnCancelCreateUpdate" class="ui button">Cancelar</button>

        </form>

    </div>
</div>
<!-- End modal de creación modificación -->

<!-- Start modal de eliminación -->
<div class="ui modal delete">

    <div class="header">Eliminar</div>

    <div class="content">

        <form id="formDelete" method="post" class="ui fluid form">

            <div class="field">
                <label for="cat_nom">¿Eliminar la subcategoría?</label>
            </div>

            <button type="submit" class="ui red button">Eliminar</button>

            <button id="btnCancelElim" class="ui button">Cancelar</button>

        </form>

    </div>
</div>
<!-- End modal de eliminación -->

<script>
    <?php include_once '../resources/js/areas/modales.js' ?>
</script>