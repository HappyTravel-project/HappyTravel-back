<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DestinationCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return $this->collection->map(function ($destination) {
            return [
                'id' => $destination->id,
                'type' => 'destination',
                'attributes' => [
                    'title' => $destination->title,
                    'location' => $destination->location,
                    'image' => $destination->image,
                    'description' => $destination->description,
                ]
            ];
        })->toArray();
    }
}
