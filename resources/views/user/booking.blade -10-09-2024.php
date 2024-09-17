@extends('user.master')
@section('section')
<div id="content-wrapper" class="d-flex flex-column">
<!-- Main Content -->
<div id="content">
<!-- End of Topbar -->
<div class="wrapper wrapper-content">
   <div class="row">
      <div class="col-lg-12">
         <div class="ibox ">
            <div class="ibox-title">
               <h5>Booking</h5>
            </div>
            <div class="ibox-content">
               <div class="row">
                  <div class="col-lg-6">
                     <ul>
                        <li>
                           <h4>Officer/Lab In-charge :- <b>{{ $equiptment_data->incharge_name }}</b></h4>
                        </li>
                        <li>
                           <h4>In-charge Email/Phone :- <b>{{ $equiptment_data->incharge_email }} ({{ $equiptment_data->incharge_phone }})</b></h4>
                        </li>
                        <li>
                           <h4>Location :- <b>{{ $equiptment_data->incharge_email }}</b></h4>
                        </li>
                        <li>
                           <h4>Status :- <b>@if($equiptment_data->status == 0) InActive @else Active @endif</b></h4>
                        </li>
                        <li>
                           <h4>Sample Requirements :- <b>{{ $equiptment_data->sample_requirements }}</b></h4>
                        </li>
                        <li>
                           <h4>Accessories :- </h4>
                           <p>{{ $equiptment_data->additional_accessories }}</p>
                        </li>
                     </ul>
                  </div>
                  <div class="col-lg-6">
                     <img onerror="this.src='https://iicbooking.iitr.ac.in/admin_asset/img/probe_lab_photo.jpg';" src="{{ url('/public/website/equipment/') }}{{ $equiptment_data->image }}" style="width: 100%">
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <h2 style="color:green; margin-top:80px; margin-bottom:50px;">
                        <center><b>New slots will open on every wednesday at 9 PM.</b></center>
                       
                     </h2>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12 text-center">
                     <table class="table table-striped table-bordered table-hover slot_list" id="slot_list" style="width:100%; text-align: center">
                     
                     <!-- old correct -->
                     
                     <!-- <thead>
                        <tr>
                            <th>Time Slot</th>
                            @php
                                $timezone = new DateTimeZone('Asia/Kolkata');
                                $currentDate = new DateTime('now', $timezone);

                            // $currentDate = "2024-09-08";
                                // Calculate the start of the week as Sunday and end of the week as Saturday
                                $currentDayOfWeek = $currentDate->format('w'); // Numeric representation of the day of the week (0 for Sunday, 6 for Saturday)
                                $startOfWeek = (clone $currentDate)->modify("-{$currentDayOfWeek} days")->format('Y-m-d');
                                $endOfWeek = (clone $currentDate)->modify("+".(6 - $currentDayOfWeek)." days")->format('Y-m-d');
                                
                                $daysOfWeek = [];
                                $currentDay = new DateTime($startOfWeek, $timezone);

                                while ($currentDay->format('Y-m-d') <= $endOfWeek) {
                                    $daysOfWeek[] = [
                                        'date' => $currentDay->format('j'), // Day of the month
                                        'day' => $currentDay->format('l'), // Full name of the day (e.g., Sunday, Monday)
                                        'fullDate' => $currentDay->format('Y-m-d') // Full date format (Y-m-d)
                                    ];
                                    $currentDay->modify('+1 day');
                                }
                            @endphp
                            @foreach ($daysOfWeek as $day)
                                <th>{{ $day['day'] }}<br>{{ $day['date'] }} {{ $currentDate->format('F') }}</th>
                            @endforeach
                        </tr>
                    </thead> -->
                     <!-- old ssdd correct -->
                

                     <thead>
    <tr>
        <th>Time Slot</th>
        @php
            $timezone = new DateTimeZone('Asia/Kolkata');
            $currentDate = new DateTime('now', $timezone);

            // Calculate the start of the week as Sunday and end of the week as Saturday
            $currentDayOfWeek = $currentDate->format('w'); // Numeric representation of the day of the week (0 for Sunday, 6 for Saturday)
            $startOfWeek = (clone $currentDate)->modify("-{$currentDayOfWeek} days")->format('Y-m-d'); // Sunday
            $endOfWeek = (clone $currentDate)->modify("+".(6 - $currentDayOfWeek)." days")->format('Y-m-d'); // Saturday

            $daysOfWeek = [];
            $currentDay = new DateTime($startOfWeek, $timezone);

            while ($currentDay->format('Y-m-d') <= $endOfWeek) {
                $daysOfWeek[] = [
                    'date' => $currentDay->format('j'), // Day of the month
                    'day' => $currentDay->format('l'), // Full name of the day (e.g., Sunday, Monday)
                    'fullDate' => $currentDay->format('Y-m-d'), // Full date format (Y-m-d)
                    'status' => $currentDay->format('w') == 0 ? 'Holiday' : 'Available' // Show 'Holiday' for Sunday, 'Available' for others
                ];
                $currentDay->modify('+1 day');
            }
        @endphp
        @foreach ($daysOfWeek as $day)
            <th>
                {{ $day['day'] }}<br>{{ $day['date'] }} {{ $currentDate->format('F') }}
            </th>
        @endforeach
    </tr>
</thead>

<tbody>
    @php
        // Define time slots
        $timeSlots = [
            '9:30 AM - 11:00 AM',
            '11:30 AM - 1:00 PM',
            '2:00 PM - 3:30 PM',
            '4:00 PM - 5:30 PM',
            '5:45 PM - 7:15 PM',
            '7:30 PM - 9:00 PM'
        ];
    @endphp
    @foreach ($timeSlots as $slot)
        <tr>
            <td class="tabheading">{{ $slot }}</td>
            @foreach ($daysOfWeek as $day)
                @php
                    $dateString = $day['fullDate'];

                    // Find the status for the current date and time slot
                    $status = $equipmentCalenders->firstWhere(function($calender) use ($dateString, $slot) {
                        return $calender->date === $dateString && $calender->timings === $slot;
                    });

                    // Check if the day is Sunday (0) for marking it as a public holiday
                    $isSunday = date('w', strtotime($dateString)) == 0;
                    $backgroundColor = '';
                    $cellClass = '';

                    // Determine background color and class based on status and day
                    if ($isSunday) {
                        $backgroundColor = 'background-color: red; color: white;';
                        $cellClass = 'booked-cell'; // Non-clickable class for Sundays
                    } elseif ($status && $status->status === 'Booked') {
                        $backgroundColor = 'background-color: blue; color: white;';
                        $cellClass = 'booked-cell'; // Non-clickable class for booked slots
                    } elseif ($status && $status->status === 'Not Available') {
                        $backgroundColor = 'background-color: green; color: white;';
                        $cellClass = 'booked-cell'; // Non-clickable class for unavailable slots
                    } elseif ($status && $status->status === 'Public Holiday') {
                        $backgroundColor = 'background-color: red; color: white;';
                        $cellClass = 'booked-cell'; // Non-clickable class for public holidays
                    } else {
                        $backgroundColor = 'background-color: yellow; color: black;';
                        $cellClass = 'available-cell'; // Clickable class for available slots
                    }
                @endphp
                <td style="{{ $backgroundColor }}" class="{{ $cellClass }}"
                    data-date="{{ $dateString }}"
                    data-slot="{{ $slot }}">
                    @if ($isSunday)
                        <div class="desp"><b>Public Holiday</b></div>
                    @else
                        @if ($status && $status->status !== 'Available')
                            {{ $status->status }}
                        @else
                            <!-- Available button triggers the modal -->
                            <button class="btn btn-primary open-modal" data-toggle="modal" data-target="#bookingModal" data-date="{{ $dateString }}" data-slot="{{ $slot }}">
                                Available
                            </button>
                        @endif
                    @endif
                </td>
            @endforeach
        </tr>
    @endforeach
</tbody>


<!-- ################################################################################ -->

























<!-- 
<tbody>
    @php
        // Define time slots
        $timeSlots = [
            '9:30 AM - 11:00 AM',
            '11:30 AM - 1:00 PM',
            '2:00 PM - 3:30 PM',
            '4:00 PM - 5:30 PM',
            '5:45 PM - 7:15 PM',
            '7:30 PM - 9:00 PM'
        ];
    @endphp
    @foreach ($timeSlots as $slot)
        <tr>
            <td class="tabheading">{{ $slot }}</td>
            @foreach ($daysOfWeek as $day)
                @php
                    $dateString = $day['fullDate'];

                    // Find the status for the current date and time slot
                    $status = $equipmentCalenders->firstWhere(function($calender) use ($dateString, $slot) {
                        return $calender->date === $dateString && $calender->timings === $slot;
                    });

                    // Check if the day is Sunday (0) for marking it as a public holiday
                    $isSunday = date('w', strtotime($dateString)) == 0;
                    $backgroundColor = '';
                    $cellClass = '';

                    // Determine background color and class based on status and day
                    if ($isSunday) {
                        $backgroundColor = 'background-color: red; color: white;';
                        $cellClass = 'booked-cell'; // Non-clickable class for Sundays
                    } elseif ($status && $status->status === 'Booked') {
                        $backgroundColor = 'background-color: blue; color: white;';
                        $cellClass = 'booked-cell'; // Non-clickable class for booked slots
                    } elseif ($status && $status->status === 'Not Available') {
                        $backgroundColor = 'background-color: green; color: white;';
                        $cellClass = 'booked-cell'; // Non-clickable class for unavailable slots
                    } elseif ($status && $status->status === 'Public Holiday') {
                        $backgroundColor = 'background-color: red; color: white;';
                        $cellClass = 'booked-cell'; // Non-clickable class for public holidays
                    } else {
                        $backgroundColor = 'background-color: yellow; color: black;';
                        $cellClass = 'available-cell'; // Clickable class for available slots
                    }
                @endphp
                <td style="{{ $backgroundColor }}" class="{{ $cellClass }}"
                    data-date="{{ $dateString }}"
                    data-slot="{{ $slot }}">
                    @if ($isSunday)
                        <div class="desp"><b>Public Holiday</b></div>
                    @else
                        {{ $status ? $status->status : 'Available' }}
                    @endif
                </td>
            @endforeach
        </tr>
    @endforeach
</tbody> -->

<!-- <tbody>
    @php
        // Define time slots
        $timeSlots = [
            '9:30 AM - 11:00 AM',
            '11:30 AM - 1:00 PM',
            '2:00 PM - 3:30 PM',
            '4:00 PM - 5:30 PM',
            '5:45 PM - 7:15 PM',
            '7:30 PM - 9:00 PM'
        ];
    @endphp
    @foreach ($timeSlots as $slot)
        <tr>
            <td style="{{ $backgroundColor }}" class="{{ $cellClass }}">{{ $slot }}</td>
            @foreach ($daysOfWeek as $day)
                <td style="{{ $day['status'] == 'Holiday' ? 'color: red;' : '' }}">
                    {{ $day['status'] }}
                </td>
            @endforeach
        </tr>
    @endforeach
</tbody> -->
            

    <!-- <tbody>
    @php
        $timeSlots = [
            '9:30AM - 11:00AM',
            '11:30AM - 1:00PM',
            '2:00PM - 3:30PM',
            '4:00PM - 5:30PM',
            '5:45PM - 7:15PM',
            '7:30PM - 9:00PM'
        ];
    @endphp

    @foreach ($timeSlots as $slot)
        <tr>
            <td class="tabheading">{{ $slot }}</td>
            @foreach ($daysOfWeek as $day)
                @php
                    $dateString = $day['fullDate'];

                    // Find the status for the current date and time slot
                    $status = $equipmentCalenders->firstWhere(function($calender) use ($dateString, $slot) {
                        return $calender->date === $dateString && $calender->timings === $slot;
                    });

                    // Check if the day is Saturday (6) or Sunday (0)
                    $isWeekend = in_array(date('w', strtotime($dateString)), [0, 6]);
                    $backgroundColor = '';
                    $cellClass = '';

                    // Determine background color based on status and day
                    if ($isWeekend) {
                        $backgroundColor = 'background-color: red; color: white;';
                    } elseif ($status && $status->status === 'Booked') {
                        $backgroundColor = 'background-color: blue; color: white;';
                        $cellClass = 'booked-cell'; // Non-clickable class
                    }elseif ($status && $status->status === 'Not Available') {
                        $backgroundColor = 'background-color: green; color: white;';
                        $cellClass = 'booked-cell'; // Non-clickable class
                    }
                    elseif ($status && $status->status === 'Public Holiday') {
                        $backgroundColor = 'background-color: red; color: white;';
                        $cellClass = 'booked-cell'; // Non-clickable class
                    }
                    
                    else {
                        $backgroundColor = 'background-color: yellow; color: black;';
                        $cellClass = 'available-cell'; // Clickable class
                    }
                @endphp
                <td style="{{ $backgroundColor }}" class="{{ $cellClass }}"
                    data-date="{{ $dateString }}"
                    data-slot="{{ $slot }}">
                    @if ($isWeekend)
                        <div class="desp"><b>Public Holiday</b></div>
                    @else
                        {{ $status ? $status->status : 'Available' }}
                    @endif
                  
                </td>
            @endforeach
        </tr>
    @endforeach
    </tbody> -->

                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- Modal -->
<div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingModalLabel">Book Slot</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="bookingForm">
                    <div class="form-group">
                        <label for="slotDate">Date:</label>
                        <input type="text" class="form-control" id="slotDate" readonly>
                    </div>
                    <div class="form-group">
                        <label for="slotTime">Time Slot:</label>
                        <input type="text" class="form-control" id="slotTime" readonly>
                    </div>
                    <!-- Additional input fields for booking details can be added here -->
                    <button type="submit" class="btn btn-success">Book Slot</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
 
        $('.available-cell').on('click', function() {
            var $this = $(this);
            var date = $this.data('date');
            var slot = $this.data('slot');

           // alert(date);

            $.ajax({
                url: '{{ route('book.slot') }}', // Use route helper
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // CSRF token for Laravel
                    date: date,
                    slot: slot
                },
                success: function(response) {
                  //  alert(response);
                    // Handle success
                    alert('Booking successful!');
                    $this.css('background-color', 'gray').removeClass('available-cell').addClass('booked-cell').text('Booked');
                },
                error: function(xhr) {
                    // Handle error
                    alert('Error occurred. Please try again.');
                }
            });
        });
    });
</script>

