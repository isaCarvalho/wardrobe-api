<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Roupa;

class RoupaController extends Controller
{
    private $model;

    public function __construct(Roupa $roupa)
    {
        $this->model = $roupa;
    }

    public function getAll()
    {
        $roupas = $this->model->all();

        if (count($roupas) == 0)
            return response()->json(['message' => 'there is no clothe in the system']);

        return response()->json($roupas);
    }

    public function getById($id)
    {
        $roupa = $this->model->find($id);

        if ($roupa == null)
            return response()->json(['message' => 'clothe not found']);

        return response()->json($roupa);
    }

    public function insert(Request $request)
    {
        $tamanhos = ['p', 'm', 'g', 'gg', 'unico', '36', '38', '40', '42', '44', '46'];
        
        if (!$in_array($request->input('tamanho'), $tamanhos))
            return response()->json(['message' => 'invalid size!']);

        $user = User::create($request->all());

        return response()->json($user);
    }

    public function update($id, Request $request)
    {
        $roupa = $this->model->find($id)->update($request->all());
        if ($roupa == null)
            return response()->json(['message'=> 'clothe not found']);

        return response()->json($roupa);
    }

    public function delete($id)
    {
        $roupa = $this->model->find($id)->delete();

        return response()->json(['message' => 'clothe deleted with success!']);
    }

    public function deleteAll()
    {
        $roupa = $this->model->delete();

        return response()->json(['message' => 'all clothes has been deleted!']);
    }
}