<?php

namespace App\Http\Controllers\Api;

use App\Models\Destination;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDestinationRequest;
use App\Http\Resources\DestinationResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class DestinationController extends Controller
{

    public function index(): JsonResponse
    {
        $destinations = Destination::all();
        return response()->json(['data' => DestinationResource::collection($destinations)]);

    }

    public function show(Destination $destination): JsonResponse
    {
        $destination = $destination->load('user');
        return response()->json(new DestinationResource($destination) , Response::HTTP_OK);

    }

    /**
     * agregamos Auth
     */
    public function store( CreateDestinationRequest $request): JsonResponse
    {
        $user= Auth::user();
        $destination = new Destination($request->all());
        $destination -> user() -> associate($user);
        $destination->save();

        return response()->json(new DestinationResource($destination), 200);


    }




    public function update(Request $request, Destination $destination): JsonResponse
    {
        $this->authorize('update', $destination);
        $destination->update($request->all());
        return response()->json(new DestinationResource($destination), 200);

    }


    public function destroy(Destination $destination): JsonResponse
    {
        $this->authorize('delete', $destination);
        $destination->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
