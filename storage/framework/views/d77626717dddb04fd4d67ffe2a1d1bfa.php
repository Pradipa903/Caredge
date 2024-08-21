<!-- 

<?php $__env->startSection('container'); ?> -->

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Your Page Title</title>
  <!-- Include the Tailwind CSS stylesheet -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"> -->
  <style>
    /* Your custom CSS styles here */
    .article {
      max-width: 48%; /* Adjust the width as needed */
      border: 1px solid #e2e8f0;
      border-radius: 0.5rem;
      padding: 1rem;
      margin-bottom: 1rem;
    }
    .article h3 {
      font-size: 1.25rem;
      font-weight: bold;
      color: #2d3748;
      margin-top: 0;
    }
    .article p {
      font-size: 1rem;
      color: #4a5568;
    }
    .sim-score {
      position: absolute;
      top: -10px;
      right: -10px;
      background-color: #edf2f7;
      padding: 0.25rem 0.5rem;
      border-radius: 9999px;
      font-size: 0.75rem;
      font-weight: bold;
      color: #4a5568;
    }
  </style>
</head>

<body>
  <!-- Your HTML content here -->
  <div class="bg-white py-24 sm:py-32">
    <!-- Your existing HTML content -->
    <div class="mx-auto max-w-7xl px-6 lg:px-8">
      <div class="mx-auto max-w-2xl lg:mx-0">
        <h2 class="text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl">Your Job Recommendation</h2>
      </div>
      <?php $__currentLoopData = $data['recommendations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recommendation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="article relative">
          <div>
            <h3><?php echo e($recommendation['company']); ?></h3>
            <p><?php echo e($recommendation['job_title']); ?></p>
            <span><?php echo e($recommendation['sim_score']); ?>%</span>
          </div>
        </div>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
  </div>
</body>

</html>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/raystores/Downloads/Caredge/resources/views/python-data.blade.php ENDPATH**/ ?>