<form action="{{ route("space.search") }}" class="form bravo_form d-flex mb-1 py-2" method="get">
    <div class="g-field-search">
        <div class="row d-block nav-select d-flex align-items-end">
            @php $space_search_fields = setting_item_array('space_search_fields');
            $space_search_fields = array_values(\Illuminate\Support\Arr::sort($space_search_fields, function ($value) {
                return $value['position'] ?? 0;
            }));
            @endphp
            @if(!empty($space_search_fields))
                @foreach($space_search_fields as $field)
                    @php $field['title'] = $field['title_'.app()->getLocale()] ?? $field['title'] ?? "" @endphp
                    <div class="col-md-{{ $field['size'] ?? "6" }} mb-4 mb-lg-0 text-left">
                        @switch($field['field'])
                            @case ('service_name')
                                @include('Space::frontend.layouts.search.fields.service_name')
                            @break
                            @case ('location')
                                @include('Space::frontend.layouts.search.fields.location')
                            @break
                            @case ('date')
                                @include('Space::frontend.layouts.search.fields.date')
                            @break
                            @case ('guests')
                                @include('Space::frontend.layouts.search.fields.guests')
                            @break
                            @case ('attr')
                                @include('Space::frontend.layouts.search.fields.attr')
                            @break
                        @endswitch
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    <div class="g-button-submit align-self-lg-center">
        <button type="submit" class="btn btn-md border-radius-3 mb-xl-0 mb-lg-1 transition-3d-hover">
            <i class="flaticon-magnifying-glass font-size-20 mr-2"></i>{{ __("Search") }}
        </button>
    </div>
</form>