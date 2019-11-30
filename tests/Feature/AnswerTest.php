<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AnswerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp() : void
    {
        parent::setUp();

        $this->actingAs(factory(\App\User::class)->create());
    }

    public function testAUserMustBeLoggedIn()
    {
        auth()->logout();

        $question = factory(\App\Question::class)->create();

        $response = $this->get(route('questions.show', $question));

        $response->assertStatus(302);
    }

    public function testAQuestionPageShowsAnswers()
    {
        $answer = factory(\App\Answer::class)->create();
        $question = $answer->question;

        $response = $this->get(route('questions.show', $question));

        $response->assertSee($answer->body);
    }

    public function testAQuestionPageShowsAFormToCreateANewAnswer()
    {
        $question = factory(\App\Question::class)->create();

        $response = $this->get(route('questions.show', $question));

        $response->assertSee('Add an answer');
    }

    public function testAnAnswerCanBeAddedToAQuestion()
    {
        $data = [
            'body' => 'FooBar'
        ];

        $question = factory(\App\Question::class)->create();

        $response = $this->post(route('answers.store', $question), $data);

        $response->assertOk();

        $this->assertDatabaseHas('answers', $data);
    }
}
