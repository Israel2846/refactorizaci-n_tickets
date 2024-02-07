<?php include_once '../resources/views/base/header.php'; ?>

<div class="ui segment container">
    <h1>Tickets</h1>

    <buttom class="ui blue button" id="btnNuevoTicket">Nuevo Ticket</buttom>

    <table class="ui celled striped table">
        <thead>
            <tr>
                <th>#Ticket</th>
                <th>Categoría</th>
                <th>Título</th>
                <th>Prioridad</th>
                <th>F. Creación</th>
                <th>Creador</th>
                <th>Soporte</th>
                <th>Ver</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($tickets as $ticket) : ?>
                <tr>
                    <td><?= $ticket['id'] ?></td>
                    <td><?= $ticket['cat_nom'] ?></td>
                    <td><?= $ticket['tick_titulo'] ?></td>
                    <td class="center collapsing">
                        <?php if ($ticket['prio_id'] == 1) : ?>
                            <p class="ui green circular label">Baja</p>
                        <?php elseif ($ticket['prio_id'] == 2) : ?>
                            <p class="ui yellow circular label">Media</p>
                        <?php elseif ($ticket['prio_id'] == 3) : ?>
                            <p class="ui red circular label">Alta</p>
                        <?php endif ?>
                    </td>
                    <td><?= $ticket['fech_crea'] ?></td>
                    <td><?= $ticket['creador'] ?></td>
                    <td>Pendiente</td>
                    <td class="rigth aligned collapsing">
                        <a href="#" class="ui circular blue icon button">
                            <i class="eye icon"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?php

include_once '../resources/views/tickets/modales.php';
include_once '../resources/views/base/footer.php';

?>