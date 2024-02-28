<?php

namespace App\Http\Controllers\Api;

use App\Models\Destination;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateDestinationRequest;
use App\Http\Resources\DestinationResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DestinationController extends Controller
{

    public function index(): JsonResponse
    {
        $destinations = Destination::all();
        // return response()->json($destinations, 200);
        return response()->json(['data' => DestinationResource::collection($destinations)]);
    }

    public function store( CreateDestinationRequest $request): JsonResponse
    {
        // $destination = $request->user()->destination()->create($request->all());
        // $destination = Destination::create($request->all());
        // $destination->save();
        // return response()->json(new DestinationResource($destination), 200);
        $destination = new Destination($request->all());
        // $destination->user_id = $request->user()->id;
        $destination->user_id = $request->input('user_id');
        $destination->save();
        return response()->json(new DestinationResource($destination), 200);

    }

    public function show(Destination $destination): JsonResponse
    {
        // $this->authorize('show', $destination);

        // $destination =$destination->load('user');
        // return response()->json(new DestinationResource($destination) , Response::HTTP_OK);
        $destination = $destination->load('user');
        return response()->json(new DestinationResource($destination) , Response::HTTP_OK);

    }


    public function update(Request $request, Destination $destination): JsonResponse
    {
        // $destination = Destination::findOrFail($id);
        $destination->update($request->all());
        return response()->json(new DestinationResource($destination), 200);

    }


    public function destroy(Destination $destination): JsonResponse
    {
        // $this->authorize('delete', $destination);

        // $destination->delete();

        // return response()->json(null, Response::HTTP_NO_CONTENT);
        $destination->delete();
        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
