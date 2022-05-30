<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_the_application_returns_success_on_dashboard()
    {

        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/dashboard');



        $response->assertStatus(200);
    }

    public function test_the_application_returns_success_on_company_create()
    {

        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/company/create');



        $response->assertStatus(404);
    }
}
