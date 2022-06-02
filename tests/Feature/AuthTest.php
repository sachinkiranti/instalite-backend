<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthTest extends TestCase
{

    use RefreshDatabase;

    private User $user;

    public function setUp(): void
    {
        parent::setUp();
        $this->user = $this->createUser();
    }

    public function test_a_user_can_register()
    {
        $user = User::factory()->make();

        $response = $this->postJson( route('auth.register'), [
                'name' => $user->name,
                'email' => $user->email,
                'password' => 'secret',
                'password_confirmation' => 'secret',
            ] )
            ->assertCreated()
            ->json();

        $this->assertEquals('You have successfully registered.', $response['status']['message']);

        $this->assertDatabaseHas('users', [
            'name' => $user->name,
        ]);
    }

    public function test_a_user_can_login()
    {
        $user = User::factory()->make();
    }
    
}
