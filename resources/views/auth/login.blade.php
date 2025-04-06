@extends('layouts')

@section('content')
<div class="min-vh-100 d-flex align-items-center justify-content-center section-padding30">
    <div class="w-100 p-4" style="max-width: 600px;">
        <div class="shadow-lg rounded-3 p-4 p-md-5">
            <h2 class="text-center mb-4 fw-bold">Login to Your Account</h2>

            @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus
                        class="form-control border-2" style="border-color: #ff5600;">
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" required
                        class="form-control border-2" style="border-color: #ff5600;">
                </div>

                <!-- Remember Me -->
                <div class="mb-3 form-check">
                    <input type="checkbox" id="remember" name="remember" class="form-check-input">
                    <label for="remember" class="form-check-label">Remember me</label>
                </div>

                <!-- Forgot Password -->
                <div class="mb-4 text-end">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-decoration-none" style="color: #ff5600;">
                            Forgot Password?
                        </a>
                    @endif
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-100 btn py-2 fw-semibold text-white p-4" style="background-color: #ff5600;">
                    Log In
                </button>
            </form>
        </div>
    </div>
</div>
@endsection