<?php

namespace App\Http\Controllers;

use App\Answer;
use App\Question;
use Illuminate\Http\Request;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Question $question
     * @return void
     */
    public function index(Question $question)
    {
        return $question->answers;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Question $question
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Question $question, Request $request)
    {
        $data = $this->validate($request, [
            'body' => 'required|string'
        ]);

        $answer = new Answer($data);

        $answer->user_id = auth()->user()->id;

        $question->answers()->save($answer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Question $question
     * @param \Illuminate\Http\Request $request
     * @param \App\Answer $answer
     * @return void
     */
    public function update(Question $question, Request $request, Answer $answer)
    {
        // TODO
    }
}
