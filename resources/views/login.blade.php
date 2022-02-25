@extends('body.pageBeforeAuth')
@section('styleHead')
    <link rel="stylesheet" href="{{ asset('login/style.css') }}">
    <style>
        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>
@endsection
@section('body')
    <main class="form-signin">
        <form action="{{ route('products') }}" method="get">
            <img class="mb-4" src="{{ asset('/imgs/logo/promobit.png') }}" alt="" width="200" height="57">
            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; {{ date('Y') }}</p>
        </form>
    </main>
@endsection
