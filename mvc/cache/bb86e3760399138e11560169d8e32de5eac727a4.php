
<?php $__env->startSection('title-content'); ?>
    Sửa sản phẩm
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <body>
    <div class="container">
        <form action="<?php echo e(getClientUrl('save-edit-product')); ?>" method="post" enctype="multipart/form-data">
            <input type="text" name="id" id="" value="<?php echo e($model->id); ?>" hidden>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Tên sản phẩm</label>
                                <input type="text" name="name" id="" class="form-control" value="<?php echo e($model->name); ?>">
                                <span class="text-danger"><?php if(isset($_GET['nameerr'])): ?><?php echo e($_GET['nameerr']); ?> <?php endif; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="">Ảnh</label>
                                <input type="file" name="image" id="" class="form-control">
                                <img src="<?php echo e(BASE_URL.$model->image); ?>" width="515px" alt="">
                                <span class="text-danger"><?php if(isset($_GET['fileerr'])): ?><?php echo e($_GET['fileerr']); ?> <?php endif; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="">Danh mục</label>
                                <select name="cate_id" id="" class="form-control">
                                    <?php $__currentLoopData = $cates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ca): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($ca->id); ?>"
                                                <?php if($ca->id==$model->cate_id): ?>
                                                selected
                                                <?php endif; ?>>
                                            <?php echo e($ca->cate_name); ?>

                                        </option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Giá</label>
                                <input type="text" name="price" id="" class="form-control" value="<?php echo e($model->price); ?>">
                                <span class="text-danger"><?php if(isset($_GET['priceerr'])): ?><?php echo e($_GET['priceerr']); ?> <?php endif; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="">Đánh giá</label>
                                <input type="text" name="star" id="" class="form-control" value="<?php echo e($model->star); ?>">
                                <span class="text-danger"><?php if(isset($_GET['starerr'])): ?><?php echo e($_GET['starerr']); ?> <?php endif; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="">Lượt xem</label>
                                <input type="text" name="views" id="" class="form-control" value="<?php echo e($model->views); ?>">
                                <span class="text-danger"><?php if(isset($_GET['viewerr'])): ?><?php echo e($_GET['viewerr']); ?> <?php endif; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Mô tả ngắn</label>
                                <textarea name="short_desc" id="" cols="30" rows="5"
                                          class="form-control"><?php echo e($model->short_desc); ?></textarea>
                                <span class="text-danger"><?php if(isset($_GET['short_descerr'])): ?><?php echo e($_GET['short_descerr']); ?> <?php endif; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="">Mô tả chi tiết</label>
                                <textarea name="detail" id="" cols="30" rows="5"
                                          class="form-control"><?php echo e($model->detail); ?></textarea>
                                <span class="text-danger"><?php if(isset($_GET['detailerr'])): ?><?php echo e($_GET['detailerr']); ?> <?php endif; ?></span>
                            </div>
                        </div>
                    <input type="submit" name="" id="" value="Lưu" class="btn btn-primary">
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP2\mvc\app\views/products/edit-form.blade.php ENDPATH**/ ?>