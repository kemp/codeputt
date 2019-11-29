@extends('layouts.app')

@section('content')
    <h1>{{ $user->name }}'s profile</h1>

    <table>
        <tr>
            <th>Email:</th>
            <td>{{ $user->email }}</td>
        </tr>
        <tr>
            <th>Profile created:</th>
            <td>{{ $user->created_at->diffForHumans() }}</td>
        </tr>
    </table>
@endsection
