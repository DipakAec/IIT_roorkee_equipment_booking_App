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
                <h1 class="h3 mb-2 text-gray-800">Recharge-add</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Add Recharge</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                <div class="row">
                                    <div class="col-12 col-md-10">
                                        <form action="{{ route('recharge.store') }}" method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label for="user_id">Select User</label>
                                                <select name="user_id" id="user_id" class="form-control" required>
                                                    <option value="">-- Select User --</option>
                                                    @foreach ($users as $user)
                                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                    
                                            <div class="form-group">
                                                <label for="amount">Amount</label>
                                                <input type="text" name="amount" id="amount" class="form-control" required>
                                                <div id="error-message" style="color: red; display: none;"></div>
                                            </div>
                    
                                            <div class="form-group">
                                                <label for="remark">Remark</label>
                                                <textarea name="remark" id="remark" class="form-control" rows="3"></textarea>
                                            </div>
                    
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                </div>
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
        $('#amount').on('input', function() {
            var value = $(this).val();
            var errorMessage = $('#error-message');

            // Remove non-numeric characters
            var numericValue = value.replace(/[^0-9]/g, '');
            $(this).val(numericValue); // Update input field with numeric value

            // Check if the input is valid
            if (numericValue === '') {
                errorMessage.text('Please enter a valid number.').show();
            } else {
                errorMessage.hide();
            }
        });
    });
</script>