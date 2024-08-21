

<?php $__env->startSection('container'); ?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
<head>
    <script src="<?php echo e(asset('assets/js/color-modes.js')); ?>"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.122.0">
    <title>Signin Template · Bootstrap v5.3</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link href="<?php echo e(asset('assets/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <style>
        /* Your custom styles here */

    </style>
    <!-- Custom styles for this template -->
    <link href="<?php echo e(asset('css/sign-in.css')); ?>" rel="stylesheet">
    
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary">
<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <!-- SVG symbols here -->
</svg>

<div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
    <!-- Dropdown content -->
</div>

<main class="form-signin w-100 m-5">
    <form>
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
        <div class="form-floating">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2024</p>
    </form>
</main>
<script src="<?php echo e(asset('assets/dist/js/bootstrap.bundle.min.js')); ?>"></script>
</body>
</html>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelP\Caredge\resources\views/login.blade.php ENDPATH**/ ?>