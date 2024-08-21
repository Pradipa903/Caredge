<?php $__env->startSection('content'); ?>
  <div class="container">
    <h1 class="pt-5">Search Results</h1>
    <?php if($results->isEmpty()): ?>
      <p>No results found for "<?php echo e(request('query')); ?>"</p>
    <?php else: ?>
      <div class="row mt-4">
        <?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-md-4 mb-4 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body d-flex flex-column">
                <h5 class="card-title"><?php echo e($result->Job_title); ?></h5>
                <h6 class="card-subtitle mb-2 text-body-secondary"><?php echo e($result->company); ?>, <?php echo e($result->location); ?></h6>
                <p class="card-text flex-grow-1"><b>Skills Required :</b> <?php echo e($result->skills_required); ?></p>
                
              </div>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>

      <div class="d-flex justify-content-center">
        <?php echo e($results->appends(['query' => request('query')])->links()); ?> <!-- Pagination links with query parameter -->
      </div>
    <?php endif; ?>
  </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/raystores/Documents/LARAVEL/Caredge/resources/views/results.blade.php ENDPATH**/ ?>