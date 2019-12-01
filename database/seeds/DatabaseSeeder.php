<?php

use App\Question;
use App\Answer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            [
                'title' => 'Rock Paper Scissors (Sorta) Quine',
                'body' => file_get_contents(__DIR__ . '/questions/question1.txt'),
                'answers' => [
                    file_get_contents(__DIR__ . '/answers/answer1a.txt'),
                    file_get_contents(__DIR__ . '/answers/answer1b.txt'),
                ],
            ],
            [
                'title' => 'Write a program that makes 2 + 2 = 5',
                'body' => file_get_contents(__DIR__ . '/questions/question2.txt'),
                'answers' => [
                    file_get_contents(__DIR__ . '/answers/answer2a.txt'),
                    file_get_contents(__DIR__ . '/answers/answer2b.txt'),
                ],
            ],
            [
                'title' => 'Without using numbers, get the highest salary you can. But don\'t exaggerate!',
                'body' => file_get_contents(__DIR__ . '/questions/question3.txt'),
                'answers' => [
                    file_get_contents(__DIR__ . '/answers/answer3a.txt'),
                    file_get_contents(__DIR__ . '/answers/answer3b.txt'),
                ],
            ],
        ];

        foreach ($questions as $question) {
            $id = factory(Question::class)->create([
                'title' => $question["title"],
                'body' => $question["body"]
            ])->id;

            foreach ($question["answers"] as $answer) {
                factory(Answer::class)->create([
                    'question_id' => $id,
                    'body' => $answer
                ]);
            }
        }
    }
}
