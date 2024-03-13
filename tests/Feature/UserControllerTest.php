<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

// Esta es la prueba que escribiste para el controlador de usuarios, específicamente el método store.
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
        // se simula una solicitud HTTP con datos de usuario
        $response = $this->postJson('/api/users', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123'
        ]);

        // se verifica si la respuesta tiene el código de estado 201 (creado)
        $response->assertStatus(201);

        // aqui verifica si el usuario fue creado en la base de datos
        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
        ]);

       
        // $response->assertJson([
        //     'name' => 'John Doe',
        //     'email' => 'john@example.com',
        // ]);
    }
}