<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    private $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function getAll()
    {
        $users = $this->model->all();

        if (count($users) == 0)
            return response()->json(['message' => 'there is no user in the system']);

        return response()->json($users);
    }

    public function getById($id)
    {
        $user = $this->model->find($id);

        if ($user == null)
            return response()->json(['message' => 'user not found']);

        return response()->json($user);
    }

    public function insert(Request $request)
    {
        preg_match('/(.*)@(.*)\.(\w+)/', $request->input('email'), $match);
        if ($match == null)
            return response()->json(['message' => 'invalid email!']);

        $user = User::create($request->all());

        return response()->json($user);
    }

    public function update($id, Request $request)
    {
        $user = $this->model->find($id)->update($request->all());
        if ($user == null)
            return response()->json(['message'=> 'user not found']);

        return response()->json($user);
    }

    public function delete($id)
    {
        $user = $this->model->find($id)->delete();

        return response()->json(['message' => 'user deleted with success!']);
    }

    public function deleteAll()
    {
        $user = $this->model->delete();

        return response()->json(['message' => 'all users has been deleted!']);
    }
}
