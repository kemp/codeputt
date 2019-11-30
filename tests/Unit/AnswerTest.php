<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AnswerTest extends TestCase
{
    use RefreshDatabase;

    protected $answer;

    public function setUp() : void
    {
        parent::setUp();

        $this->answer = factory(\App\Answer::class)->create();
    }

    public function testItHasABody()
    {
        $this->assertNotNull($this->answer->body);
    }
}
