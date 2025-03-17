<div class="bravo-form-search-all position-relative hero-block hero-v1 bg-img-hero-bottom text-center z-index-2 " style="background-image: url('<?php echo e($bg_image_url); ?>') !important; min-height: 100vh;">
    <div class="effect-bg position-absolute top-0 left-0 right-0 bottom-0 z-0" style="background:#000 ; opacity: <?php echo e(!empty($bg_opacity) ? $bg_opacity : "0.5"); ?>"></div>
    <div class="container space-2 space-top-xl-4 z-index-2 position-relative">
        <div class="row justify-content-center pb-xl-8">
            <!-- <div class="py-8 py-xl-10 pb-5">
                <h1 class="font-size-60 font-size-xs-30 text-white font-weight-bold"><?php echo e($title ?? ''); ?></h1>
                <p class="font-size-20 font-weight-normal text-white"><?php echo e($sub_title ?? ''); ?></p>
            </div> -->
        </div>
        <?php if (empty($hide_form_search)): ?>
            <div class="mb-lg-n1">
                <div class="all d-flex justify-content-center z-index-100" style="z-index: 100; position: relative;">
                    <ul class="nav tab-nav-rounded flex-nowrap pb-2 pb-md-4 tab-nav justify-content-center" role="tablist">
                        <?php if (!empty($service_types)): ?>
                            <?php $number = 0; ?>
                            <?php $__currentLoopData = $service_types;
                            $__env->addLoop($__currentLoopData);
                            foreach ($__currentLoopData as $service_type): $__env->incrementLoopIndices();
                                $loop = $__env->getLastLoop(); ?>
                                <?php
                                $allServices = get_bookable_services();
                                if (empty($allServices[$service_type])) continue;
                                $module = new $allServices[$service_type];
                                ?>
                                <li class="nav-item" role="bravo_<?php echo e($service_type); ?>">
                                    <a class="nav-link font-weight-medium <?php if ($number == 0): ?> active <?php endif; ?> pl-md-3 pl-2" id="bravo_<?php echo e($service_type); ?>-tab" data-toggle="pill" href="#bravo_<?php echo e($service_type); ?>" role="tab" aria-controls="bravo_<?php echo e($service_type); ?>" aria-selected="true">
                                        <div class="d-flex flex-column flex-md-row align-items-center text-center">
                                            <figure class="ie-height-30 d-md-block mr-md-2">
                                                <i class="icon <?php echo e($module->getServiceIconFeatured()); ?> font-size-2 icon" style="background:black"></i>
                                            </figure>
                                            <span class="tabtext mt-1 mt-md-0 font-weight-semi-bold text-dark">
                                                <?php echo e(!empty($modelBlock["title_for_" . $service_type]) ? $modelBlock["title_for_" . $service_type] : $module->getModelName()); ?>
                                            </span>
                                        </div>
                                    </a>
                                </li>
                                <?php $number++; ?>
                            <?php endforeach;
                            $__env->popLoop();
                            $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="tab-content hero-tab-pane">
                    <?php if (!empty($service_types)): ?>
                        <?php $number = 0; ?>
                        <?php $__currentLoopData = $service_types;
                        $__env->addLoop($__currentLoopData);
                        foreach ($__currentLoopData as $service_type): $__env->incrementLoopIndices();
                            $loop = $__env->getLastLoop(); ?>
                            <?php
                            $allServices = get_bookable_services();
                            if (empty($allServices[$service_type])) continue;
                            ?>
                            <div class="tab-pane fade <?php if ($number == 0): ?> active show <?php endif; ?>" id="bravo_<?php echo e($service_type); ?>" role="tabpanel" aria-labelledby="bravo_<?php echo e($service_type); ?>-tab">
                                <div class="card border-0 tab-shadow">
                                    <div class="card-body">
                                        <?php echo $__env->make(ucfirst($service_type) . '::frontend.layouts.search.form-search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    </div>
                                </div>
                            </div>
                            <?php $number++; ?>
                        <?php endforeach;
                        $__env->popLoop();
                        $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
<?php /**PATH E:\Mytravel.2.4.2\themes/Mytravel/Template/Views/frontend/blocks/form-search-all-service/style_1.blade.php ENDPATH**/ ?>

<style>
    .nav.tab-nav-rounded {
        background-color: #ffffff;
        border-radius: 10px;
        padding: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .nav-item .nav-link {
        border-radius: 0px;
        padding: 8px 15px;
        transition: all 0.3s ease;
        margin: 0 3px;
        border-bottom: 2px solid transparent;
    }

    .nav-item .nav-link.active {
        border-bottom-color: #FDCC02;
    }

    .nav-item .nav-link.active .icon {
        color: #007bff;
    }


    .icon {
        font-size: 18px;
        color: #565656;
        background-color: transparent !important;
    }

    .tabtext {
        font-size: 14px;
        margin-left: 8px;
    }

    .card {
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    /* .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
} */

    .form-control {
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .form-control.hover-effect:hover {
        border-color: #007bff;
        box-shadow: 0 0 8px rgba(0, 123, 255, 0.5);
    }

    .btn-primary {
        background-color: #ff3636;
        border-color: #ff3636;
        border-radius: 5px;
        transition: all 0.3s ease;
    }

    .btn-primary.hover-effect:hover {
        background-color: #e62e2e;
        border-color: #cc2929;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .tab-nav-rounded .nav-link.active .icon::before {
        border-radius: 50%;
        padding: 22px 0px;
        width: 10px;
    }

    .tab-nav-rounded .nav-link.active .icon::before {
        border-radius: 50% !important;
        padding: 11px 0px !important;
        width: 10px !important;
        height: 39px !important;
    }

    .tab-nav-rounded .nav-link.active .icon:before {
        background-color: #ffffff !important;
        border-color: #ffffff !important;
    }

    .tab-nav-rounded .nav-link .icon::before {
        padding: 22px 0;
        height: 62px;
        text-align: center;
        display: inline-block;
    }

    .nav.tab-nav-rounded {
        background-color: #ffffff;
        border-radius: 10px;
        padding: 0px 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    @media (min-width: 768px) {

        .pb-md-4,
        .py-md-4 {
            padding-bottom: 0.5rem !important;
        }
    }
    .tab-content.hero-tab-pane {
  width: 90%;
  margin: auto;
}
</style>