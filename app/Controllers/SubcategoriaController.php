<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Subcategoria;

class SubcategoriaController extends Controller
{
    public function index()
    {
        $title = 'Subcategorías';

        $model_categorias = new Categoria;
        $model_subcategorias = new Subcategoria;

        $categorias = $model_categorias->all();
        $subcategorias = $model_subcategorias->all();

        return $this->view('subcategorias.index', compact('title', 'categorias', 'subcategorias'));
    }

    public function store()
    {
        $data = $_POST;

        $model = new Subcategoria;
        $model->create($data);

        return $this->redirect('/subcategoria');
    }

    public function edit($id)
    {
        $model = new Subcategoria;

        return $model->find($id);
    }

    public function update($id)
    {
        $data = $_POST;

        $model = new Subcategoria;
        $model->update($id, $data);

        return $this->redirect('/subcategoria');
    }

    public function destroy($id)
    {
        $model = new Subcategoria;
        $model->delete($id);

        return $this->redirect('/subcategoria');
    }

    public function getSubCat($id)
    {
        $model = new Subcategoria;

        return $model->where('cat_id', $id)->get();
    }
}
