
<?php $__env->startSection('content'); ?>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Product Name</th>
            <th>Image</th>
            <th colspan="2"><a href="<?= getClientUrl('add-gallery') ?>">Thêm</a></th>
        </tr>
        </thead>
        <tbody>
        <?php $__currentLoopData = $galleries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($g->id); ?> </td>
                <td><?php echo e($g->getName->name); ?></td>
                <td><img src="<?php echo e(BASE_URL.$g->img_url); ?>" alt=""></td>
                <td><a href="<?= getClientUrl('edit-gallery', ['id' => $g->id]) ?>">Sửa</a></td>
                <td><a href="<?= getClientUrl('remove-gallery', ['id' => $g->id]) ?>">Xóa</a></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP2\mvc\app\views/galleries/index.blade.php ENDPATH**/ ?>