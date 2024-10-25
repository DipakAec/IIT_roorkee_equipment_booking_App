<div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <div style="position:relative; width:50px">
                            <img alt="image" class="rounded-circle"
                                src="https://iicbooking.iitr.ac.in/admin_asset/img/profile_small.jpg" />
                            <span class="pro-pic" title="change profile" onclick="changeprofile()"></span>
                        </div>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold"> {{ Auth::user()->name }}</span>
                            <span class="text-muted text-xs block">Role: {{ Auth::user()->program }}</span>
                            <span class="text-muted text-xs block">Student ID: {{ Auth::user()->enroll_number }}</span>
                            <!-- <span class="text-muted text-xs block">Guide: Kaushik Pal</span>-->
                        </a>
                    </div>
                </li>
                <li>
                    <a href="{{ route('dashboard') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
                </li>
                <li>
                    <a href="{{ route('booking') }}"><i class="fa fa-th-large"></i> <span class="nav-label">Book Equipment</span></a>
                </li>
                <li>
                    <a href="{{ route('booking_list') }}"><i class="fa fa-th-large"></i> <span class="nav-label">View Booking</span></a>
                </li>

            </ul>
        </div>
    </nav>
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i>
                    </a>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <a class="dropdown-item" href="{{ route('user-profile.show') }}">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                    </li>
                    <li>
                        <a onclick="event.preventDefault();  document.getElementById('logout-form').submit();"
                            href="{{ route('logout') }}">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>

                    </li>
                </ul>
            </nav>
        </div>
        <!-- end header -->
        <form role="form" enctype="multipart/form-data" name="profile_image" method="post" id="profile_form" action="#">
            <input type="file" id="profile_image" name="profile_pic" hidden accept="image/x-png,image/gif,image/jpeg">
        </form>
        <script>
            function changeprofile() {
                    $('#profile_image').trigger('click', true);
                }

                $('#profile_image').change(function() {
                    $('#profile_form').submit();
                });
        </script>
        <style>
            .alert {
                margin-bottom: 0 !important;
            }
        </style>