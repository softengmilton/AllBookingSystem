<?php if($list_item): ?>
    <div class="bravo-featured-item <?php echo e($style ?? ''); ?> <?php if(empty($border_none)): ?> border-bottom <?php endif; ?>">
        <div class="container space-1">
            <?php if(!empty($title)): ?>
            <div class="w-md-80 w-lg-50 text-center mx-md-auto pb-1 pt-3">
                <h2 class="section-title text-black font-size-30 font-weight-bold"><?php echo e($title ?? ''); ?></h2>
            </div>
            <?php endif; ?>
            <div class="row">
                <?php $__currentLoopData = $list_item; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4">
                        <div class="media pr-xl-14">
                            <i class="<?php echo e($item['icon']); ?> text-primary font-size-50 text-lh-1 mb-3 mr-3"></i>
                            <div class="media-body">
                                <h5 class="font-size-19 text-dark font-weight-bold mb-1">
                                    <a href="<?php echo e($item['link'] ?? '#'); ?>"><?php echo e($item['title'] ?? ''); ?></a>
                                </h5>
                                <p class="text-gray-1 text-lh-inherit"><?php echo e($item['sub_title'] ?? ''); ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<?php /**PATH E:\Mytravel.2.4.2\themes/Mytravel/Template/Views/frontend/blocks/list-featured-item/style_3.blade.php ENDPATH**/ ?>