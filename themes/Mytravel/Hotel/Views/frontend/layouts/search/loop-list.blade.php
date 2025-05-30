@php
$translation = $row->translate();
@endphp
<li class="card mb-5 overflow-hidden {{$wrap_class ?? ''}}">
    <div class="product-item__outer w-100">
        <div class="row">
            <div class="col-md-5 col-xl-4">
                <div class="product-item__header">
                    <div class="position-relative">
                        <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl()}}" class="d-block">
                            <img class="min-height-230 bg-img-hero card-img-top" src="{{$row->image_url}}" alt="{{$translation->title}}">
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-xl-5 col-wd-4gdot5 flex-horizontal-center">
                <div class="w-100 position-relative m-4 m-md-0 has-skeleton">
                    <div class="mb-1 pb-1">
                        @if($row->is_featured == "1")
                        <span class="badge badge-orange text-white rounded-xs font-size-13 py-1 p-xl-2 mr-2">{{__('Featured')}}</span>
                        @endif
                        @if($row->star_rate)
                        <span class="green-lighter mr-2">
                            @for ($star = 1 ;$star <= $row->star_rate ; $star++)
                                <small class="fa fa-star font-size-12"></small>
                                @endfor
                        </span>
                        @endif
                    </div>
                    <div class="position-absolute top-0 right-0 pr-md-3 d-none d-md-block rtl-left-0 rtl-right-auto">
                        <button type="button" class="btn btn-sm btn-icon rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{__('Save for later')}}">
                            <span class="service-wishlist {{$row->isWishList()}}" data-id="{{$row->id}}" data-type="{{$row->type}}">
                                <span class="flaticon-heart-1 font-size-20"></span>
                            </span>
                        </button>
                    </div>
                    <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl()}}">
                        <span class="font-weight-medium font-size-17 text-dark d-flex mb-1">{{$translation->title}} </span>
                    </a>
                    <div class="card-body p-0">
                        <div class="d-flex flex-wrap flex-xl-nowrap align-items-center font-size-14 text-gray-1">
                            @if(!empty($row->location->name))
                            @php $location = $row->location->translate() @endphp
                            <i class="icon flaticon-placeholder mr-2 font-size-20"></i>{{$location->name ?? ''}}
                            @if($row->map_lat && $row->map_lng)
                            <small class="px-1 font-size-15"> - </small>
                            <a target="_blank" href="https://www.google.com/maps/place/{{$row->map_lat}},{{$row->map_lng}}/@<?php echo $row->map_lat ?>,{{$row->map_lng}},{{!empty($row->map_zoom) ? $row->map_zoom : 12}}z">
                                <span class="text-primary font-size-14">{{__('View on map')}}</span>
                            </a>
                            @endif
                            @endif
                        </div>
                        @if(!empty($attribute = $row->getAttributeInListingPage()))
                        @php
                        $translate_attribute = $attribute->translate();
                        $termsByAttribute = $row->termsByAttributeInListingPage
                        @endphp
                        <span class="attr-title mb-1 d-block"><i class="icofont-medal"></i> {{$translate_attribute->name ?? ""}}: </span>
                        <ul class="list-unstyled mb-2 d-flex flex-lg-wrap flex-xl-wrap">
                            @foreach($termsByAttribute as $key => $term )
                            @if($key < 3)
                                @php $translate_term=$term->translate() @endphp
                                <li class="item {{$term->slug}} term-{{$term->id}} border border-dark rounded-xs d-flex align-items-center text-lh-1 py-1 px-2 mr-2 mb-2 mb-md-0 mb-lg-2 mb-xl-2">
                                    <span class="font-weight-normal font-size-14">{{$translate_term->name}}</span>
                                </li>
                                @endif
                                @endforeach
                        </ul>
                        @endif
                        @if(!empty($translation->badge_tags))
                        <ul class="list-unstyled d-flex pb-2 flex-wrap">
                            @foreach($translation->badge_tags as $key => $item)
                            <li class="border border-{{$item['color']}} bg-{{$item['color']}} rounded-xs d-flex align-items-center text-lh-1 py-1 px-3 mb-2 mr-2">
                                <span class="font-weight-normal font-size-14 text-white">
                                    {{$item['title']}}
                                </span>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col col-xl-3 col-wd-3gdot5 align-self-center py-4 py-xl-0 border-top border-xl-top-0">
                @php
                $priceData = $row->getPrice();
                $formattedPrice = \App\Currency::format($priceData['price']);
                @endphp
                @if($priceData['discount'] != null)
                <span class="font-size-14  d-block bg-danger py-1 px-2 rounded-xs text-center mb-2" style="color: white;">{{$priceData['discount']}}% off</span>
                @endif
                <div class="border-xl-left mx-4 mx-xl-0 pr-xl-3 pr-wd-5 text-xl-right justify-content-xl-end rtl-pr-0 rtl-pl-wd-5 rtl-border-xl-left-0 rtl-border-xl-right">
                    @if(setting_item('hotel_enable_review'))
                    @php $reviewData = $row->getScoreReview(); @endphp
                    <div class="mb-xl-5 mb-wd-2">
                        <div class="mb-0">
                            <div class="my-xl-1">
                                <div class="d-flex align-items-center justify-content-xl-end mb-2">
                                    <span class="badge badge-primary rounded-xs font-size-14 p-2 mr-2 mb-0">{{$reviewData['score_total']}} /5 </span>
                                    <span class="font-size-17 font-weight-bold text-primary">{{$reviewData['review_text']}}</span>
                                </div>
                            </div>
                            <span class="font-size-14 text-gray-1">
                                @if(!empty($reviewData['total_review']))
                                ({{__(":number reviews",['number'=>$reviewData['total_review']])}})
                                @endif
                            </span>
                        </div>
                    </div>
                    @endif
                    <div class="mb-0 pt-1 pb-2">
                        <span class="font-size-14 text-gray-1 d-block">{{ __("Starts from") }}</span>
                        @if($row->getPrice() != $row->getBasePrice())

                        @php
                        $Baseprice = $row->getBasePrice();

                        $formattedBasePrice = \App\Currency::format($Baseprice); //

                        @endphp
                        <div class="line-box">
                            <span class="font-weight-bold line-through text-danger line font-size-16"> {{ $formattedBasePrice }}</span>
                        </div>
                        @endif

                        <!-- // discount percentage -->

                        <div class="font-weight-bold text-dark font-size-24"> {{$formattedPrice}}
                            <span class="font-size-14 text-gray-1"> / {{__('night')}}</span>
                        </div>
                        <!-- <span class="font-size-14 text-gray-1"> / {{__('night')}}</span> -->
                        <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl()}}" class="d-block">
                            <button class="btn btn-warning font-weight-bold mt-2 w-100 w-md-auto">Select</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>

<style>
    .line-box {
        position: relative;
        display: inline;
    }

    .line::after {
        content: "";
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        height: 1px;
        background-color: rgb(213, 32, 32);
        transform: translateY(-50%);
        rotate: -12deg;
    }
</style>