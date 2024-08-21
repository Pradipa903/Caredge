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

<div class="row justify-content-center">
    <div class="col-md-4">
        <main class="form-signin w-100 mt-5">
            <form action="/register" method="post">
                @csrf
                <h1 class="h3 mb-3 fw-normal">Please register</h1>
                <div class="form-floating">
                    <input type="name" class="form-control" id="name" placeholder="name" name="name" placeholder="name" required>
                    <label for="name">Name</label>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" required>
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                    <label for="password">Password</label>
                </div>
                <a href="/login">
                <button class="btn btn-primary w-100 py-2" type="submit">Register</button>
                </a>
            </form>
            <small>Already registered? <a href="/login">Login!</a></small>
        </main>
    </div>
</div>
{{-- <script src="{{ asset('assets/dist/js/bootstrap.bundle.min.js') }}"></script> --}}
</body>
</html>
@endsection