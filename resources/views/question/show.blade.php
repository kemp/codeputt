@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{ $question->title }}</h1>

                <p>Asked By: {{ $question->user->name }} {{ $question->created_at->diffForHumans() }}</p>

                <div class="card">
                    <div class="card-body">
                        {!! $question->body !!}
                    </div>
                </div>

                <hr>

                <h3>Answers</h3>

                @foreach($question->answers as $answer)
                    <div class="card my-4">
                        <div class="card-header">
                            {{ $answer->user->name }}
                        </div>

                        <div class="card-body">
                            <p>{!! $answer->body !!}</p>

                            <p><em>{{ $answer->created_at->diffForHumans() }}</em></p>
                        </div>
                    </div>
                @endforeach

                <div class="card my-4">
                    <div class="card-header">Add an answer</div>

                    <div class="card-body">

                        <form method="POST" action="{{ route('answers.store', $question) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="body" class="col-md-4 col-form-label text-md-right">{{ __('Body') }}</label>

                                <div class="col-md-6">
                                    <textarea id="body" class="form-control @error('body') is-invalid @enderror" name="body" required></textarea>

                                    @error('body')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
