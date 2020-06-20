
<?php $__env->startSection('title-content'); ?>
    Sửa loại sản phẩm
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <body>
    <div class="container">
        <form action="<?php echo e(getClientUrl('save-edit-category')); ?>" method="post" enctype="multipart/form-data">
            <input type="text" name="id" id="" value="<?php echo e($model->id); ?>" hidden>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Tên loại</label>
                                <input type="text" name="cate_name" id="" class="form-control"
                                       value="<?php echo e($model->cate_name); ?>">
                                <span class="text-danger"><?php if(isset($_GET['nameerr'])): ?><?php echo e($_GET['nameerr']); ?> <?php endif; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="">Mô tả</label>
                                <textarea name="desc" id="" cols="30" rows="3"
                                          class="form-control"><?php echo e($model->desc); ?></textarea>
                                <span class="text-danger"><?php if(isset($_GET['descerr'])): ?><?php echo e($_GET['descerr']); ?> <?php endif; ?></span>
                            </div>
                        </div>
                        <input type="submit" name="" id="" value="Lưu" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP2\mvc\app\views/categories/edit-form.blade.php ENDPATH**/ ?>