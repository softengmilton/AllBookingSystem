<tr>
    <td class="booking-history-type">
        @if($service = $booking->service)
        <i class="{{$service->getServiceIconFeatured()}}"></i>
        @endif
        <small>{{$booking->object_model}}</small>
    </td>
    <td>
        @if($service = $booking->service)
        @php
        $translation = $service->translate();
        @endphp
        <a target="_blank" href="{{$service->getDetailUrl()}}">
            {{$translation->title}}
        </a>
        @else
        {{__("[Deleted]")}}
        @endif
    </td>
    <td class="a-hidden">{{display_date($booking->created_at)}}</td>
    <td class="a-hidden">
        {{__("Start date")}} : {{display_date($booking->start_date)}} <br>
        {{__("End date")}} : {{display_date($booking->end_date)}} <br>
        {{__("Duration")}} :

        @if($booking->duration_nights <= 1)
            {{__(':count night',['count'=>$booking->duration_nights])}}
            @else
            {{__(':count nights',['count'=>$booking->duration_nights])}}
            @endif
            </td>
    <td>{{format_money_main($booking->total)}}</td>
    <td>{{format_money($booking->paid)}}</td>
    <td>{{format_money($booking->total - $booking->paid)}}</td>
    <td class="{{$booking->status}} a-hidden">{{$booking->statusName}}</td>
    <td width="2%">
        @if($service = $booking->service)
        <a class="btn btn-xs btn-primary btn-info-booking" data-toggle="modal" data-target="#modal-booking-{{$booking->id}}">
            <i class="fa fa-info-circle"></i>{{__("Details")}}
        </a>
        @include ($service->checkout_booking_detail_modal_file ?? '')
        @endif
        <a href="{{route('user.booking.invoice',['code'=>$booking->code])}}" class="btn btn-xs btn-primary btn-info-booking open-new-window mt-1" onclick="window.open(this.href); return false;">
            <i class="fa fa-print"></i>{{__("Invoice")}}
        </a>
        @if($booking->cancellation_time === null || now()->lte($booking->cancellation_time ))
        @if($booking->object_model == 'hotel')
        <form action="{{ route('user.cancel_booking', $booking->code) }}" method="POST" onsubmit="return confirm('Are you sure you want to cancel this booking?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-xs btn-warning btn-info-booking open-new-window mt-1">
                {{ __('Cancel Booking') }}
            </button>
        </form>
        @endif
        @endif
    </td>
</tr>