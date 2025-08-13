@extends('layouts.website')

@section('website-content')

{{-- 
  This Blade directive is a cleaner way to run simple PHP logic inside a view.
  It clears any 'phone' value from the session when the login page loads.
--}}
@php
    Session::forget('phone');
@endphp

<section class="py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-12">
                <div class="card">
                    <div class="">
                        <h3 class="text-center text-success text-uppercase">Customer Login</h3>
                    </div>

                    <div class="card-body p-4">
                        <form action="{{ route('customer.auth') }}" method="post">
                            @csrf
                            
                            <div class="form-group mb-3">
                                <label class="form-label" for="userphone">Phone</label>
                                <input type="text" name="userphone" id="userphone"
                                    class="form-control @error('userphone') is-invalid @enderror"
                                    placeholder="Enter your phone number" value="{{ old('userphone') }}">
                                @error('userphone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group mb-3 position-relative">
                                <label class="form-label" for="id_password">Password</label>
                                <input type="password" name="password" id="id_password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Enter your password">
                                
                                <!-- <i class="far fa-eye" id="togglePassword" 
                                   style="position: absolute; right: 15px; top: 72%; transform: translateY(-50%); cursor: pointer;"></i> -->
                                
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group py-2">
                                <button type="submit" class="btn btn-success w-100 mx-auto d-block">Login</button>
                            </div>

                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div class="forget-password">
                                    <a href="{{ route('forget.password') }}" class="text-danger">Forget Password?</a>
                                </div>

                                <div class="text-center">
                                    <a class="fs-9 fw-bold" href="{{ route('customer.signup') }}">Create an account</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- 
  FIXED: The duplicate script was removed. 
  All page-specific scripts should be in a single @push block within the @section.
--}}
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const togglePassword = document.getElementById('togglePassword');
        const passwordField = document.getElementById('id_password');

        togglePassword.addEventListener('click', function () {
            // Toggle the input type between 'password' and 'text'
            const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordField.setAttribute('type', type);

            // Toggle the icon class between 'fa-eye' and 'fa-eye-slash' for visual feedback
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    });
</script>
@endpush

@endsection