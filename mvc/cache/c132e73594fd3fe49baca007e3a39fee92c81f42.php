
<?php $__env->startSection('title-content'); ?>
    Sửa hóa đơn
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <body>
    <div class="container">
        <form action="<?php echo e(getClientUrl('save-edit-invoice')); ?>" method="post" enctype="multipart/form-data">
            <input type="text" name="id" id="" value="<?php echo e($model->id); ?>" hidden>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Tên khách hàng</label>
                                <input type="text" name="customer_name" id="" class="form-control"
                                       value="<?php echo e($model->customer_name); ?>">
                                <span class="text-danger"><?php if(isset($_GET['nameerr'])): ?><?php echo e($_GET['nameerr']); ?> <?php endif; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="">Số điện thoại</label>
                                <input type="text" name="customer_phone_number" id="" class="form-control"
                                       value="<?php echo e($model->customer_phone_number); ?>">
                                <span class="text-danger"><?php if(isset($_GET['phoneerr'])): ?><?php echo e($_GET['phoneerr']); ?> <?php endif; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="text" name="customer_email" id="" class="form-control"
                                       value="<?php echo e($model->customer_email); ?>">
                                <span class="text-danger"><?php if(isset($_GET['emailerr'])): ?><?php echo e($_GET['emailerr']); ?> <?php endif; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Địa chỉ</label>
                                    <input type="text" name="customer_address" id="" class="form-control"
                                           value="<?php echo e($model->customer_address); ?>">
                                    <span class="text-danger"><?php if(isset($_GET['addresserr'])): ?><?php echo e($_GET['addresserr']); ?> <?php endif; ?></span>
                                </div>
                                <div class="form-group">
                                    <label for="">Tổng hóa đơn</label>
                                    <input type="text" name="total_price" id="" class="form-control"
                                           value="<?php echo e($model->total_price); ?>">
                                    <span class="text-danger"><?php if(isset($_GET['priceerr'])): ?><?php echo e($_GET['priceerr']); ?> <?php endif; ?></span>
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
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP2\mvc\app\views/invoices/edit-form.blade.php ENDPATH**/ ?>