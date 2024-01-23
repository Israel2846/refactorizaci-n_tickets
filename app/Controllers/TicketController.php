<?php

namespace App\Controllers;

use App\Models\Categoria;
use App\Models\Ticket;

class TicketController extends Controller
{
    public function index()
    {
        $title = 'Tickets';

        $modelCategoria = new Categoria;

        $categorias = $modelCategoria->get();

        return $this->view('tickets.index', compact('title', 'categorias'));
    }

    public function create()
    {
        session_start();

        $data = $_POST;
        $data['usu_id'] = $_SESSION['id'];
        $data['fech_crea'] = date('Y-m-d H:i:s');

        $model = new Ticket;

        $record = $model->create($data);

        // Procesamiento de archivos
        if (isset($_FILES["files"])) {
            $cantidadArchivos = count($_FILES["files"]["name"]);

            for ($i = 0; $i < $cantidadArchivos; $i++) {
                $nombreArchivo = $_FILES["files"]["name"][$i];
                $temporalArchivo = $_FILES["files"]["tmp_name"][$i];
                $directorioDestino = "../public/archivos/" . $record['id'] . "/";

                if (!is_dir($directorioDestino)) {
                    mkdir($directorioDestino, 0755, true);
                }

                move_uploaded_file($temporalArchivo, $directorioDestino . $nombreArchivo);
            }
        }
    }
}
