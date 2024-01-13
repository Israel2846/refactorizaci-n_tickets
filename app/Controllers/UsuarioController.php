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

    public function login_form($mensaje = null)
    {
        if ($mensaje) {
            $mensaje = 'Credenciales incorrectas';
        }
        return $this->view('usuarios.login', compact('mensaje'));
    }

    public function login()
    {
        session_start();

        $data = $_POST;

        $model = new Usuario;

        $user_data = $model->loginUser($data);

        if ($user_data) {
            $_SESSION['id'] = $user_data['id'];
            $_SESSION['nombre'] = $user_data['usu_nom'];
            $_SESSION['apellido'] = $user_data['usu_ape'];
            $_SESSION['almacen'] = $user_data['usu_almacen'];
            $_SESSION['area'] = $user_data['usu_area'];
            $_SESSION['rol'] = $user_data['rol_id'];

            return $this->redirect('/categoria');
        } else {
            $this->redirect('/error/1');
        }
    }
}
