<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = ['title', 'body'];

    public function answers()
    {
        return $this->hasMany(Answer::class);
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

    public function rawBody()
    {
        return $this->attributes['body'];
    }
}
