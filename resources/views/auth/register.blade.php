@extends('layouts')

@section('content')

<style>
    .nice-select {
        border-color: #ff5600;
    }
</style>
<div class="min-vh-100 d-flex align-items-center justify-content-center section-padding30">
    <div class="w-100 p-4" style="max-width: 600px;">
        <div class="shadow-lg rounded-3 p-4 p-md-5 bg-white">
            <h2 class="text-center mb-4 fw-bold">Create Your Account</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus autocomplete="name"
                        class="form-control border-2 @error('name') is-invalid @enderror" style="border-color: #ff5600;">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}" required autocomplete="username"
                        class="form-control border-2 @error('email') is-invalid @enderror" style="border-color: #ff5600;">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" required autocomplete="new-password"
                        class="form-control border-2 @error('password') is-invalid @enderror" style="border-color: #ff5600;">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" required autocomplete="new-password"
                        class="form-control border-2" style="border-color: #ff5600;">
                </div>

                <!-- Role Selection -->
                <div class="mb-5">
                    <label for="role" class="form-label">Register As</label>
                    <select name="role" id="role" required
                        class="form-select border-2 @error('role') is-invalid @enderror" style="border-color: #ff5600;">
                        <option value="" disabled selected>Select your role</option>
                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ old('role') == 'kitchen' ? 'selected' : '' }}>Kitchen</option>
                        <option value="manager" {{ old('role') == 'delevery' ? 'selected' : '' }}>Delevery Partner</option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="align-items-center justify-content-between mt-5">
                    <a href="{{ route('login') }}" class="text-decoration-none" style="color: #ff5600;">
                        Already registered?
                    </a>
                    <button type="submit" class="btn text-white fw-semibold py-2 px-4 p-4" style="background-color: #ff5600;">
                        Register
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection