<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_can_store_user_to_the_user_table()
    {
        $user = User::factory()->make();
        $this->post('/user', $user->toArray());
        $this->assertEquals(1, User::all()->count());
    }
}
