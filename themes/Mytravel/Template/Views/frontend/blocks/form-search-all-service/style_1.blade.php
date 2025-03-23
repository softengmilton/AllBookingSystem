<div class="bravo-form-search-all position-relative hero-block hero-v1 bg-img-hero-bottom text-center z-index-2"
    style="background-image: url('{{$bg_image_url}}') !important;">
    <div class="effect-bg position-absolute top-0 left-0 right-0 bottom-0 z-0"
        style="background:#000 ; opacity: {{ !empty($bg_opacity) ? $bg_opacity : "0.5" }};"></div>
    <div class="container space-2 space-top-xl-4 z-index-2 position-relative">
        <div class="row justify-content-center pb-xl-8">
            <div class="py-8 py-xl-10 pb-5">
                <h1 class="hero-title">{{$title ?? ''}}</h1>
                <p class="hero-subtitle">{{$sub_title ?? ''}}</p>
            </div>
        </div>
        @if(empty($hide_form_search))
        <div class="mb-lg-n1 tablist-box">
            <ul class="nav tab-nav" role="tablist">
                @if(!empty($service_types))
                @php $number = 0; @endphp
                @foreach ($service_types as $service_type)
                @php
                $allServices = get_bookable_services();
                if(empty($allServices[$service_type])) continue;
                $module = new $allServices[$service_type];
                @endphp
                <li class="nav-item" role="bravo_{{$service_type}}">
                    <a class="nav-link @if($number == 0) active @endif" id="bravo_{{$service_type}}-tab"
                        data-toggle="pill" href="#bravo_{{$service_type}}" role="tab"
                        aria-controls="bravo_{{$service_type}}" aria-selected="true">
                        <i class="icon {{ $module->getServiceIconFeatured() }}"></i>
                        <span class="tabtext">
                            {{ !empty($modelBlock["title_for_".$service_type]) ? $modelBlock["title_for_".$service_type] : $module->getModelName() }}
                        </span>
                    </a>
                </li>
                @php $number++; @endphp
                @endforeach
                @endif
            </ul>
            <div class="tab-content hero-tab-pane">
                @if(!empty($service_types))
                @php $number = 0; @endphp
                @foreach ($service_types as $service_type)
                @php
                $allServices = get_bookable_services();
                if(empty($allServices[$service_type])) continue;
                @endphp
                <div class="tab-pane fade @if($number == 0) active show @endif" id="bravo_{{$service_type}}"
                    role="tabpanel" aria-labelledby="bravo_{{$service_type}}-tab">
                    <div class="card border-0 tab-shadow">
                        <div class="card-body">
                            @include(ucfirst($service_type).'::frontend.layouts.search.form-search')
                        </div>
                    </div>
                </div>
                @php $number++; @endphp
                @endforeach
                @endif
            </div>
        </div>
        @endif
    </div>
</div>

<style>
    /* Prevent horizontal scroll */
    html, body {
        overflow-x: hidden;
    }

    /* Responsive Hero Title */
    .hero-title {
        font-size: 48px;
        font-weight: bold;
        color: white;
    }

    .hero-subtitle {
        font-size: 18px;
        font-weight: normal;
        color: white;
    }

    @media (max-width: 768px) {
        .hero-title {
            font-size: 32px;
        }

        .hero-subtitle {
            font-size: 16px;
        }
    }

    /* Responsive Tabs */
    .tablist-box {
        position: relative;
        overflow-x: auto;
        white-space: nowrap;
        max-width: 100%;
        padding: 10px 0;
    }

    .tablist-box .tab-nav {
        background: #fff;
        border-radius: 10px;
        padding: 15px;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        gap: 15px;
        width: 60%;
        max-width: 100%;
        margin: auto;
        position: relative;
        z-index: 100;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .tab-nav .nav-item {
        position: relative;
    }

    .tab-nav .nav-link {
        display: flex;
        flex-direction: column;
        align-items: center;
        color: #333;
        font-weight: 600;
        font-size: 14px;
        padding: 10px 15px;
        text-decoration: none;
        white-space: nowrap;
    }

    .tab-nav .nav-link .icon {
        font-size: 18px;
        margin-bottom: 5px;
    }

    .tab-nav .nav-link.active {
        color: #002C77;
        font-weight: bold;
    }

    .tab-nav .nav-link.active::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 50%;
        transform: translateX(-50%);
        width: 40%;
        height: 3px;
        background: #FFD700;
        border-radius: 2px;
    }

    .nav-link {
        padding: 10px;
        border-radius: 10px;
        transition: all 0.3s;
    }

    .nav-link.active,
    .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.1);
    }

    /* Responsive Card Body */
    .card-body {
        padding: 15px;
    }

    @media (max-width: 768px) {
        .tablist-box {
            overflow-x: auto;
            width: 100%;
        }

        .tablist-box .tab-nav {
            flex-wrap: nowrap;
            justify-content: flex-start;
            overflow-x: auto;
            white-space: nowrap;
            padding: 10px;
            width: 100%;
        }

        .tab-nav .nav-item {
            flex-shrink: 0;
        }

        .tab-nav .nav-link {
            font-size: 12px;
            padding: 8px 12px;
        }

        .tab-nav .nav-link .icon {
            font-size: 16px;
        }

        .hero-title {
            font-size: 28px;
        }

        .hero-subtitle {
            font-size: 14px;
        }
    }
</style>
