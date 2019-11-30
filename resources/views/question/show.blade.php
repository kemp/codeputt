@extends('layouts.app')

@section('content')
    <h1>{{ $question->title }}</h1>

    <p>{{ $question->body }}</p>

    @foreach($question->answers as $answer)
        <div class="answer">
            <p>{{ $answer->body }}</p>
            <p>Posted by: {{ $answer->user->name }}</p>
        </div>
    @endforeach

    <h2>Add an answer</h2>

    <form action="{{ route('answers.store', $question) }}">
        <div class="input-group">
            <label for="body">Body:</label>
            <textarea name="body" id="body" cols="30" rows="10"></textarea>
        </div>

        <input type="submit" value="Add Answer">
    </form>
@endsection
