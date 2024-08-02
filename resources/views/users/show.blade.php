@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>User Details</h2>
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $user->email }}</td>
            </tr>
        </table>
        <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
    </div>
@endsection
