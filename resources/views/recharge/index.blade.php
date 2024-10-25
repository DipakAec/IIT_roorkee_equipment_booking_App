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
                <h1 class="h3 mb-2 text-gray-800">Recharge-List</h1>

                <!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Recharge List</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <a class="mb-4 btn btn-primary" href="{{ route('recharge.add') }}">Recharge User</a> 

                        <!-- Success Message -->
                        @if(session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table table-bordered dataTable" id="dataTable" width="100%"
                            cellspacing="0" user="grid" aria-describedby="dataTable_info"
                            style="width: 100%;">
                            <thead>
                                <tr user="row">
                                    <th class="sorting sorting_asc" tabindex="0"
                                        aria-controls="dataTable" rowspan="1" colspan="1"
                                        aria-sort="ascending"
                                        aria-label="ID: activate to sort column descending"
                                        style="width: 195.2px;">ID</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                        rowspan="1" colspan="1"
                                        aria-label="User Name: activate to sort column ascending"
                                        style="width: 296.2px;">User Name</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                        rowspan="1" colspan="1"
                                        aria-label="Recharge Amount: activate to sort column ascending"
                                        style="width: 296.2px;">Recharge Amount</th>
                                    <th class="sorting" tabindex="0" aria-controls="dataTable"
                                        rowspan="1" colspan="1"
                                        aria-label="Recharge Time: activate to sort column ascending"
                                        style="width: 141.2px;">Recharge Time</th>   
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($recharges as $recharge)
                                    <tr>
                                        <td>{{ $recharge->id }}</td>
                                        <td>{{ $recharge->user->name }}</td> <!-- Assuming there's a user relationship -->
                                        <td>{{ $recharge->amount }}</td>
                                        <td>{{ $recharge->created_at->format('Y-m-d H:i:s') }}</td> <!-- Format the time as needed -->
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


