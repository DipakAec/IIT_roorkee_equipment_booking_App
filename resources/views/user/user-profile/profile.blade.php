@extends('user.master')
@section('section')
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">


            <!-- End of Topbar -->

            <div class="wrapper wrapper-content">
                <div class="row">
                    <!-- resources/views/profile/show.blade.php -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="container">
                        <h1>Update Profile</h1>
                        <form role="form" action="{{ route('user-profile.update') }}" enctype="multipart/form-data"
                            method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="name_label">Student Name <span class="required">*</span></label>
                                        <input type="text" placeholder="Enter Name" class="form-control" name="name"
                                            value="{{ $user->name }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="email_label">Student Email <span class="required">*</span></label>
                                        <input type="email" placeholder="Enter Email" class="form-control" name="email"
                                            id="student_email" value="{{ $user->email }}" readonly required>
                                        <div id="email_error" style="color: red; display: none;"></div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Password <span class="required">*</span></label>
                                        <input type="password" id="password" placeholder="Enter Password"
                                            class="form-control" name="password">
                                        <small class="form-text text-muted">Leave blank to keep the current
                                            password.</small>
                                        <div id="message" class="message"
                                            style="color: red; background: transparent; border:none;"></div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Student Enrollment Number <span class="required">*</span></label>
                                        <input type="text" placeholder="Enter enrollment number" class="form-control"
                                            name="emp_id" value="{{ $user->enroll_number }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Student Department <span class="required">*</span></label>
                                        <input type="text" placeholder="Enter Student Department" class="form-control"
                                            name="department" value="{{ $user->department }}" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Mobile Number</label>
                                        <input type="text" placeholder="Enter Mobile number" class="form-control"
                                            name="phone" id="student_phone" maxlength="10" value="{{ $user->phone }}"
                                            required>
                                        <div id="phone_error" style="color: red; display: none;"></div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Enrolled Program</label>
                                        <select class="form-control" name="program_id" id="student_program_id">
                                            <option value="B.Tech" {{ $user->program === 'B.Tech' ? 'selected' : '' }}>
                                                B.Tech</option>
                                            <option value="Ph.D" {{ $user->program === 'Ph.D' ? 'selected' : '' }}>Ph.D
                                            </option>
                                            <option value="Post Doc" {{ $user->program === 'Post Doc' ? 'selected' : '' }}>
                                                Post Doc</option>
                                            <option value="others" {{ $user->program === 'others' ? 'selected' : '' }}>
                                                Others</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="supervisor_Section row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Supervisor Name <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="supervisior_name"
                                            value="{{ $user->supervisior_name }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Supervisor Department <span class="required">*</span></label>
                                        <input type="text" class="form-control" name="supervisior_dept"
                                            id="supervisior_dept" value="{{ $user->supervisior_dept }}" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Supervisor Email <span class="required">*</span></label>
                                        <input type="email" class="form-control" name="supervisior_email"
                                            id="supervisior_email" value="{{ $user->supervisior_email }}" required>
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-lg btn-success float-right m-t-n-xs" type="submit"
                                id="student_submit">
                                <strong>Update</strong>
                            </button>
                        </form>
                    </div>



                </div>
            </div>
        @endsection
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            function validatePhone(input) {
                // Remove any non-digit character
                input.value = input.value.replace(/[^0-9]/g, '');

                // Ensure the length does not exceed 10 digits
                if (input.value.length > 10) {
                    input.value = input.value.slice(0, 10);
                }
            }
            $(document).ready(function() {
                $('#password').on('input', function() {
                    const passwordLength = $(this).val().length;
                    const messageDiv = $('#message');

                    if (passwordLength < 8) {
                        messageDiv.text('Password must be at least 8 characters long.')
                            .css('color', 'red'); // Set color to red for invalid
                    } else {
                        messageDiv.text('Password is valid.')
                            .css('color', 'green'); // Set color to green for valid
                    }
                });
            });
        </script>
