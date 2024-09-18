
<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
</head>
<body>
    <p>Dear Admin,</p> <!-- Takes the logged-in user's name -->
    <p>A New Booking request has been placed.Status is pending. </p>
    <ul>
        <li><strong>User's Name:</strong> {{ Auth::user()->name }} </li>
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
</body>
</html>

