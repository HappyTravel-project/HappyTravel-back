<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;


class UserControllerTest extends TestCase
{
    use RefreshDatabase; // Esto se encargará de migrar la base de datos en memoria para cada prueba.

    /**
     * Test para el método store.
     *
     * @return void
     */
    public function testStore()
    {
        // Simulamos una solicitud HTTP con datos de usuario
        $response = $this->postJson('/api/users', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123'
        ]);

        // Verificamos si la respuesta tiene el código de estado 201 (creado)
        $response->assertStatus(201);

        // Verificamos si el usuario fue creado en la base de datos
        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

        // También podrías verificar si la respuesta contiene los datos del usuario creado si así lo deseas
        // $response->assertJson([
        //     'name' => 'John Doe',
        //     'email' => 'john@example.com',
        // ]);
    }
}