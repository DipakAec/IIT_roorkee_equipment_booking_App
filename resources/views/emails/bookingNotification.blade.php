{{-- <!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
</head>
<body>
    <p>Dear User,</p>
    <p>Your booking has been confirmed:</p>
    <ul>
        <li>Date: {{ $booking->booking_date }}</li>
        <li>Slot: {{ $booking->booking_timings }}</li>
        <li>Status: {{ $booking->status }}</li>
    </ul>
    <p>Thank you for using our service.</p>

    <p>Best regards,<br>Your Company</p>
</body>
</html> --}}

<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
</head>
<body>
    <p>Dear {{ Auth::user()->name }},</p> <!-- Takes the logged-in user's name -->
    <p>Congratulations, your booking is successfully completed:</p>
    <ul>
        {{-- <li><strong>Instrument Name:</strong> {{ $booking->instrument_name }}</li> --}}
        <li><strong>Booking Ref. No.:</strong> {{ $booking->ref_no }}</li>
    </ul>

    <p><strong>Previous Booking details are as follows:</strong></p>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>Booking Date</th>
                <th>Booking Timing</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $booking->booking_date }}</td>
                <td>{{ $booking->booking_timings }}</td>
            </tr>
        </tbody>
    </table>

    <p><strong>Reporter comment:</strong> {{ $booking->reporter_comment }}</p>

    <p>Thank you for using our service.</p>
    <p>Best regards,<br>Your Company</p>
</body>
</html>

