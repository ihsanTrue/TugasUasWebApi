<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Http\Resources\UsersResource;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return (new UsersResource($users))
            ->response()
            ->setStatusCode(200);
    }


    public function store(Request $request)
    {
        $users = User::create($request->all());

        return (new UserResource($users))
            ->response()
            ->setStatusCode(201);
    }


    public function show($id)
    {
        $user = User::FindOrFail($id);

        return (new UserResource($user))
            ->response()
            ->setStatusCode(200);
    }


    public function delete($id)
    {
        $user = User::FindOrFail($id);
        $user->delete();

        return response()->json([
            'status' => "Succes delete user"
        ]);
    }


    public function update(Request $request, $id)
    {
        $user = User::FindOrFail($id);
        $user->update($request->all());
        $user->id = $request->get('id');

        return (new UserResource($user))
            ->response()
            ->setStatusCode(200);
    }
}
