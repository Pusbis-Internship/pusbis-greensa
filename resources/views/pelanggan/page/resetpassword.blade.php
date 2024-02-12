@extends('pelanggan.layout.loginRegis')
@section('content')
<div class="container">
    <h2>Reset Password</h2>
    <form action="{{ route('reset.password.post') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <!-- <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required>
        </div> -->
        <div class="form-group">
            <label for="password">New Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="confirm_password">Confirm New Password:</label>
            <input type="password" id="confirm_password" name="password_confirmation" required>
        </div>

        <div class="form-group">
            <input type="submit" value="Reset Password">
        </div>
    </form>


</div>
@endsection