<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Almacen;
use App\Models\Area;

class AreaController extends Controller
{
    public function index()
    {
        $title = 'Área';

        $modelAlmacen = new Almacen;
        $modelArea = new Area;

        $almacenes = $modelAlmacen->get();
        $areas = $modelArea->get();

        return $this->view('areas.index', compact('title', 'almacenes', 'areas'));
    }

    public function store()
    {
        $data = $_POST;

        $model = new Area;
        $model->create($data);

        return $this->redirect('/area');
    }

    public function edit($id)
    {
        $model = new Area;

        return $model->find($id);
    }

    public function update($id)
    {
        $data = $_POST;

        $model = new Area;
        $model->update($id, $data);

        return $this->redirect('/area');
    }

    public function destroy($id)
    {
        $model = new Area;
        $model->delete($id);

        return $this->redirect('/area');
    }

    public function getAreaPorAlmacen($id)
    {
        $model = new Area;

        return $model->where('id_almacen', '=', $id)->get();
    }
}
