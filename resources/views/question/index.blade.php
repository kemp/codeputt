@extends('layouts.app')

@section('content')
    <h1>All Questions</h1>

    @foreach($questions as $question)
        <div class="question">
            <h2>{{ $question->title }}</h2>
            <p>{{ $question->body }}</p>
        </div>
    @endforeach
@endsection
