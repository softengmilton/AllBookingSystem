@extends('Email::layout')
@section('content')
    <div class="text-center w-50">
        <p><strong>Booking Details:</strong></p>
        
        @if($booking->start_date)
            <span>- Check-in: 
                @if(is_string($booking->start_date))
                    {{ \Carbon\Carbon::parse($booking->start_date)->format('M j, Y') }}
                @else
                    {{ $booking->start_date->format('M j, Y') }}
                @endif
            </span><br>
        @endif
        
        @if($booking->end_date)
            <span>- Check-out: 
                @if(is_string($booking->end_date))
                    {{ \Carbon\Carbon::parse($booking->end_date)->format('M j, Y') }}
                @else
                    {{ $booking->end_date->format('M j, Y') }}
                @endif
            </span><br>
        @endif
        
        @if(isset($password))
            <span>- Temporary Password: {{ $password }}</span><br>
        @endif
        
        <span>- Email: {{ $user->email }}</span>
    </div>
    </div>
@endsection