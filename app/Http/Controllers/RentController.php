<?php

namespace App\Http\Controllers;

use App\Http\Resources\RentResource;
use App\Http\Resources\RentsResource;
use App\rents;
use Illuminate\Http\Request;

class RentController extends Controller
{
    public function index()
    {
        $rents = rents::paginate(10);
        return (new RentsResource($rents))
            ->response()
            ->setStatusCode(200);
    }



    public function store(Request $request)
    {
        $rents = rents::create($request->all());

        return (new RentResource($rents))
            ->response()
            ->setStatusCode(201);
    }


    public function show($id)
    {
        $rent = rents::FindOrFail($id);

        return (new RentResource($rent))
            ->response()
            ->setStatusCode(200);
    }


    public function delete($id)
    {
        $rent = rents::FindOrFail($id);
        $rent->delete();

        return response()->json([
            'status' => "Succes delete Rent"
        ]);
    }


    public function update(Request $request, $id)
    {
        $rent = rents::FindOrFail($id);
        $rent->update($request->all());
        $rent->id = $request->get('id');

        return (new RentResource($rent))
            ->response()
            ->setStatusCode(200);
    }
}
