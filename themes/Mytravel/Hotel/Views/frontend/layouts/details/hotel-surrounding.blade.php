@if(!empty($location_category) and !empty($translation->surrounding))
    <div class="g-surrounding py-4 border-bottom">
        <div class="location-title">
            <h3 class="font-size-21 font-weight-bold text-dark mb-4">{{__("What's Nearby")}}</h3>
            @foreach($location_category as $category)
                @if(!empty($translation->surrounding[$category->id]))
                    <h6 class="font-weight-bold mb-3"><i class="{{clean($category->icon_class)}} "></i> {{$category->location_category_translations->name??$category->name}}</h6>
                    @foreach($translation->surrounding[$category->id] as $item)
                        <div class="row mb-3">
                            <div class="col-lg-4">{{$item['name']}} ({{$item['value']}}{{$item['type']}})</div>
                            <div class="col-lg-8">{{$item['content']}}</div>
                        </div>
                    @endforeach
                @endif
            @endforeach
        </div>
    </div>
    <div class="bravo-hr"></div>
@endif
