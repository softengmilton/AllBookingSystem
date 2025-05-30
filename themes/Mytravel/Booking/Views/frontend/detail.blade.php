@extends('layouts.app')
@push('css')
<link href="{{ asset('dist/frontend/module/booking/css/checkout.css?_ver='.config('app.asset_version')) }}" rel="stylesheet">
@endpush
@section('content')
<div class="bravo-booking-page padding-content">
    <div class="bg-gray space-2">
        <div class="container">
            <div class="row booking-success-notice">
                <!-- Main Content Column -->
                <div class="col-lg-8 col-xl-9">
                    <div class="mb-5 shadow-soft bg-white rounded-sm">
                        <div class="py-6 px-5 border-bottom">
                            <div class="flex-horizontal-center">
                                @switch($booking->status)
                                @case(\Modules\Booking\Models\Booking::COMPLETED)
                                @case(\Modules\Booking\Models\Booking::PROCESSING)
                                @case(\Modules\Booking\Models\Booking::CONFIRMED)
                                @case(\Modules\Booking\Models\Booking::CONFIRMED)
                                <div class="height-50 width-50 flex-shrink-0 flex-content-center bg-primary rounded-circle">
                                    <i class="flaticon-tick text-white font-size-24"></i>
                                </div>
                                <div class="ml-3">
                                    <h3 class="font-size-18 font-weight-bold text-dark mb-0 text-lh-sm">
                                        {{__('Thank You. Your booking was submitted successfully!')}}
                                    </h3>
                                    <p class="mb-0">
                                        {{__('Booking details has been sent to:')}} <span>{{$booking->email}}</span>
                                    </p>
                                    @if($note = $gateway->getOption("payment_note"))
                                    <p class="mb-0">
                                        {!! clean($note) !!}
                                    </p>
                                    @endif
                                </div>
                                @break
                                @default
                                <div class="height-50 width-50 flex-shrink-0 flex-content-center bg-primary rounded-circle">
                                    <i class=" fa fa-warning text-white font-size-24"></i>
                                </div>
                                <div class="ml-3">
                                    <h3 class="font-size-18 font-weight-bold text-dark mb-0 text-lh-sm">
                                        {{__('Your booking status is: :status',['status'=>booking_status_to_text($booking->status)])}}
                                    </h3>
                                </div>
                                @break
                                @endswitch
                            </div>
                        </div>

                        @include ($service->booking_customer_info_file ?? 'Booking::frontend/booking/booking-customer-info')

                        <div class="text-right py-4 pr-4">
                            <div class="d-flex align-items-center justify-content-end text-right">
                                @if($booking->cancellation_time === null || now()->lte($booking->cancellation_time))
                                @if($booking->object_model == 'hotel')
                                <form action="{{ route('user.cancel_booking', $booking->code) }}" method="POST"
                                    onsubmit="return confirm('{{ __('Are you sure you want to cancel this booking?') }}');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-warning rounded-sm transition-3d-hover font-size-16 font-weight-bold py-3 me-2 my-2">
                                        {{ __('Cancel Booking') }}
                                    </button>
                                </form>
                                @endif
                                @endif
                            </div>

                            <a href="{{ route('user.booking_history') }}"
                                class="btn btn-primary rounded-sm transition-3d-hover font-size-16 my-2 font-weight-bold py-3">
                                {{ __('Booking History') }}
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Column -->
                <div class="col-lg-4 col-xl-3">
                    @include ($service->checkout_booking_detail_file ?? '')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection