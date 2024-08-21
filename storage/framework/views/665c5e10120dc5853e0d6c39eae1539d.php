

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

<?php if(session()->has('success')): ?>
    <div class="alert alert-success alert dismissible fade show mt-5" role="alert">
        <?php echo e(session('success')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<?php if(session()->has('loginError')): ?>
    <div class="alert alert-danger alert dismissible fade show mt-5" role="alert">
        <?php echo e(session('loginError')); ?>

        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endif; ?>

<div class="row justify-content-center">
    <div class="col-md-4">
        <main class="form-signin w-100 mt-5">
            <form action="/login" method="post">
                <?php echo csrf_field(); ?>
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
                <div class="form-floating">
                    <input type="email" name="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="floatingInput" placeholder="name@example.com" autofocus required value="<?php echo e(old ('email')); ?>">
                    <label for="email" autofocus required>Email address</label>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="invalid-feedback">
                        <?php echo e($message); ?>

                    </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
<script src="<?php echo e(asset('assets/dist/js/bootstrap.bundle.min.js')); ?>"></script>
</body>
</html>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravelP\Caredge\resources\views/login/index.blade.php ENDPATH**/ ?>