@extends('layouts.main')

@section('container')
<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
<head>
    <script src="{{ asset('assets/js/color-modes.js') }}"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Signin Template · Bootstrap v5.3</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        /* Your custom styles here */

    </style>
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/sign-in.css') }}" rel="stylesheet">
    
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary">
<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <!-- SVG symbols here -->
</svg>

<div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
    <!-- Dropdown content -->
</div>

@if(session()->has('success'))
    <div class="alert alert-success alert dismissible fade show mt-5" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session()->has('loginError'))
    <div class="alert alert-danger alert dismissible fade show mt-5" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="row justify-content-center">
    <div class="col-md-4">
        <main class="form-signin w-100 mt-5">
            <form action="/login" method="post">
                @csrf
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
                <div class="form-floating">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" autofocus required value="{{ old ('email') }}">
                    <label for="email" autofocus required>Email address</label>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
                <div class="form-floating">
                    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                    <label for="password" required>Password</label>
                </div>
                <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
            </form>
            <small>Not registered? <a href="/register">Register Now!</a></small>
        </main>
    </div>
</div>
<script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
@endsection