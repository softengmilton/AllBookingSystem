@extends('Email::layout')
@section('content')
<div class="text-center" style="max-width: 500px; margin: 0 auto;">
    <h4 style="margin-bottom: 20px;"><strong>Booking Details</strong></h4>

    <div style="text-align: left; margin-bottom: 25px;">
        @if($booking->start_date)
        <p style="margin-bottom: 10px;">
            <strong>Check-in:</strong>
            @if(is_string($booking->start_date))
            {{ \Carbon\Carbon::parse($booking->start_date)->format('M j, Y') }}
            @else
            {{ $booking->start_date->format('M j, Y') }}
            @endif
        </p>
        @endif

        @if($booking->end_date)
        <p style="margin-bottom: 10px;">
            <strong>Check-out:</strong>
            @if(is_string($booking->end_date))
            {{ \Carbon\Carbon::parse($booking->end_date)->format('M j, Y') }}
            @else
            {{ $booking->end_date->format('M j, Y') }}
            @endif
        </p>
        @endif

        <p style="margin-bottom: 10px;">
            <strong>Email:</strong> {{ $user->email }}
        </p>

        @if(isset($password))
        <div style="background: #f8f9fa; padding: 10px; border-radius: 5px; margin: 15px 0;">
            <p style="margin: 0;">
                <strong>Temporary Password:</strong> {{ $password }}
            </p>
            <p style="color: #6c757d; font-size: 13px; margin: 5px 0 0;">
                Please change this password after first login.
            </p>
        </div>
        @else
        <p style="color: #6c757d; margin-top: 15px;">
            Your account already exists. Please use your existing password.
        </p>
        @endif
    </div>

    <div style="margin-top: 25px;">
        <a href="{{ url('/login') }}"
            style="background-color: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 4px; display: inline-block;">
            Login to Your Account
        </a>
    </div>
</div>
@endsection