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

        $destinations = Destination::paginate(8);

        $data = DestinationResource::collection($destinations);
        $pagination = $destinations->toArray();

        return response()->json([
            'data' => $data,
            'meta' => [
                'current_page' => $pagination['current_page'],
                'from' => $pagination['from'],
                'last_page' => $pagination['last_page'],
                'path' => $pagination['path'],
                'per_page' => $pagination['per_page'],
                'to' => $pagination['to'],
                'total' => $pagination['total']
            ],
            'links' => [
                'first' => $pagination['first_page_url'],
                'last' => $pagination['last_page_url'],
                'prev' => $pagination['prev_page_url'],
                'next' => $pagination['next_page_url']
            ]
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

        $destination->update($request->all());
        return response()->json(new DestinationResource($destination), 200);

    }


    public function destroy(Destination $destination): JsonResponse
    {
        $this->authorize('delete', $destination);
        $destination->delete();

        return response()->json([
            'message' => 'El destino ha sido eliminado exitosamente'
        ], Response::HTTP_OK);
    }
}
