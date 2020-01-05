<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    private $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function getAll()
    {
        $categories = $this->model->all();

        if (count($categories) == 0)
            return response()->json(['message' => 'there is no categories in the system']);

        return response()->json($categories);
    }

    public function getById($id)
    {
        $category = $this->model->find($id);

        if ($category == null)
            return response()->json(['message' => 'category not found']);

        return response()->json($category);
    }

}