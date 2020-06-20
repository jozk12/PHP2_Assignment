
<?php $__env->startSection('title-content'); ?>
    Thêm loại sản phẩm
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="container">
        <form action="<?php echo e(getClientUrl('save-add-category')); ?>" method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Tên loại</label>
                                <input type="text" name="cate_name" id="" class="form-control">
                                <span class="text-danger"><?php if(isset($_GET['nameerr'])): ?><?php echo e($_GET['nameerr']); ?> <?php endif; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="">Mô tả</label>
                                <textarea name="desc" id="" cols="30" rows="3" class="form-control"></textarea>
                                <span class="text-danger"><?php if(isset($_GET['descerr'])): ?><?php echo e($_GET['descerr']); ?> <?php endif; ?></span>
                            </div>
                        </div>
                        <input type="submit" name="" id="" value="Thêm" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP2\mvc\app\views/categories/add-form.blade.php ENDPATH**/ ?>