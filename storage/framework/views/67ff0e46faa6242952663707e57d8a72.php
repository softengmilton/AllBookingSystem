<form action="<?php echo e(route("hotel.search")); ?>" class="form bravo_form d-flex flex-wrap align-items-center p-3 bg-white shadow rounded" method="get">
    <div class="container-fluid">
        <div class="row align-items-end">
            <?php $hotel_search_fields = setting_item_array('hotel_search_fields');
            $hotel_search_fields = array_values(\Illuminate\Support\Arr::sort($hotel_search_fields, function ($value) {
                return $value['position'] ?? 0;
            }));
            ?>
            <?php if (!empty($hotel_search_fields)): ?>
                <?php $__currentLoopData = $hotel_search_fields;
                $__env->addLoop($__currentLoopData);
                foreach ($__currentLoopData as $field): $__env->incrementLoopIndices();
                    $loop = $__env->getLastLoop(); ?>
                    <?php $field['title'] = $field['title_' . app()->getLocale()] ?? $field['title'] ?? "" ?>
                    <div class="col-lg-<?php echo e($field['size'] ?? "3"); ?> col-md-6 mb-3">
                        <?php switch ($field['field']):
                            case ('service_name'): ?>
                                <?php echo $__env->make('Hotel::frontend.layouts.search.fields.service_name', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php break; ?>
                            <?php
                            case ('location'): ?>
                                <?php echo $__env->make('Hotel::frontend.layouts.search.fields.location', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php break; ?>
                            <?php
                            case ('date'): ?>
                                <?php echo $__env->make('Hotel::frontend.layouts.search.fields.date', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php break; ?>
                            <?php
                            case ('guests'): ?>
                                <?php echo $__env->make('Hotel::frontend.layouts.search.fields.guests', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php break; ?>
                            <?php
                            case ('attr'): ?>
                                <?php echo $__env->make('Hotel::frontend.layouts.search.fields.attr', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php break; ?>
                        <?php endswitch; ?>
                    </div>
                <?php endforeach;
                $__env->popLoop();
                $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="g-button-submit text-center mt-3 d-flex justify-content-center w-100">
                    <button type="submit" class="btn btn-warning btn-lg px-5 py-2 rounded shadow font-weight-bold" style="color:#00026E;">
                       <?php echo e(__("Search")); ?>
                    </button>
                </div>
            </div>

        </div>
    </div>

</form>

<style>
    .bravo_wrap .bravo_form .g-button-submit {
        max-width: none;
    }

    .form.bravo_form.d-flex.flex-wrap.align-items-center.p-3.bg-white.shadow.rounded {
        height: 150px;
    }

    .card-body {
        flex: 1 1 auto;
        padding: 1rem;
        background: #FFFFFF !important;
        border-radius: 30px;
        position: relative;
    }

    .g-button-submit.text-center.mt-3.d-flex.justify-content-center.w-100 {
        position: absolute !important;
        bottom: -60px !important;
    }

    .bravo-autocomplete {
        display: none !important;
    }

    .input-group.border-bottom.border-width-2.border-color-1.py-2 {
        border: 0px;
    }
    .item {
    border: 1px solid #3333 !important;
    border-radius: 10px !important;
    padding: 5px !important;
}
</style>