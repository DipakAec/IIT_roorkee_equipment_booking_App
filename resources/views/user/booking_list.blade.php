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
               <h5>Booking List</h5>
            </div>
             <!-- DataTales Example -->
             <div class="card shadow mb-4">
                  
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <!-- <a class="mb-4 btn btn-primary" href="{{ route('users.create') }}">Booking User</a> -->
                                        <table class="table table-bordered dataTable" id="dataTable" width="100%"
                                            cellspacing="0" user="grid" aria-describedby="dataTable_info"
                                            style="width: 100%;">
                                            <thead>
                                                <tr user="row">
                                                    <th class="sorting sorting_asc" tabindex="0"
                                                        aria-controls="dataTable" rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Name: activate to sort column descending"
                                                        style="width: 195.2px;">ID</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 296.2px;">User Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 296.2px;">Day Name</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Position: activate to sort column ascending"
                                                        style="width: 296.2px;">Booking Date</th>
                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Office: activate to sort column ascending"
                                                        style="width: 141.2px;">Booking Timings</th>
                                                    <!-- <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Age: activate to sort column ascending"
                                                        style="width: 66.2px;">status</th> -->

                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Age: activate to sort column ascending"
                                                        style="width: 66.2px;">Gold Status </th>    

                                                     <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Age: activate to sort column ascending"
                                                        style="width: 66.2px;">Active Status</th> 
                                                </tr>
                                            </thead>

                                            <tbody>

                                            @foreach ($bookings as $val)
                                                <tr class="odd">
                                                    <td class="sorting_1">{{ $val->book_id_pk }}</td>
                                                    <td>{{ $val->user_name }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($val->booking_date)->format('l') }}</td>
                                                    <td>{{ $val->booking_date }}</td>
                                                    <td>{{ $val->booking_timings }}</td>
                                                    <!-- <td>{{ $val->status }}</td> -->
                                                    <td>
                                                    @if ($val->gold_status == 1)
                                                        YES
                                                    @elseif ($val->gold_status == '')
                                                        NULL
                                                    @else
                                                        No
                                                    @endif
                                                    </td>


                                                    <td>
                                                    @if ($val->active_status == "approved")
                                                        
                                                         Approved
                                                    @else
                                                        Processing
                                                    @endif

                                                    </td>
                                                    <!-- <td>

                                                        
                                                        <a class="btn btn-sm btn-success approve-btn" data-id="{{ $val->book_id_pk }}">Approve</a>

                                                        
                                                        <a class="btn btn-sm btn-danger cancel-btn" data-id="{{ $val->book_id_pk }}">Cancel</a>
                                                    </td> -->
                                                   
                                                </tr>
                                                @endforeach
                                           

                                            </tbody>
                                        </table>

                                        <!-- Pagination links -->

                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-sm-12 col-md-5">
                                        <div class="dataTables_info" id="dataTable_info" user="status"
                                            aria-live="polite">Showing 1 to 10 of 57 entries</div>
                                    </div>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                                            <ul class="pagination">
                                                <li class="paginate_button page-item previous disabled"
                                                    id="dataTable_previous"><a href="#" aria-controls="dataTable"
                                                        data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                                                </li>
                                                <li class="paginate_button page-item active"><a href="#"
                                                        aria-controls="dataTable" data-dt-idx="1" tabindex="0"
                                                        class="page-link">1</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="dataTable" data-dt-idx="2" tabindex="0"
                                                        class="page-link">2</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="dataTable" data-dt-idx="3" tabindex="0"
                                                        class="page-link">3</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="dataTable" data-dt-idx="4" tabindex="0"
                                                        class="page-link">4</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="dataTable" data-dt-idx="5" tabindex="0"
                                                        class="page-link">5</a></li>
                                                <li class="paginate_button page-item "><a href="#"
                                                        aria-controls="dataTable" data-dt-idx="6" tabindex="0"
                                                        class="page-link">6</a></li>
                                                <li class="paginate_button page-item next" id="dataTable_next"><a
                                                        href="#" aria-controls="dataTable" data-dt-idx="7"
                                                        tabindex="0" class="page-link">Next</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
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

            // Set modal content with selected date and slot
            var date = selectedCell.data('date');
            var slot = selectedCell.data('slot');
            $('#modalDate').text(date);
            $('#modalSlot').text(slot);

            // Show the modal
            $('#bookingModal').modal('show');
        });

        // Handle booking confirmation on "Yes" button click
        $('#confirmBooking').on('click', function() {
            var date = $('#modalDate').text();
            var slot = $('#modalSlot').text();

            $.ajax({
                url: '{{ route('book.slot') }}', // Use route helper for Laravel route
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}', // CSRF token for Laravel
                    date: date,
                    slot: slot
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



