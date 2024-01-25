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
                <th>F. Asignación</th>
                <th>T. Respuesta</th>
                <th>T. Transcurrido</th>
                <th>T. Total</th>
                <th>F. Cierre</th>
                <th>Creador</th>
                <th>Ver</th>
            </tr>
        </thead>
    </table>
</div>

<?php 

include_once '../resources/views/tickets/modales.php';
include_once '../resources/views/base/footer.php';

?>