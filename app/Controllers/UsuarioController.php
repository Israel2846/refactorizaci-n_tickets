<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Almacen;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()
    {
        $title = 'Usuario';

        $model_usuarios = new Usuario;
        $model_almacenes = new Almacen;

        $almacenes = $model_almacenes->get();

        if (isset($_GET['search'])) {
            $usuarios = $model_usuarios->where('nombre_almacen', 'LIKE', '%' . $_GET['search'] . '%')->paginate(10);
        } else {
            $usuarios = $model_usuarios->paginate(10);
        }

        return $this->view('usuarios.index', compact('title', 'usuarios', 'almacenes'));
    }

    public function create()
    {
        $data = $_POST;

        $model = new Usuario;
        $model->createUser($data);

        return $this->redirect('/usuario');
    }
}
