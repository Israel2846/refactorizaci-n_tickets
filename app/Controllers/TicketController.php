<?php

namespace App\Controllers;

use App\Models\Categoria;
use App\Models\Documento;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function index()
    {
        $title = 'Tickets';

        $modelCategoria = new Categoria;
        $modelTicket = new Ticket;

        $categorias = $modelCategoria->get();
        $tickets = $modelTicket
            ->select('tm_ticket.id', 'tm_categoria.cat_nom', 'tm_ticket.tick_titulo', 'tm_ticket.prio_id', 'tm_ticket.fech_crea', 'tm_ticket.fech_asig', 'tm_ticket.fech_cierre', 'creador.usu_nom AS creador')
            ->join('tm_ticket', 'cat_id', 'tm_categoria', 'id')
            ->join('tm_ticket', 'usu_id', 'tm_usuario', 'id', 'creador')
            ->get();

        return $this->view('tickets.index', compact('title', 'categorias', 'tickets'));
    }

    public function create()
    {
        session_start();

        $fechaActual = date('Y-m-d H:i:s');

        $data = $_POST;
        $data['usu_id'] = $_SESSION['id'];
        $data['fech_crea'] = $fechaActual;

        $model = new Ticket;

        $record = $model->create($data);

        // Procesamiento de archivos
        if (isset($_FILES["files"])) {
            $cantidadArchivos = count($_FILES["files"]["name"]);

            for ($i = 0; $i < $cantidadArchivos; $i++) {
                $nombreArchivo = $_FILES["files"]["name"][$i];
                $temporalArchivo = $_FILES["files"]["tmp_name"][$i];
                $directorioDestino = "../public/archivos/" . $record['id'] . "/";
                $rutaCompleta = $directorioDestino . $nombreArchivo;

                $modelDocumento = new Documento;

                $data = [];
                $data['tick_id'] = $record['id'];
                $data['doc_nom'] = $rutaCompleta;
                $data['fech_crea'] = $fechaActual;

                $modelDocumento->create($data);

                if (!is_dir($directorioDestino)) {
                    mkdir($directorioDestino, 0755, true);
                }

                move_uploaded_file($temporalArchivo, $rutaCompleta);
            }
        }

        return $this->redirect('/ticket');
    }
}
