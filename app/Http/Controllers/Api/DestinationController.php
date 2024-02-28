<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    private static $messages = [
        'required' => 'El campo :attribute es obligatorio.',
        'title.required' => 'El titulo no es requerido.',
    ];

    public function index()
    {
        $destinations = Destination::all();
        return response()->json($destinations, 200);
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required',
            'image' => 'required|image|dimensions:min_width=200,min_height=200',
            'description' => 'required|max:255',
        ], self::$messages);
        $destination = new Destination($request->all());
        $path = $request->image->store('public/destinations');
        $destination->image = 'destinations/' . basename($path);

        $destination->save();
        return response()->json(['message' => 'Destino creado exitosamente'], 201);
    }


    public function show(string $id)
    {
        $destination = Destination::find($id);

        if (!$destination) {
            return response()->json(['message' => 'Destino no encontrado'], 404);
        }

    return response()->json($destination, 200);
    }


    public function update(Request $request, string $id)
    {

    }


    public function destroy(string $id)
    {

    }
}
