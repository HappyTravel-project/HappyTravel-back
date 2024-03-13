<?php
namespace Tests\Unit\Resources;

use Tests\TestCase;
use App\Models\Destination;
use App\Http\Resources\DestinationCollection;
use Illuminate\Http\Request;

class DestinationCollectionTest extends TestCase
{
    /**
     * Test para verificar la transformación de la colección de destinos.
     *
     * @return void
     */
    public function testCollectionTransformation()
    {
        // Creamos destinos ficticios
        $destinations = [
            new Destination([
                'id' => 1,
                'title' => 'Destination 1',
                'location' => 'Location 1',
                'image' => 'image1.jpg',
                'description' => 'Description 1',
            ]),
            new Destination([
                'id' => 2,
                'title' => 'Destination 2',
                'location' => 'Location 2',
                'image' => 'image2.jpg',
                'description' => 'Description 2',
            ]),
        ];

        // Creamos una instancia de DestinationCollection
        $collection = new DestinationCollection($destinations);

        // Transformamos la colección en un arreglo
        $transformedCollection = $collection->toArray(new Request());

        // Verificamos si la transformación es correcta
        $this->assertEquals([
            [
                'id' => 1,
                'type' => 'destination',
                'attributes' => [
                    'title' => 'Destination 1',
                    'location' => 'Location 1',
                    'image' => 'image1.jpg',
                    'description' => 'Description 1',
                ]
            ],
            [
                'id' => 2,
                'type' => 'destination',
                'attributes' => [
                    'title' => 'Destination 2',
                    'location' => 'Location 2',
                    'image' => 'image2.jpg',
                    'description' => 'Description 2',
                ]
            ],
        ], $transformedCollection);
    }
}
// namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
// use Illuminate\Foundation\Testing\WithFaker;
// use Tests\TestCase;

// class DestinationColletionTest extends TestCase
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
