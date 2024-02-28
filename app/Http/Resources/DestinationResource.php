<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DestinationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);
        return[
            'id' => $this->id,
            'type' => 'destination',
            'attributes' => [
                'title' => $this->title,
                'location' => $this->location,
                'image' => $this->image,
                'description' => $this->description,
            ]
            ];
    }
}
