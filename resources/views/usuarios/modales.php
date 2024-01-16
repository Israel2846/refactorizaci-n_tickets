<!-- Start modal de creación modificación -->
<div class="ui modal create update">

    <div class="header" id="headerCreateUpdate"></div>

    <div class="content">

        <form id="formCreateUpdate" method="post" class="ui fluid form">

            <div class="three fields">

                <div class="field">
                    Nombre del usuario

                    <input type="text" name="usu_nom" id="inpNombre" placeholder="Ingrese el nombre del usuario" required>
                </div>

                <div class="field">
                    Apellido

                    <input type="text" name="usu_ape" id="inpApellido" placeholder="Ingrese el apellido del usuario" required>
                </div>

                <div class="field">
                    Numero de colaborador

                    <input type="number" name="num_colab" id="inpNumColab" placeholder="Ingrese el numero de colaborador" required>
                </div>

            </div>

            <div class="four fields">
                <div class="field">
                    Correo

                    <input type="email" name="usu_correo" id="inpMail" placeholder="Ingrese el correo electronico" required>
                </div>

                <div class="field">
                    Contraseña

                    <input type="password" name="usu_pass" placeholder="Ingrese la contraseña" required>
                </div>

                <div class="field">
                    Almacén

                    <select name="usu_almacen" id="slcAlmacen" class="ui search dropdown" required>
                        <option value="">Ingrese un álmacen</option>

                        <?php foreach ($almacenes as $almacen) : ?>
                            <option value="<?= $almacen['id'] ?>"><?= $almacen['nombre_almacen'] ?></option>
                        <?php endforeach ?>

                    </select>
                </div>

                <div class="field">
                    Area

                    <select name="usu_area" id="slcArea" class="ui search dropdown" required>
                        <option value="">Ingrese un área</option>
                    </select>
                </div>

            </div>

            <div class="two fields">

                <div class="field">
                    Rol

                    <select name="rol_id" id="rolId" class="ui search dropdown" required>
                        <option value="">Seleccione una opción</option>
                        <option value="2">Admin</option>
                        <option value="1">Soporte</option>
                        <option value="3">Usuario</option>
                    </select>
                </div>

                <div class="field">
                    Teléfono

                    <input type="number" name="usu_telf" id="usuTelf" placeholder="Ingrese número telefónico" required>
                </div>

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
                ¿Eliminar la categoría?
            </div>

            <button type="submit" class="ui red button">Eliminar</button>

            <button id="btnCancelElim" class="ui button">Cancelar</button>

        </form>

    </div>
</div>
<!-- End modal de eliminación -->

<script>
    <?php include_once '../resources/js/usuarios/modales.js' ?>
</script>