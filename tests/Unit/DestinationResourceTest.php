<?php

namespace Tests\Unit\Resources;

use Tests\TestCase;
use App\Models\Destination;
use App\Http\Resources\DestinationResource;
use Illuminate\Http\Request;

class DestinationResourceTest extends TestCase
{
    /**
     * Test para verificar la transformación del recurso de destino.
     *
     * @return void
     */
    public function testResourceTransformation()
    {
        // Creamos un destino ficticio
        $destination = new Destination([
            'id' => 1,
            'title' => 'Destination 1',
            'location' => 'Location 1',
            'image' => 'image1.jpg',
            'description' => 'Description 1',
        ]);

        // Creamos una instancia de DestinationResource
        $resource = new DestinationResource($destination);

        // Transformamos el recurso en un arreglo
        $transformedResource = $resource->toArray(new Request());

        // Verificamos si la transformación es correcta
        $this->assertEquals([
            'id' => 1,
            'type' => 'destination',
            'attributes' => [
                'title' => 'Destination 1',
                'location' => 'Location 1',
                'image' => 'image1.jpg',
                'description' => 'Description 1',
            ]
        ], $transformedResource);
    }
}
// namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
// use Tests\TestCase;

// class DestinationResourceTest extends TestCase
// {
//     /**
//      * A basic feature test example.
//      */
//     public function test_example(): void
//     {
//         $response = $this->get('/');

//         $response->assertStatus(200);
//     }
// }
