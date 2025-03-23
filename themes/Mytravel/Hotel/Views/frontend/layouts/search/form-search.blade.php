<form action="{{ route("hotel.search") }}" class="form bravo_form d-flex mb-1 py-2" method="get">
    <div class="g-field-search">
        <div class="row d-block nav-select d-flex align-items-end">
            @php $hotel_search_fields = setting_item_array('hotel_search_fields');
            $hotel_search_fields = array_values(\Illuminate\Support\Arr::sort($hotel_search_fields, function ($value) {
            return $value['position'] ?? 0;
            }));
            @endphp
            @if(!empty($hotel_search_fields))
            @foreach($hotel_search_fields as $field)
            @php $field['title'] = $field['title_'.app()->getLocale()] ?? $field['title'] ?? "" @endphp
            <div class="col-md-{{ $field['size'] ?? "6" }} mb-4 mb-lg-0 text-left">
                @switch($field['field'])
                @case ('service_name')
                @include('Hotel::frontend.layouts.search.fields.service_name')
                @break
                @case ('location')
                @include('Hotel::frontend.layouts.search.fields.location')
                @break
                @case ('date')
                @include('Hotel::frontend.layouts.search.fields.date')
                @break
                @case ('guests')
                @include('Hotel::frontend.layouts.search.fields.guests')
                @break
                @case ('attr')
                @include('Hotel::frontend.layouts.search.fields.attr')
                @break
                @endswitch
            </div>
            @endforeach
            @endif
        </div>
    </div>
    <div class="g-button-submit align-self-lg-center">
        <button type="submit" class="btn  btn-md border-radius-3 mb-xl-0 mb-lg-1 transition-3d-hover">
            <i class="flaticon-magnifying-glass font-size-20 mr-2"></i>{{ __("Search") }}
        </button>
    </div>
</form>


<style>
    .tablist-box {
        position: relative;
        overflow-x: none;
        white-space: nowrap;
        max-width: 100%;
        padding: 10px 0;
    }

    /* General Form Styling */
    .form.bravo_form {
        padding: 20px;
        border-radius: 12px;
        /* box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); */
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    /* Trip Type Selector */

    /* Search Fields Layout */
    .g-field-search {
        display: flex;
        width: 100%;
        justify-content: space-between;
        gap: 10px;
    }

    .g-field-search .row {
        flex-grow: 1;
        display: flex;
        justify-content: space-between;
        flex-wrap: nowrap;
    }

    .g-field-search .col-md-6 {
        flex: 1;
        /* min-width: 150px; */
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 10px;
        background: #f9f9f9;
        text-align: left;
    }

    /* Labels & Fields */
    .g-field-search .form-label {
        font-weight: 600;
        color: #444;
        margin-bottom: 5px;
        display: block;
    }

    .g-field-search .form-control {
        border-radius: 8px;
        padding: 8px 12px;
        border: 1px solid #ccc;
        font-size: 14px;
    }

    /* Search Button */
    .g-button-submit {
        text-align: center;
        margin-top: 15px;
    }

    .g-button-submit .btn {
        padding: 12px 35px;
        font-size: 18px;
        font-weight: bold;
        border-radius: 25px;
        background: #ffcc00;
        color: #000;
        border: none;
        transition: all 0.3s;
    }

    .g-button-submit .btn:hover {
        background: #ffb700;
        transform: translateY(-2px);
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .g-field-search {
            flex-direction: column;
        }

        .g-field-search .row {
            flex-wrap: wrap;
        }

        .g-button-submit {
            width: 100%;
        }

        .g-button-submit .btn {
            width: 100%;
        }
    }



    .g-field-search .col-md-6 {
        flex: none !important;
        min-width: 0 !important;
        padding: 0px  !important;;
        border: 0 !important;
        border-radius: 0px !important;
        background: none !important;
        text-align: center !important;
    }
</style>