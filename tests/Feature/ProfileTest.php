<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    /**
     * It shows a user profile
     *
     * @return void
     */
    public function testItShowsAUserProfile()
    {
        $user = factory(\App\User::class)->create();

        $this->actingAs($user);

        $response = $this->get('/profile');

        $response->assertStatus(200);
        $response->assertSee($user->name);
        $response->assertSee($user->email);
        $response->assertSee($user->created_at->diffForHumans());
    }
}
