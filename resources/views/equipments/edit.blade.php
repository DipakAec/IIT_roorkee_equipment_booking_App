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
                <h1 class="h3 mb-2 text-gray-800">Equipments</h1>
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Equipments List</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row mb-5">
                                    <form action="{{ route('equipments.update', $equipment->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        @include('equipments.form')
                                        <button type="submit" class="btn btn-primary">Update Equipment</button>
                                    </form>
                                </div>
                            </div>
                            @include('equipments.calender_form')
                            <div id="table-content">
                                <table class="table table-bordered dataTable calenderTable" width="100%" cellspacing="0"
                                    role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending">
                                                Date</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending">
                                                Day</th>
                                            <th class="sorting sorting_asc" tabindex="0" aria-controls="dataTable"
                                                rowspan="1" colspan="1" aria-sort="ascending"
                                                aria-label="Name: activate to sort column descending">
                                                Timings</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Position: activate to sort column ascending">
                                                Status</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1"
                                                colspan="1" aria-label="Age: activate to sort column ascending">Action
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <p></p>
                                        @isset($equipment->records)
                                            @forelse ($equipment->records as $record)
                                                <tr class="odd">
                                                    <td class="sorting_1">{{ $record->date }}</td>
                                                    <td>{{ $record->day }}</td>
                                                    <td>{{ $record->timings }}</td>
                                                    <td>{{ $record->status }}</td>
                                                    <td><a href="#" class="delete-record"
                                                            data-id="{{ $record->id }}">Delete</a></td>
                                                </tr>
                                            @empty
                                            No Calender Added!
                                            @endforelse
                                        @endisset
                                    </tbody>
                                </table>
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
@push('js')
    <script>
        $(document).ready(function() {
            var today = new Date().toISOString().split('T')[0];
            $('#datePicker').attr('min', today);
            $('#incharge_phone').on('input', function() {
                this.value = this.value.replace(/[^0-9]/g, '');
            });
            $('#AddContent').click(function(event) {
                event.preventDefault(); // Prevent the default action
                var day = $('#day').val();
                var timings = $('#timings').val();
                var date = $('#datePicker').val();
                var equipment_id = {{ $equipment->id }};
                var isValid = true;
                var holiday_name = $('#holiday_name').val();


                $('.day-error').text('');
                if (day === "" || day === null) {
                    $('.day-error').text('Please select a day.');
                    isValid = false;
                }
                $('.timings-error').text('');
                if (timings === "" || timings === null) {
                    $('.timings-error').text('Please select a Timing.');
                    isValid = false;
                }
                $('.date-error').text('');
                if (date === "" || date === null) {
                    $('.date-error').text('Please choose a Date.');
                    isValid = false;
                }
                var status = $('#status_calender').val();
                $('.status-error').text('');
                if (status === "" || status === null) {
                    $('.status-error').text('Please select a status.');
                    isValid = false;
                }
                if (isValid) {
                    $.ajax({
                        url: '{{ route('add_calender') }}', // Replace with your route
                        type: 'POST',
                        data: {
                            status: status,
                            equipment_id: equipment_id,
                            day: day,
                            date: date,
                            timings: timings,
                            holiday_name:holiday_name,
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(response) {
                            $('#table-content').load(window.location.href +
                                ' #table-content > *');
                        },
                        error: function(response) {
                            alert('Error occurred while submitting the form');
                        }
                    });
                }
            });
            // Handle deletion of records
            $(document).on('click', '.delete-record', function(event) {
                event.preventDefault();
                var deleteButton = $(this);
                deleteButton.prop('disabled', true);
                var recordId = deleteButton.data('id');
                $.ajax({
                    url: '{{ url('calender/delete') }}/' + recordId,
                    type: 'GET',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        $('#table-content').load(window.location.href + ' #table-content > *');
                        deleteButton.prop('disabled', false);
                    },
                    error: function(response) {
                        alert('Error occurred while deleting the record');
                        deleteButton.prop('disabled', false);
                    }
                });
            });


        });
    </script>
@endpush
