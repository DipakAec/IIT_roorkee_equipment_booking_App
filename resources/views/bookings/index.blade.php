@extends('Dashboard.master')
@section('section')
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            @include('layout.navbar')
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Booking-List</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Booking List</h6>
                    </div>
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
                                                        style="width: 66.2px;"> Status </th>    

                                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Age: activate to sort column ascending"
                                                        style="width: 66.2px;">Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>

                                            @foreach ($bookings as $val)
                                                <tr class="odd">
                                                    <td class="sorting_1">{{ $val->book_id_pk }}</td>
                                                    <td>{{ $val->user_name }}</td>
                                                    <td>{{ $val->booking_date }}</td>
                                                    <td>{{ $val->booking_timings }}</td>
                                                    <!-- <td>{{ $val->status }}</td> -->
                                                    <td>
                                                        @if ($val->active_status == 0)
                                                            Processing
                                                        @else
                                                            {{ $val->active_status }}
                                                        @endif
                                                    </td>
                                                    <td>

                                                        <!-- Approve Button -->
                                                        <a class="btn btn-sm btn-success approve-btn" data-id="{{ $val->book_id_pk }}">Approve</a>

                                                        <!-- Cancel Button -->
                                                        <a class="btn btn-sm btn-danger cancel-btn" data-id="{{ $val->book_id_pk }}">Cancel</a>
                                                    </td>
                                                   
                                                </tr>
                                                @endforeach
                                           

                                            </tbody>
                                        </table>
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
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; Your Website 2021</span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Handle Approve button click
    $('.approve-btn').click(function() {
        let bookingId = $(this).data('id');

        alert(bookingId);
        updateBookingStatus(bookingId, 'approved');
    });

    // Handle Cancel button click
    $('.cancel-btn').click(function() {
        let bookingId = $(this).data('id');
        updateBookingStatus(bookingId, 'canceled');
    });

    // Function to update booking status via AJAX
    function updateBookingStatus(bookingId, status) {
        $.ajax({
            url: '{{ route("booking.update.status") }}', // Ensure this route exists
            type: 'POST',
            data: {
                _token: '{{ csrf_token() }}', // CSRF token for security
                id: bookingId,
                status: status
            },
            success: function(response) {

                alert(response.message); 
                location.reload();
                // if (response.success) {
                //     alert(response.message); // Show success message
                //     location.reload(); // Reload the page to reflect changes
                // } else {
                //     alert('Failed to update booking status.');
                // }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', error); // Log error in the console for debugging
                alert('An error occurred: ' + xhr.responseText); // Show error message
            }
        });
    }
});
</script>
