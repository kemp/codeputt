<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    use RefreshDatabase;

    public function testTheHomepageShowsRecentQuestions()
    {
        $question1 = factory(\App\Question::class)->create([ 'created_at' => now()->subDays(1) ]);
        $question2 = factory(\App\Question::class)->create([ 'created_at' => now()->subDays(2) ]);
        $question3 = factory(\App\Question::class)->create([ 'created_at' => now()->subDays(3) ]);

        $this->withoutExceptionHandling();

        $response = $this->get('/');

        $response->assertStatus(200);

        $response->assertSeeInOrder([
            $question1->title,
            $question2->title,
            $question3->title,
        ]);

    }
}
