@section('title', 'Enter the information below to get a new password')
@extends('auth.layouts.app')

@section('from')

    <div class="ibox-content">
        <h2 class="text-center font-bold p-4">Enter Your Valid Email</h2>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <form class="m-t" role="form" method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                       value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b font-bold">Send password reset link
                Please
            </button>

        </form>
    </div>
@endsection
