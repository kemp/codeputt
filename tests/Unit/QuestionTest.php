<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class QuestionTest extends TestCase
{
    use RefreshDatabase;

    protected $question;

    public function setUp() : void
    {
        parent::setUp();

        $this->question = factory(\App\Question::class)->create();
    }

    /** @test */
    public function it_has_a_title()
    {
        $this->assertNotNull($this->question->title);
    }

    /** @test */
    public function it_has_a_body()
    {
        $this->assertNotNull($this->question->body);
    }
}
