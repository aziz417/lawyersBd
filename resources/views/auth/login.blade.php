@section('title', 'Log in')
@extends('auth.layouts.app')
@section('from')
    <div class="ibox-content">
        @if (session('unMsg'))
            <div class="alert alert-danger" role="alert">
                {{ session('unMsg'), Session::forget('unMsg')}}
            </div>
        @endif
            <a href="{{ route('frontend.home') }}"><<== Home</a>
            <h2 class="text-center font-bold p-4">Log in</h2>
        <form class="m-t" role="form" method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                       placeholder="Email" name="email" value="{{ old('email') }}" required autocomplete="email"
                       autofocus>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group">
                <input id="password" type="password" placeholder="Password"
                       class="form-control @error('password') is-invalid @enderror" name="password" required
                       autocomplete="current-password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ password }}</strong>
                </span>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b font-bold">Log in</button>
            <p>If you do not have an account</p>
            <p>You can create a account for <a href="{{ route('registration', 'user') }}">User</a> and for <a href="{{ route('registration', 'lawyer') }}">Lawyer</a></p>

            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    <small>* Forgot password?</small>
                </a>
            @endif
        </form>
    </div>

    <script>
        function openNewTab() {
            window.open(
                '{{ route('login') }}?mamun=100',
                '_blank'
            );
        }
        console.log('ok')
    </script>
@endsection
