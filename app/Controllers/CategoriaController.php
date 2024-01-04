<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        $model = new Categoria;

        $title = 'Lista de categorías';

        if (isset($_GET['search'])) {
            $categorias = $model->where('cat_nom', 'LIKE', '%' . $_GET['search'] . '%');
        } else {
            $categorias = $model->get();
        }

        return $this->view('categorias.index', compact('categorias', 'title'));
    }

    public function store()
    {
        $data = $_POST;

        $model = new Categoria;
        $model->create($data);

        return $this->redirect('/categoria');
    }

    public function edit($id)
    {
        $model = new Categoria;

        return $model->find($id);
    }

    public function update($id)
    {
        $data = $_POST;

        $model = new Categoria;
        $model->update($id, $data);

        return $this->redirect('/categoria');
    }

    public function destroy($id)
    {
        $model = new Categoria;
        $model->delete($id);

        $this->redirect('/categoria');
    }
}
