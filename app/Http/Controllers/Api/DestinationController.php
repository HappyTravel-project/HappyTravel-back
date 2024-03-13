<?php

namespace App\Http\Controllers\Api;

use App\Models\Destination;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use App\Http\Resources\DestinationResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{

    public function index(): JsonResponse
    {

        $user = Auth::user();
        $destinationsQuery = Destination::query();

        if ($user) {
            $destinationsQuery->where('user_id', $user->id);
        }

        $destinations = $destinationsQuery->paginate(8);

        return response()->json([
            'data' => $destinations
        ]);

    }

    public function show(Destination $destination): JsonResponse
    {
        $destination = $destination->load('user');
        return response()->json(new DestinationResource($destination) , Response::HTTP_OK);

    }

    /**
     * agregamos Auth
     */
    public function store( Request $request): JsonResponse
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'Usuario no autenticado'], 401);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Faltan campos requeridos',
                'message' => $validator->errors()->first()
            ], 422);
        }

        $imagePath = $request->file('image')->store('public/destinations');
        $imageUrl = Storage::url($imagePath);

        $destination = new Destination([
            'title' => $request->title,
            'location' => $request->location,
            'image' => $imageUrl,
            'description' => $request->description,
        ]);

        $destination->user()->associate($user);
        $destination->save();

        return response()->json(new DestinationResource($destination), 200);
    }




    public function update(Request $request, Destination $destination): JsonResponse
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'Usuario no autenticado'], 401);
        }


        if ($user->id !== $destination->user_id) {
            return response()->json(['error' => 'No tienes permiso para editar este destino'], 403);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Faltan campos requeridos',
                'message' => $validator->errors()->first()
            ], 422);
        }


        $imagePath = $request->file('image')->store('public/destinations');
        $imageUrl = Storage::url($imagePath);


        if ($destination->image) {
            Storage::delete(str_replace('storage', 'public', $destination->image));
        }

        $data = $request->only(['title', 'location', 'description']);
        $data['image'] = $imageUrl;

        $destination->update($data);
        return response()->json(new DestinationResource($destination), 200);

    }


    public function destroy(Destination $destination): JsonResponse
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'Usuario no autenticado'], 401);
        }


        if ($user->id !== $destination->user_id) {
            return response()->json(['error' => 'No tienes permiso para eliminar este destino'], 403);
        }

        $destination->delete();

        return response()->json([
            'message' => 'El destino ha sido eliminado exitosamente'
        ], Response::HTTP_OK);
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required|string',
        ]);

        $searchTerm = $request->input('search');

        $destination = Destination::where('name', 'like', '%' . $searchTerm . '%')
                        ->orWhere('location', 'like', '%' . $searchTerm . '%')
                        ->get();

                        if ($destination->isEmpty()) {
                            return response()->json(['message' => 'No se encontraron resultados'], 404);
                        }

                        return response()->json($destination);
    }
}
