@extends('user.master')
@section('section')
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- End of Topbar -->

        <div class="wrapper wrapper-content">
            <div class="row">
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-title">
                            <span class="label label-success float-right">Overall</span>
                            <h5>Booking</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins">{{ $totalBookings }}</h1> <!-- Dynamic total bookings -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-title">
                            <span class="label label-info float-right">Amount</span>
                            <h5 title="Recent Transaction">Recharge</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins">{{ $userAmount }}</h1> <!-- Dynamic user amount -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="ibox">
                        <div class="ibox-title">
                            <span class="label label-success float-right">Approved</span>
                            <h5>Booking</h5>
                        </div>
                        <div class="ibox-content">
                            <h1 class="no-margins">{{ $approvedBookings }}</h1> <!-- Dynamic approved bookings -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
