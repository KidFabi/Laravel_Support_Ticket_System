@extends('layouts.guest')

@section('title')
    {{ __('Register') }}
@endsection

@section('content')
    <x-auth-card header="Create an account">
        <form class="user" action="{{ route('register') }}" method="POST">
            @csrf

            <div class="form-group">
                <input type="text" name="first_name" class="form-control form-control-user @error('first_name') is-invalid @enderror" id="first_name"
                        placeholder="{{ __('First Name') }}" value="{{ old('first_name') }}" minlength="3" maxlength="60" autofocus required>
                <x-validation-error input="first_name"/>
            </div>

            <div class="form-group">
                <input type="text" name="last_name" class="form-control form-control-user @error('last_name') is-invalid @enderror" id="last_name"
                        placeholder="{{ __('Last Name') }}" value="{{ old('last_name') }}" minlength="3" maxlength="60" required>
                <x-validation-error input="last_name"/>
            </div>

            <div class="form-group">
                <input type="email" name="email" class="form-control form-control-user @error('email') is-invalid @enderror" id="email"
                        placeholder="{{ __('Email Address') }}" value="{{ old('email') }}" maxlength="255" required>
                <x-validation-error input="email"/>
            </div>

            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" name="password" class="form-control form-control-user @error('password') is-invalid @enderror"
                            id="password" placeholder="{{ __('Password') }}" minlength="8" maxlength="255" required>
                    <x-validation-error input="password"/>
                </div>

                <div class="col-sm-6">
                    <input type="password" name="password_confirmation" class="form-control form-control-user"
                            id="password_confirmation" placeholder="{{ __('Repeat Password') }}" minlength="8" maxlength="255" required>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-user btn-block">
                {{ __('Register Account') }}
            </button>
        </form>

        <hr>

        <div class="text-center">
            <a class="small" href="{{ route('password.request') }}">{{ __('Forgot your password?') }}</a>
        </div>

        <div class="text-center">
            <a class="small" href="{{ route('login') }}">{{ __('Already have an account? Log In!') }}</a>
        </div>
    </x-auth-card>
@endsection
