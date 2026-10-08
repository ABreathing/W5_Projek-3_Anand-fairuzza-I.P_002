@extends('layouts.app')

@section('content')
    <h2>Login</h2>

    @if ($errors->any())
        <div class="error">{{ $errors->first() }}</div>
    @endif

    <form method="POST" action="/login">
        @csrf
        <p>
            <label>Username</label><br>
            <input type="text" name="username" value="{{ old('username') }}" required>
        </p>
        <p>
            <label>Password</label><br>
            <input type="password" name="password" required>
        </p>
        <button type="submit">Masuk</button>
    </form>
@endsection