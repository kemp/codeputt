@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>All Questions</h1>

                <p>
                    <a class="btn btn-outline-primary" href="{{ route('questions.create') }}">Ask a Question</a>
                </p>

                @foreach($questions as $question)
                    <div class="card my-4">
                        <div class="card-header">
                            {{ $question->title }}
                        </div>

                        <div class="card-body">
                            <p><em>Asked By: {{ $question->user->name }}</em></p>

                            <p>{!! Str::limit($question->rawBody(), 120) !!}</p>

                            <p><a class="btn btn-outline-secondary" href="{{ route('questions.show', $question) }}">View Full Question</a></p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
