<!DOCTYPE html>
<html>
<head>
    <title>Job Recommendations</title>
</head>
<body>
    <h1>Job Recommendations for User <?php echo e($data['id']); ?></h1>
    <ul>
        <?php $__currentLoopData = $data['recommendations']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recommendation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <strong>Job Title:</strong> <?php echo e($recommendation['company']); ?><br>
                <strong>Job Title:</strong> <?php echo e($recommendation['job_title']); ?><br>
                <strong>Skills Required:</strong> <?php echo e($recommendation['job_skills']); ?><br>
                <strong>Similarity Score:</strong> <?php echo e($recommendation['sim_score']); ?>%
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</body>
</html>
<?php /**PATH /Users/raystores/Downloads/Caredge/resources/views//python-data.blade.php ENDPATH**/ ?>