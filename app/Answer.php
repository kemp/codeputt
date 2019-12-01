<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $fillable = ['body'];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getBodyAttribute($body)
    {
        $parser = new \Parsedown();

        $parser->setSafeMode(true);

        return $parser->text($body);
    }
}
