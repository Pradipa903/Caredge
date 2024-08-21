<!DOCTYPE html>
<html>
<head>
    <title>Job Recommendations</title>
</head>
<body>
    <h1>Job Recommendations</h1>

    <?php if(isset($error)): ?>
        <p><?php echo e($error); ?></p>
    <?php else: ?>
        <p>User ID: <?php echo e($recommendations['user_id']); ?></p>
        <ul>
            <?php $__currentLoopData = $recommendations['recommendations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recommendation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li>
                    <strong>Job Title:</strong> <?php echo e($recommendation['job_title']); ?><br>
                    <strong>Required Skills:</strong> <?php echo e($recommendation['job_skills']); ?><br>
                    <strong>Similarity Score:</strong> <?php echo e($recommendation['sim_score']); ?>%
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    <?php endif; ?>
</body>
</html>
<?php /**PATH D:\laravelP\Caredge\resources\views/testing.blade.php ENDPATH**/ ?>