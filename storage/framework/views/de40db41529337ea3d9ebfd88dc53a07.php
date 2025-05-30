<form action="<?php echo e(route("space.search")); ?>" class="form bravo_form d-flex mb-1 py-2" method="get">
    <div class="g-field-search">
        <div class="row d-block nav-select d-flex align-items-end">
            <?php $space_search_fields = setting_item_array('space_search_fields');
            $space_search_fields = array_values(\Illuminate\Support\Arr::sort($space_search_fields, function ($value) {
                return $value['position'] ?? 0;
            }));
            ?>
            <?php if(!empty($space_search_fields)): ?>
                <?php $__currentLoopData = $space_search_fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $field['title'] = $field['title_'.app()->getLocale()] ?? $field['title'] ?? "" ?>
                    <div class="col-md-<?php echo e($field['size'] ?? "6"); ?> mb-4 mb-lg-0 text-left">
                        <?php switch($field['field']):
                            case ('service_name'): ?>
                                <?php echo $__env->make('Space::frontend.layouts.search.fields.service_name', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php break; ?>
                            <?php case ('location'): ?>
                                <?php echo $__env->make('Space::frontend.layouts.search.fields.location', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php break; ?>
                            <?php case ('date'): ?>
                                <?php echo $__env->make('Space::frontend.layouts.search.fields.date', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php break; ?>
                            <?php case ('guests'): ?>
                                <?php echo $__env->make('Space::frontend.layouts.search.fields.guests', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php break; ?>
                            <?php case ('attr'): ?>
                                <?php echo $__env->make('Space::frontend.layouts.search.fields.attr', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php break; ?>
                        <?php endswitch; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="g-button-submit align-self-lg-end">
        <button type="submit" class="btn btn-primary btn-md border-radius-3 mb-xl-0 mb-lg-1 transition-3d-hover">
            <i class="flaticon-magnifying-glass font-size-20 mr-2"></i><?php echo e(__("Search")); ?>

        </button>
    </div>
</form><?php /**PATH E:\Mytravel.2.4.2\themes/Mytravel/Space/Views/frontend/layouts/search/form-search.blade.php ENDPATH**/ ?>