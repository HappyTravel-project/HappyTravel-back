<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Tests\TestCase;

//esta prueba es para verifican la autenticación de usuarios en el controlador de autenticación.
class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

    
    public function testUserCanLoginWithValidCredentials()
    {
        $user = User::factory()->create([
            'password' => Hash::make('password'),
        ]);

        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'user' => [
                        'id',
                        'name',
                        'email',
                    ],
                    'access_token',
                    'message',
                ],
            ]);
    }

   
    public function testUserCannotLoginWithInvalidCredentials()
    {
        $response = $this->postJson('/api/login', [
            'email' => 'invalid@example.com',
            'password' => 'invalid-password',
        ]);

        $response->assertStatus(422)
            ->assertJson([
                'message' => 'Las credenciales proporcionadas son incorrectas.',
            ]);
    }
}
