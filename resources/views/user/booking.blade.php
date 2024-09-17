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

                        <li>
                        
                        <label for="goldSelect" class="form-label "><b>Gold  Option:</b></label>
                        <select id="goldSelect" name="gold_status" class="form-select " style="max-width: 200px; margin: 0 auto;">
                            <!-- <option value="" disabled selected>Select </option> -->
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                           
                        </select>
                   
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

                <!-- Dropdown for Gold -->
               
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
                           <!-- ###################################??/??>? --> 
                            <!-- <thead>
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
                                                $status = $equipmentCalenders->firstWhere(function($calendar) use ($dateString, $slot) {
                                                    return $calendar->date === $dateString && $calendar->timings === $slot;
                                                });

                                                // Find booking status for the current date and slot
                                                $bookingStatus = $booked_data->firstWhere(function($booking) use ($dateString, $slot) {
                                                    return $booking->booking_date === $dateString && $booking->booking_timings === $slot;
                                                });

                                                // Check if the day is Sunday (0) for marking it as a public holiday
                                                $isSunday = date('w', strtotime($dateString)) == 0;

                                                $backgroundColor = '';
                                                $cellClass = '';

                                                // Determine background color and class based on status and day
                                                if ($isSunday) {
                                                    $backgroundColor = 'background-color: red; color: white;';
                                                    $cellClass = 'booked-cell'; // Non-clickable class for Sundays
                                                } elseif ($bookingStatus && $bookingStatus->status === 'Booked') {
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
                                                    @if ($bookingStatus && $bookingStatus->status === 'Available')
                                                        
                                                        <button class="btn btn-success open-modal" data-toggle="modal" data-target="#bookingModal"
                                                            data-date="{{ $dateString }}" data-slot="{{ $slot }}">
                                                            Available
                                                        </button>
                                                    @else
                                                        {{ $bookingStatus ? $bookingStatus->status : 'Available' }}
                                                    @endif
                                                @endif
                                            </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>     -->



 

                        <thead>
                            <tr>
                                <th>Time Slot</th>
                                @php
                                    $timezone = new DateTimeZone('Asia/Kolkata');
                                    $currentDate = new DateTime('now', $timezone);

                                    // Calculate the start and end of the week
                                    $currentDayOfWeek = $currentDate->format('w');
                                    $startOfWeek = (clone $currentDate)->modify("-{$currentDayOfWeek} days")->format('Y-m-d');
                                    $endOfWeek = (clone $currentDate)->modify("+".(6 - $currentDayOfWeek)." days")->format('Y-m-d');

                                    $daysOfWeek = [];
                                    $currentDay = new DateTime($startOfWeek, $timezone);

                                    while ($currentDay->format('Y-m-d') <= $endOfWeek) {
                                        $daysOfWeek[] = [
                                            'date' => $currentDay->format('j'),
                                            'day' => $currentDay->format('l'),
                                            'fullDate' => $currentDay->format('Y-m-d'),
                                            'status' => $currentDay->format('w') == 0 ? 'Holiday' : 'Available'
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

                        
                        <!-- <tbody>
                            @php
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

                                            // Find the status from equipment_calenders for the current date and time slot
                                            $equipmentStatus = $equipmentCalenders->firstWhere(function($calendar) use ($dateString, $slot) {
                                                return $calendar->date === $dateString && $calendar->timings === $slot;
                                            });

                                            // Find booking status for the current date and slot
                                            $bookingStatus = $booked_data->firstWhere(function($booking) use ($dateString, $slot) {
                                                return $booking->booking_date === $dateString && $booking->booking_timings === $slot;
                                            });

                                            // Determine background color and class based on status
                                            $backgroundColor = '';
                                            $cellClass = '';
                                            $displayStatus = '';

                                            // Handle Sunday separately
                                            if ($day['status'] === 'Holiday') {
                                                $backgroundColor = 'background-color: red; color: white;';
                                                $cellClass = 'booked-cell';
                                                $displayStatus = 'Public Holiday';
                                            } elseif ($bookingStatus) {
                                                // Booking status overrides other statuses
                                                $backgroundColor = 'background-color: blue; color: white;';
                                                $cellClass = 'booked-cell';
                                                $displayStatus = 'Booked';
                                            } elseif ($equipmentStatus) {
                                                // Equipment calendar status
                                                if ($equipmentStatus->status === 'Not Available') {
                                                    $backgroundColor = 'background-color: green; color: white;';
                                                    $cellClass = 'booked-cell';
                                                    $displayStatus = 'Not Available';
                                                } elseif ($equipmentStatus->status === 'Public Holiday') {
                                                    $backgroundColor = 'background-color: red; color: white;';
                                                    $cellClass = 'booked-cell';
                                                    $displayStatus = 'Public Holiday';
                                                } else {
                                                    $backgroundColor = 'background-color: yellow; color: black;';
                                                    $cellClass = 'available-cell';
                                                    $displayStatus = $equipmentStatus->status;
                                                }
                                            } else {
                                                // Default status if no equipment or booking status is found
                                                $backgroundColor = 'background-color: yellow; color: black;';
                                                $cellClass = 'available-cell';
                                                $displayStatus = 'Available';
                                            }
                                        @endphp
                                        <td style="{{ $backgroundColor }}" class="{{ $cellClass }}"
                                            data-date="{{ $dateString }}"
                                            data-slot="{{ $slot }}">
                                            @if ($day['status'] === 'Holiday')
                                                <div class="desp"><b>{{ $displayStatus }}</b></div>
                                            @else
                                                @if ($bookingStatus && $bookingStatus->status === 'Available')
                                                    
                                                    <button class="btn btn-success open-modal" data-toggle="modal" data-target="#bookingModal"
                                                        data-date="{{ $dateString }}" data-slot="{{ $slot }}">
                                                        Available
                                                    </button>
                                                @else
                                                    {{ $displayStatus }}
                                                @endif
                                            @endif
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody> -->

                        <tbody>
    @php
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

                    // Find the status from equipment_calenders for the current date and time slot
                    $equipmentStatus = $equipmentCalenders->firstWhere(function($calendar) use ($dateString, $slot) {
                        return $calendar->date === $dateString && $calendar->timings === $slot;
                    });

                    // Find booking status for the current date and slot
                    $bookingStatus = $booked_data->firstWhere(function($booking) use ($dateString, $slot) {
                        return $booking->booking_date === $dateString && $booking->booking_timings === $slot;
                    });

                    // Determine background color and class based on status
                    $backgroundColor = '';
                    $cellClass = '';
                    $displayStatus = '';

                    // Handle Sunday separately
                    if ($day['status'] === 'Holiday') {
                        $backgroundColor = 'background-color: red; color: white;';
                        $cellClass = 'booked-cell';
                        $displayStatus = 'Public Holiday';
                    } elseif ($bookingStatus) {
                        // Booking status overrides other statuses
                        $backgroundColor = 'background-color: blue; color: white;';
                        $cellClass = 'booked-cell';
                        $displayStatus = 'Booked';
                    } elseif ($equipmentStatus) {
                        // Equipment calendar status
                        if ($equipmentStatus->status === 'Not Available') {
                            $backgroundColor = 'background-color: green; color: white;';
                            $cellClass = 'booked-cell';
                            $displayStatus = 'Not Available';
                        } elseif ($equipmentStatus->status === 'Public Holiday') {
                            $backgroundColor = 'background-color: red; color: white;';
                            $cellClass = 'booked-cell';
                            $displayStatus = 'Public Holiday';
                        } else {
                            $backgroundColor = 'background-color: yellow; color: black;';
                            $cellClass = 'available-cell';
                            $displayStatus = $equipmentStatus->status;
                        }
                    } else {
                        // Default status if no equipment or booking status is found
                        $backgroundColor = 'background-color: yellow; color: black;';
                        $cellClass = 'available-cell';
                        $displayStatus = 'Available';
                    }
                @endphp
                <td style="{{ $backgroundColor }}" class="{{ $cellClass }}"
                    data-date="{{ $dateString }}"
                    data-slot="{{ $slot }}">
                    @if ($day['status'] === 'Holiday' || ($equipmentStatus && $equipmentStatus->status === 'Public Holiday'))
                        <div class="desp"><b>{{ $displayStatus }}</b></div>
                        @if($equipmentStatus && $equipmentStatus->status === 'Public Holiday')
                            <!-- Display the holiday name if it exists -->
                            <div class="holiday-name">{{ $equipmentStatus->holiday_name }}</div>
                        @endif
                    @else
                        @if ($bookingStatus && $bookingStatus->status === 'Available')
                            <!-- Button to trigger modal -->
                            <button class="btn btn-success open-modal" data-toggle="modal" data-target="#bookingModal"
                                data-date="{{ $dateString }}" data-slot="{{ $slot }}">
                                Available
                            </button>
                        @else
                            {{ $displayStatus }}
                        @endif
                    @endif
                </td>
            @endforeach
        </tr>
    @endforeach
</tbody>
       











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
                <h5 class="modal-title" id="bookingModalLabel">Confirm Booking</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to book this slot?</p>
                <p><strong>Date:</strong> <span id="modalDate"></span></p>
                <p><strong>Time Slot:</strong> <span id="modalSlot"></span></p>
                
                <input type="hidden" id="modalgoldSelect">
                <button type="button" class="btn btn-success" id="confirmBooking">Yes, Book it</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
       
        var selectedCell; // Variable to hold the selected cell element

        $('.available-cell').on('click', function() {
            // Store the selected cell element
            selectedCell = $(this);

            
             // Directly get the current value of the dropdown
            var goldSelect = $('#goldSelect').val(); // Get the selected value
            // alert('Current dropdown value: ' + goldSelect); // Display the current selected values
            // alert(goldSelect);
            // exit;
            // Set modal content with selected date and slot
            var date = selectedCell.data('date');
            var slot = selectedCell.data('slot');
            $('#modalDate').text(date);
            $('#modalSlot').text(slot);
            $('#modalgoldSelect').val(goldSelect);
            // Show the modal
            $('#bookingModal').modal('show');
        });

        // Handle booking confirmation on "Yes" button click
        $('#confirmBooking').on('click', function() {

            var date = $('#modalDate').text();
            var slot = $('#modalSlot').text();
            var modalgoldSelect = $('#modalgoldSelect').val();
          
            var goldSelect = $('#goldSelect').val(); // Get the selected value
            $.ajax({
                url: '{{ route('book.slot') }}', // Use route helper for Laravel route
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // CSRF token for Laravel
                    date: date,
                    slot: slot,
                    goldSelect:modalgoldSelect
                },
                success: function(response) {
                    // Handle success
                    alert('Booking successful!');
                    // Update the cell to show it is booked
                    selectedCell.css('background-color', 'gray')
                        .removeClass('available-cell')
                        .addClass('booked-cell')
                        .text('Booked');
                    
                    // Close the modal
                    $('#bookingModal').modal('hide');
                },
                error: function(xhr) {
                    // Handle error
                    alert('Error occurred. Please try again.');
                }
            });
        });
    });
</script>



