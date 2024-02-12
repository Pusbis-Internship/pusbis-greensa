@extends('pelanggan.layout.loginRegis')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>Reset Password</h2>
                </div>
                @if (session('status'))
                <div class="success-message">
                    {{ session('status') }}
                </div>
                @endif
                @if (session('error'))
                <div class="success-message">
                    {{ session('error') }}
                </div>
                @endif
                <div class="card-body">
                    <form action="{{ route('forget.password.post') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Send Email</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection