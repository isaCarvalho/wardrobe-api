<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Size;

class SizeController extends Controller
{
    private $model;

    public function __construct(Size $size)
    {
        $this->model = $size;
    }

    public function getAll()
    {
        $sizes = $this->model->all();

        if (count($sizes) == 0)
            return response()->json(['message' => 'there is no sizes in the system']);

        return response()->json($sizes);
    }

    public function getById($id)
    {
        $size = $this->model->find($id);

        if ($size == null)
            return response()->json(['message' => 'size not found']);

        return response()->json($size);
    }

}