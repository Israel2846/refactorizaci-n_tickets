<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Almacen;

class AlmacenController extends Controller
{
    public function index()
    {
        $title = 'Almacen';

        $model = new Almacen;

        if (isset($_GET['search'])) {
            $almacenes = $model->where('nombre_almacen', 'LIKE', '%' . $_GET['search'] . '%')->get();
        } else {
            $almacenes = $model->get();
        }

        return $this->view('almacenes.index', compact('title', 'almacenes'));
    }

    public function store()
    {
        $data = $_POST;

        $model = new Almacen;
        $model->create($data);

        return $this->redirect('/almacen');
    }

    public function edit($id)
    {
        $model = new Almacen;

        return $model->find($id);
    }

    public function update($id)
    {
        $data = $_POST;

        $model = new Almacen;
        $model->update($id, $data);

        return $this->redirect('/almacen');
    }

    public function destroy($id)
    {
        $model = new Almacen;
        $model->delete($id);

        return $this->redirect('/almacen');
    }
}
