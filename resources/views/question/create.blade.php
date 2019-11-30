@extends('layouts.app')

@section('content')
    <h1>Create a new Question</h1>

    <form action="{{ route('questions.store') }}">
        {{ csrf_field() }}

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title">
        </div>

        <div class="form-group">
            <label for="body">Body</label>
            <input type="text" id="body" name="body">
        </div>

        <input type="submit" value="Create">
    </form>
@endsection
