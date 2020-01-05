<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use App\Clothe;

class ClotheController extends Controller
{
    private $model;

    public function __construct(Clothe $clothe)
    {
        $this->model = $clothe;
    }

    public function getAll()
    {
        $clothes = $this->model->all();

        if (count($clothes) == 0)
            return response()->json(['message' => 'there is no clothe in the system']);

        return response()->json($clothes);
    }

    public function getById($id)
    {
        $clothe = $this->model->find($id);

        if ($clothe == null)
            return response()->json(['message' => 'clothe not found']);

        return response()->json($clothe);
    }

    public function insert(Request $request)
    {
        $clothe = Clothe::create($request->all());

        return response()->json($clothe);
    }

    public function update($id, Request $request)
    {
        $clothe = $this->model->find($id)->update($request->all());
        if ($clothe == null)
            return response()->json(['message'=> 'clothe not found']);

        return response()->json($clothe);
    }

    public function delete($id)
    {
        $clothe = $this->model->find($id)->delete();

        return response()->json(['message' => 'clothe deleted with success!']);
    }

    public function deleteAll()
    {
        $clothe = $this->model->delete();

        return response()->json(['message' => 'all clothes has been deleted!']);
    }
}