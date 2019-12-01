<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuestionTest extends TestCase
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

        $response = $this->get('/questions');

        $response->assertStatus(302);
    }

    public function testItShowsTheFormToCreateANewQuestion()
    {
        $response = $this->get('/questions/create');

        $response->assertStatus(200);

        $response->assertSee('Ask a Question');
    }

    public function testAQuestionCanBeCreated()
    {
        $data = [
            'title' => 'Foo',
            'body' => 'Bar',
        ];

        $response = $this->post('/questions', $data);

        $response->assertRedirect();

        $this->assertDatabaseHas('questions', $data);
    }

    public function testAQuestionCanBeShown()
    {
        $question = factory(\App\Question::class)->create();

        $response = $this->get('/questions/' . $question->id);

        $response->assertOk();
        $response->assertSee($question->title);
        $response->assertSee($question->body);
    }

    public function testALinkToCreateANewQuestionIsShown()
    {
        $response = $this->get('/');

        $response->assertSee('Ask a Question');
    }
}
