@extends('user.master')
@section('section')
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <!-- End of Topbar -->
            <div class="wrapper wrapper-content">
                <!-- Preloader Spinner -->
                <div id="preloader" class="d-flex justify-content-center align-items-center"
                    style="display:none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); z-index: 9999;">
                    <div class="spinner-border" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>


                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox ">
                            <div class="ibox-title">
                                <h5>Booking</h5>
                            </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <ul class="list-unstyled">
                                            <li class="mb-2">
                                                <h5 class="mb-1"><strong>Officer/Lab In-charge:</strong></h5>
                                                <p class="text-muted">{{ $equiptment_data->incharge_name }}</p>
                                            </li>
                                            <li class="mb-2">
                                                <h5 class="mb-1"><strong>In-charge Email/Phone:</strong></h5>
                                                <p class="text-muted">{{ $equiptment_data->incharge_email }}
                                                    ({{ $equiptment_data->incharge_phone }})</p>
                                            </li>
                                            <li class="mb-2">
                                                <h5 class="mb-1"><strong>Location:</strong></h5>
                                                <p class="text-muted">{{ $equiptment_data->incharge_email }}</p>
                                            </li>
                                            <li class="mb-2">
                                                <h5 class="mb-1"><strong>Status:</strong></h5>
                                                <p class="text-muted">
                                                    @if ($equiptment_data->status == 0)
                                                        Inactive
                                                    @else
                                                        Active
                                                    @endif
                                                </p>
                                            </li>
                                            <li class="mb-2">
                                                <h5 class="mb-1"><strong>Sample Requirements:</strong></h5>
                                                <p class="text-muted">{{ $equiptment_data->sample_requirements }}</p>
                                            </li>
                                            <li class="mb-2">
                                                <h5 class="mb-1"><strong>Accessories:</strong></h5>
                                                <p class="text-muted">{{ $equiptment_data->additional_accessories }}</p>
                                            </li>
                                            <li class="mb-2">
                                                <h5 class="mb-1"><strong>Instrument Type:</strong></h5>
                                                <div class="form-group">
                                                    <select class="form-control" id="instrument_type" name="instrument_type"
                                                        required>
                                                        <option value="">Select</option>
                                                        <option value="1">Without coating</option>
                                                        <option value="2">With coating</option>
                                                        <option value="3">EBSD</option>
                                                    </select>
                                                </div>
                                            </li>
                                            <input type="hidden" id="account_balance" value="{{ $user->amount }}">
                                            <!-- Hidden inputs for user's institute_type and department -->
                                            <input type="hidden" id="institute_type" value="{{ $user->institute_type }}">
                                            <input type="hidden" id="department" value="{{ $user->department }}">
                                            <input type="text" id="caculated_price" style="display: none">
                                            <!-- Display calculated price here -->
                                            <div id="price_display">
                                                <p><strong>Price:</strong> <span id="price_value">Select instrument type to
                                                        view price</p>
                                            </div>

                                        </ul>
                                    </div>

                                    <div class="col-lg-6">
                                        <img onerror="this.src='https://iicbooking.iitr.ac.in/admin_asset/img/probe_lab_photo.jpg';"
                                            src="{{ url('/public/website/equipment/') }}{{ $equiptment_data->image }}"
                                            style="width: 100%">
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
                                        <table class="table table-striped table-bordered table-hover slot_list"
                                            id="slot_list" style="width:100%; text-align: center">
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
                                        $startOfWeek = (clone $currentDate)
                                            ->modify("-{$currentDayOfWeek} days")
                                            ->format('Y-m-d');
                                        $endOfWeek = (clone $currentDate)
                                            ->modify('+' . (6 - $currentDayOfWeek) . ' days')
                                            ->format('Y-m-d');

                                        $daysOfWeek = [];
                                        $currentDay = new DateTime($startOfWeek, $timezone);

                                        while ($currentDay->format('Y-m-d') <= $endOfWeek) {
                                            $daysOfWeek[] = [
                                                'date' => $currentDay->format('j'), // Day of the month
                                                'day' => $currentDay->format('l'), // Full name of the day (e.g., Sunday, Monday)
                                                'fullDate' => $currentDay->format('Y-m-d'), // Full date format (Y-m-d)
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
                                                $startOfWeek = (clone $currentDate)
                                                    ->modify("-{$currentDayOfWeek} days")
                                                    ->format('Y-m-d'); // Sunday
                                                $endOfWeek = (clone $currentDate)
                                                    ->modify('+' . (6 - $currentDayOfWeek) . ' days')
                                                    ->format('Y-m-d'); // Saturday

                                                $daysOfWeek = [];
                                                $currentDay = new DateTime($startOfWeek, $timezone);

                                                while ($currentDay->format('Y-m-d') <= $endOfWeek) {
                                                    $daysOfWeek[] = [
                                                        'date' => $currentDay->format('j'), // Day of the month
                                                        'day' => $currentDay->format('l'), // Full name of the day (e.g., Sunday, Monday)
                                                        'fullDate' => $currentDay->format('Y-m-d'), // Full date format (Y-m-d)
                                                        'status' =>
                                                            $currentDay->format('w') == 0 ? 'Holiday' : 'Available', // Show 'Holiday' for Sunday, 'Available' for others
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
                                                '7:30 PM - 9:00 PM',
                                            ];
                                        @endphp
                                        @foreach ($timeSlots as $slot)
    <tr>
                                                <td class="tabheading">{{ $slot }}</td>
                                                @foreach ($daysOfWeek as $day)
    @php
        $dateString = $day['fullDate'];

        // Find the status for the current date and time slot
        $status = $equipmentCalenders->firstWhere(function ($calendar) use ($dateString, $slot) {
            return $calendar->date === $dateString && $calendar->timings === $slot;
        });

        // Find booking status for the current date and slot
        $bookingStatus = $booked_data->firstWhere(function ($booking) use ($dateString, $slot) {
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
                                                        $startOfWeek = (clone $currentDate)
                                                            ->modify("-{$currentDayOfWeek} days")
                                                            ->format('Y-m-d');
                                                        $endOfWeek = (clone $currentDate)
                                                            ->modify('+' . (6 - $currentDayOfWeek) . ' days')
                                                            ->format('Y-m-d');

                                                        $daysOfWeek = [];
                                                        $currentDay = new DateTime($startOfWeek, $timezone);

                                                        while ($currentDay->format('Y-m-d') <= $endOfWeek) {
                                                            $daysOfWeek[] = [
                                                                'date' => $currentDay->format('j'),
                                                                'day' => $currentDay->format('l'),
                                                                'fullDate' => $currentDay->format('Y-m-d'),
                                                                'status' =>
                                                                    $currentDay->format('w') == 0
                                                                        ? 'Holiday'
                                                                        : 'Available',
                                                            ];
                                                            $currentDay->modify('+1 day');
                                                        }
                                                    @endphp
                                                    @foreach ($daysOfWeek as $day)
                                                        <th>
                                                            {{ $day['day'] }}<br>{{ $day['date'] }}
                                                            {{ $currentDate->format('F') }}
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
                                            '7:30 PM - 9:00 PM',
                                        ];
                                    @endphp
                                    @foreach ($timeSlots as $slot)
    <tr>
                                            <td class="tabheading">{{ $slot }}</td>
                                            @foreach ($daysOfWeek as $day)
    @php
        $dateString = $day['fullDate'];

        // Find the status from equipment_calenders for the current date and time slot
        $equipmentStatus = $equipmentCalenders->firstWhere(function ($calendar) use ($dateString, $slot) {
            return $calendar->date === $dateString && $calendar->timings === $slot;
        });

        // Find booking status for the current date and slot
        $bookingStatus = $booked_data->firstWhere(function ($booking) use ($dateString, $slot) {
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
                                                        '7:30 PM - 9:00 PM',
                                                    ];
                                                @endphp
                                                @foreach ($timeSlots as $slot)
                                                    <tr>
                                                        <td class="tabheading">{{ $slot }}</td>
                                                        @foreach ($daysOfWeek as $day)
                                                            @php
                                                                $dateString = $day['fullDate'];

                                                                // Find the status from equipment_calenders for the current date and time slot
                                                                $equipmentStatus = $equipmentCalenders->firstWhere(
                                                                    function ($calendar) use ($dateString, $slot) {
                                                                        return $calendar->date === $dateString &&
                                                                            $calendar->timings === $slot;
                                                                    },
                                                                );

                                                                // Find booking status for the current date and slot
                                                                $bookingStatus = $booked_data->firstWhere(function (
                                                                    $booking,
                                                                ) use ($dateString, $slot) {
                                                                    return $booking->booking_date === $dateString &&
                                                                        $booking->booking_timings === $slot;
                                                                });

                                                                // Determine background color and class based on status
                                                                $backgroundColor = '';
                                                                $cellClass = '';
                                                                $displayStatus = '';

                                                                // Handle Sunday separately
                                                                if ($day['status'] === 'Holiday') {
                                                                    $backgroundColor =
                                                                        'background-color: red; color: white;';
                                                                    $cellClass = 'booked-cell';
                                                                    $displayStatus = 'Public Holiday';
                                                                } elseif ($bookingStatus) {
                                                                    // Booking status overrides other statuses
                                                                    $backgroundColor =
                                                                        'background-color: blue; color: white;';
                                                                    $cellClass = 'booked-cell';
                                                                    $displayStatus = 'Booked';
                                                                } elseif ($equipmentStatus) {
                                                                    // Equipment calendar status
                                                                    if ($equipmentStatus->status === 'Not Available') {
                                                                        $backgroundColor =
                                                                            'background-color: green; color: white;';
                                                                        $cellClass = 'booked-cell';
                                                                        $displayStatus = 'Not Available';
                                                                    } elseif (
                                                                        $equipmentStatus->status === 'Public Holiday'
                                                                    ) {
                                                                        $backgroundColor =
                                                                            'background-color: red; color: white;';
                                                                        $cellClass = 'booked-cell';
                                                                        $displayStatus = 'Public Holiday';
                                                                    } else {
                                                                        $backgroundColor =
                                                                            'background-color: yellow; color: black;';
                                                                        $cellClass = 'available-cell';
                                                                        $displayStatus = $equipmentStatus->status;
                                                                    }
                                                                } else {
                                                                    // Default status if no equipment or booking status is found
                                                                    $backgroundColor =
                                                                        'background-color: yellow; color: black;';
                                                                    $cellClass = 'available-cell';
                                                                    $displayStatus = 'Available';
                                                                }
                                                            @endphp
                                                            <td style="{{ $backgroundColor }}" class="{{ $cellClass }}"
                                                                data-date="{{ $dateString }}"
                                                                data-slot="{{ $slot }}">
                                                                @if ($day['status'] === 'Holiday' || ($equipmentStatus && $equipmentStatus->status === 'Public Holiday'))
                                                                    <div class="desp"><b>{{ $displayStatus }}</b></div>
                                                                    @if ($equipmentStatus && $equipmentStatus->status === 'Public Holiday')
                                                                        <!-- Display the holiday name if it exists -->
                                                                        <div class="holiday-name">
                                                                            {{ $equipmentStatus->holiday_name }}</div>
                                                                    @endif
                                                                @else
                                                                    @if ($bookingStatus && $bookingStatus->status === 'Available')
                                                                        <!-- Button to trigger modal -->
                                                                        <button class="btn btn-success open-modal"
                                                                            data-toggle="modal"
                                                                            data-target="#bookingModal"
                                                                            data-date="{{ $dateString }}"
                                                                            data-slot="{{ $slot }}">
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
            <div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="bookingModalLabel"
                aria-hidden="true">
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

                    // Get the current value of the dropdown
                    var instrumentType = $('#instrument_type').val(); // Get the selected value

                    // Check if the instrument type dropdown is selected
                    if (instrumentType === '') {
                        // If no selection, show an alert
                        alert('Please select an instrument type.');
                        return; // Prevent further code execution to open the modal
                    }



                    // Set modal content with selected date and slot
                    var date = selectedCell.data('date');
                    var slot = selectedCell.data('slot');
                    $('#modalDate').text(date);
                    $('#modalSlot').text(slot);

                    // Show the modal
                    $('#bookingModal').modal('show');
                });



                // Handle booking confirmation on "Yes" button click booking on 18th dec

                $('#confirmBooking').on('click', function() {

                    var date = $('#modalDate').text();
                    var slot = $('#modalSlot').text();
                    var modalgoldSelect = $('#modalgoldSelect').val();
                    var goldSelect = $('#goldSelect').val(); // Get the selected value

                    // Get the price and account balance values
                    var caculated_price = parseFloat($('#caculated_price')
                        .val()); // Assuming the price is stored in an input or element with id 'price_value'
                    var account_balance = parseFloat($('#account_balance')
                        .val()
                        ); // Assuming the account balance is stored in an input or element with id 'account_balance'
                    // Check if the price_value is greater than the account_balance
                    if (caculated_price > account_balance) {
                        alert('Insufficient balance.');
                        return; // Exit the function, do not proceed to AJAX request
                    } else {
                        // Show preloader before making the AJAX call
                        $('#preloader')
                            .show(); // Assuming there's an element with id 'preloader' for showing the loader

                        $.ajax({
                            url: '{{ route('book.slot') }}', // Use route helper for Laravel route
                            type: 'POST',
                            data: {
                                _token: '{{ csrf_token() }}', // CSRF token for Laravel
                                date: date,
                                slot: slot,
                                caculated_price: caculated_price
                            },
                            success: function(response) {
                                // Hide preloader when request is complete
                                $('#preloader').hide();

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
                                // Hide preloader when request is complete
                                $('#preloader').hide();

                                // Handle error
                                alert('Error occurred. Please try again.');
                            }
                        });
                    }
                });


                // End Handle booking confirmation


            });
        </script>
        {{-- new price calculation --}}
        <script>
            $(document).ready(function() {
                // Event listener for changes to the instrument type dropdown
                $('#instrument_type').change(function() {
                    var instrumentType = $(this).val(); // Get the selected instrument type
                    var instituteType = $('#institute_type').val(); // Get the user's institute type
                    var department = $('#department').val(); // Get the user's department

                    var price = 0;

                    // Calculate price based on selected instrument type, institute type, and department
                    if (instituteType === 'IIT') {
                        if (department === 'Mechanical and Industrial Engineering') {
                            // Prices for IIT and Mechanical and Industrial Engineering department
                            if (instrumentType == 1) {
                                price = 100; // Without coating
                            } else if (instrumentType == 2) {
                                price = 125; // With coating
                            } else if (instrumentType == 3) {
                                price = 150; // EBSD
                            }
                        } else if (department != 'Mechanical and Industrial Engineering') {
                            // Prices for IIT and other departments
                            if (instrumentType == 1) {
                                price = 150; // Without coating
                            } else if (instrumentType == 2) {
                                price = 175; // With coating
                            } else if (instrumentType == 3) {
                                price = 225; // EBSD
                            }
                        }
                    } else {
                        // Prices for non-IIT institutes
                        if (instrumentType == 1) {
                            price = 500; // Without coating
                        } else if (instrumentType == 2) {
                            price = 650; // With coating
                        } else if (instrumentType == 3) {
                            price = 1000; // EBSD
                        }
                    }

                    // Display the calculated price
                    if (price > 0) {
                        $('#price_value').text("Rs. " + price + "/- for a slot");
                        $('#caculated_price').val(price);
                    } else {
                        $('#price_value').text("Please select an instrument type to view the price.");
                    }
                });
            });
        </script>
