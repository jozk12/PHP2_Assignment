
<?php $__env->startSection('title-content'); ?>
    Tài khoản
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Avatar</th>
                            <th>Email</th>
                            <th colspan="2">
                                <a href="<?= getClientUrl('add-user') ?>">
                                    <button class="btn btn-primary"><i class="fas fa-plus"></i>&nbsp; Thêm</button>
                                </a>
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($u->id); ?> </td>
                                <td><?php echo e($u->name); ?></td>
                                <td><img src="<?php echo e(BASE_URL. $u->avatar); ?>" alt="" width="100px"></td>
                                <td><?php echo e($u->email); ?></td>
                                <td>
                                    <a href="<?= getClientUrl('edit-user', ['id' => $u->id]) ?>">
                                        <button class="btn btn-success"><i class="fas fa-edit"></i>&nbsp; Sửa</button>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?= getClientUrl('remove-user', ['id' => $u->id]) ?>">
                                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i>&nbsp; Xóa
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                    <div class="row pt-4">
                        <div class="col-sm-12 col-md-5">
                            <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">
                                Showing <?php echo e($offset+1); ?>

                                to
                                <?php if($offset+$total_user_one_page < count($getAllUser)): ?>
                                    <?php echo e($offset+$total_user_one_page); ?>

                                <?php else: ?>
                                    <?php echo e(count($getAllUser)); ?>

                                <?php endif; ?>
                                of <?php echo e(count($getAllUser)); ?> entries
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-3">
                            <div class="dataTables_paginate paging_simple_numbers text-right">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous <?php if($page==1): ?> disabled <?php endif; ?>">
                                        <a href="<?php echo e(getClientUrl('user',['page'=>1])); ?>" class="page-link">First</a>
                                    </li>
                                    <li class="paginate_button page-item previous <?php if($page==1): ?> disabled <?php endif; ?>">
                                        <a href="<?php echo e(getClientUrl('user',['page'=>$page-1])); ?>" class="page-link"><<</a>
                                    </li>
                                    <?php for($i = 1; $i <= $total_page; $i++): ?>
                                        <?php if($i < $page+3 && $i > $page-3): ?>
                                            <li class="paginate_button page-item <?php if($page==$i): ?> active <?php endif; ?>" >
                                                <a href="<?php echo e(getClientUrl('user',['page'=>$i])); ?>" class="page-link">
                                                    <?php echo e($i); ?>

                                                    </a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                    <li class="paginate_button page-item next <?php if($page==$total_page): ?> disabled <?php endif; ?>">
                                        <a href="<?php echo e(getClientUrl('user',['page'=>$page+1])); ?>" class="page-link">>></a>
                                    </li>
                                    <li class="paginate_button page-item next <?php if($page==$total_page): ?> disabled <?php endif; ?>">
                                        <a href="<?php echo e(getClientUrl('user',['page'=>$total_page])); ?>" class="page-link">Last</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP2\mvc\app\views/users/index.blade.php ENDPATH**/ ?>