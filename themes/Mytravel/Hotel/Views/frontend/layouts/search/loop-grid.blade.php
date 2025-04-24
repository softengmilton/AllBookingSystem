@php
$translation = $row->translate();
@endphp
<div class="card transition-3d-hover shadow-hover-2 mt-2 item-loop {{$wrap_class ?? ''}}">

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
    <div class="position-relative">
        <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl(false)}}" class="d-block gradient-overlay-half-bg-gradient-v5">
            @if($row->image_url)
            @if(!empty($disable_lazyload))
            <img class="card-img-top" src="{{$row->image_url}}" alt="{{$translation->title}}">
            @else
            {!! get_image_tag($row->image_id,'thumb',['class'=>'img-responsive card-img-top','alt'=>$translation->title]) !!}
            @endif
            @endif
        </a>
        <div class="position-absolute top-0 right-0 pt-3 pr-3">
            <button type="button" class="btn btn-sm btn-icon text-white rounded-circle" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{__('Save for later')}}">
                <span class="service-wishlist {{$row->isWishList()}}" data-id="{{$row->id}}" data-type="{{$row->type}}">
                    <span class="flaticon-heart-1 font-size-20"></span>
                </span>
            </button>
        </div>
        @if($translation->address)
        <div class="position-absolute bottom-0 left-0 right-0">
            <div class="px-4 pb-3">
                <a href="{{$row->getDetailUrl(false)}}" class="d-block">
                    <div class="d-flex align-items-center font-size-14 text-white">
                        <i class="icon flaticon-placeholder mr-2 font-size-20"></i> {{$translation->address}}
                    </div>
                </a>
            </div>
        </div>
        @endif
    </div>
    <div class="card-body px-4 pt-2 pb-3">
        @if($row->star_rate)
        <div class="mb-2 hotel-star">
            <div class="d-inline-flex align-items-center font-size-13 text-lh-1 text-primary letter-spacing-3">
                <div class="green-lighter">
                    @for ($star = 1 ;$star <= $row->star_rate ; $star++)
                        <small class="fa fa-star"></small>
                        @endfor
                </div>
            </div>
        </div>
        @endif
        <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl(false)}}" class="card-title font-size-17 font-weight-medium text-dark">{{$translation->title}}</a>
        @if(setting_item('hotel_enable_review'))
        @php
        $reviewData = $row->getScoreReview();
        @endphp
        @if($reviewData)
        <div class="mt-2 mb-3">
            <span class="badge badge-pill badge-primary py-1 px-2 font-size-14 border-radius-3 font-weight-normal">{{$reviewData['score_total']}}/5</span>
            <span class="font-size-14 text-gray-1 ml-2">(
                @if($reviewData['total_review'] > 1)
                {{ __(":number reviews",["number"=>$reviewData['total_review'] ]) }}
                @else
                {{ __(":number review",["number"=>$reviewData['total_review'] ]) }}
                @endif() )
            </span>
            @if($row->getPrice()['discount'] != null)
            <span class="font-size-14" style="color: red;">{{$row->getPrice()['discount']}}% off</span>
            @endif
        </div>
        @endif
        @endif
        <div class="mb-0">
            <span class="mr-1 font-size-14 text-gray-1">{{__("From")}}</span>
            <!-- <span class="font-weight-bold">{{ $row->display_price }}</span> -->
            @if($row->getPrice()['price'] != $row->getBasePrice())
            <div class="line-box">
                <span class="font-weight-bold line-through text-gray-1 font-size-14 line">{{ $row->getBasePrice() ?? '' }}</span>
            </div>

            @endif
            <span class="font-weight-bold">{{ \App\Currency::format($row->getPrice()['price']) }}</span>
            <span class="font-size-14 text-gray-1">{{__("/night")}}</span>
        </div>
    </div>
</div>