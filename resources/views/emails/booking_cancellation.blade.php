<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="">
        <p>**Booking Details:**</p>
        <span>- Check-in: {{ $booking->start_date->format('M j, Y') }}</span>
        <span>- Check-out: {{ $booking->end_date->format('M j, Y') }}</span>
        <span>password: {{ $password }}</span>
        <span>email: {{$user->email}}</span>
    </div>
</body>

</html>