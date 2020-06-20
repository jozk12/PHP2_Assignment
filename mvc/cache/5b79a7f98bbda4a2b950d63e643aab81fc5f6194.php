
<?php $__env->startSection('title-content'); ?>
    Sửa tài khoản
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <body>
    <div class="container">
        <form action="<?php echo e(getClientUrl('save-edit-user')); ?>" method="post" enctype="multipart/form-data">
            <input type="text" name="id" id="" value="<?php echo e($model->id); ?>" hidden>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Tên</label>
                                <input type="text" name="name" id="" class="form-control" value="<?php echo e($model->name); ?>">
                                <span class="text-danger"><?php if(isset($_GET['nameerr'])): ?><?php echo e($_GET['nameerr']); ?> <?php endif; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="">Ảnh</label>
                                <input type="file" name="avatar" id="" class="form-control">
                                <img src="<?php echo e(BASE_URL.$model->avatar); ?>" width="515" alt="">
                                <span class="text-danger"><?php if(isset($_GET['fileerr'])): ?><?php echo e($_GET['fileerr']); ?> <?php endif; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" name="email" id="" class="form-control"
                                           value="<?php echo e($model->email); ?>">
                                    <span class="text-danger"><?php if(isset($_GET['emailerr'])): ?><?php echo e($_GET['emailerr']); ?> <?php endif; ?></span>
                                </div>
                            </div>
                        </div>
                    <input type="submit" name="" id="" value="Lưu" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP2\mvc\app\views/users/edit-form.blade.php ENDPATH**/ ?>