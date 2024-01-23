<!-- Start modal de creación modificación -->
<div class="ui modal create update">

    <div class="header" id="headerCreateUpdate"></div>

    <div class="content">

        <!-- Start formulario de envío de datos -->
        <form id="formCreateUpdate" method="post" class="ui fluid form" enctype="multipart/form-data">

            <div class="field">
                Título
                <input type="text" name="tick_titulo" id="inpTitulo" placeholder="Ingrese el título del ticket" required>
            </div>

            <div class="two fields">

                <div class="field">
                    Categoría
                    <select name="cat_id" id="slcCategoria" class="ui search dropdown" required>
                        <option value="">Ingrese una categoría</option>

                        <?php foreach ($categorias as $categoria) : ?>
                            <option value="<?= $categoria['id'] ?>"><?= $categoria['cat_nom'] ?></option>
                        <?php endforeach ?>
                        
                    </select>
                </div>

                <div class="field">
                    Subcategoría
                    <select name="cats_id" id="slcSubCategoria" class="ui search dropdown">
                        <option value="">Ingrese una subcategoría</option>
                    </select>
                </div>

            </div>

            <div class="two fields">

                <div class="field">
                    Prioridad
                    <select name="prio_id" id="slcPrioridad" class="ui search dropdown">
                        <option value="">Seleccione una prioridad</option>
                        <option value="1">Baja</option>
                        <option value="2">Media</option>
                        <option value="3">Alta</option>
                    </select>
                </div>

                <div class="field">
                    Archivos
                    <input type="file" name="files[]" id="files" multiple>
                </div>

            </div>

            <div class="field">
                Descripción
                <textarea name="tick_descrip" id="txaDescripcion" cols="30" rows="10"></textarea>
            </div>

            <button type="submit" class="ui blue button">Envíar</button>
            <button id="btnCancelCreateUpdate" class="ui button">Cancelar</button>

        </form>
        <!-- End formulario de envío de datos -->

    </div>
</div>
<!-- End modal de creación modificación -->

<!-- Start modal de eliminación -->
<div class="ui modal delete">

    <div class="header">Eliminar</div>

    <div class="content">

        <!-- Start formulario de eliminación -->
        <form id="formDelete" method="post" class="ui fluid form">

            <div class="field">
                <label for="cat_nom">¿Eliminar ticket?</label>
            </div>

            <button type="submit" class="ui red button">Eliminar</button>

            <button id="btnCancelElim" class="ui button">Cancelar</button>

        </form>
        <!-- End formulario de eliminación -->

    </div>
</div>
<!-- End modal de eliminación -->

<script>
    <?php include_once '../resources/js/tickets/modales.js' ?>
</script>