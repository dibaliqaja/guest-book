<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**
    * @test
    * Assert a user can view login form.
    *
    * @return void
    */
    public function user_can_view_a_login_form()
    {
        $this->get('/login')
             ->assertStatus(200)
             ->assertViewIs('auth.login');
    }

    /**
    * @test
    * Assert an admin can login
    *
    * @return void
    */
    public function an_admin_can_login()
    {
        $user = $this->user();

        $this->post('/login', $user)
             ->assertRedirect('/home')
             ->assertSessionHasNoErrors()
             ->assertStatus(302);
    }

    /**
    * @test
    * Assert a user unauthorized login
    *
    * @return void
    */
    public function a_user_unauthorized_login()
    {
        $this->post('/login', [
                'email'    => 'email@email.com',
                'password' => 'password'
             ])
             ->assertSessionHasErrors([
                'email'    => 'These credentials do not match our records.'
             ]);
    }

    /**
    * @test
    * Assert a user can not login without email or password
    *
    * @return void
    */
    public function a_user_can_not_login_without_credentials()
    {
        $this->post('/login', [])
             ->assertSessionHasErrors([
                'email'    => 'The email field is required.',
                'password' => 'The password field is required.',
             ]);
    }

    /**
    * @test
    * Assert an admin can logout
    *
    * @return void
    */
    public function an_admin_can_logout()
    {
        $user = $this->user();

        $this->post('/logout', $user)
             ->assertRedirect('/')
             ->assertSessionHasNoErrors()
             ->assertStatus(302);
    }

    private function user()
    {
        User::factory()->create([
            'email' => 'example@example.com',
            'password' => bcrypt('password')
        ]);

        $user = [
            'email' => 'example@example.com',
            'password' => 'password'
        ];

        return $user;
    }
}
