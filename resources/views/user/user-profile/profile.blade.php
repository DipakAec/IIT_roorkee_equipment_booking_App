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
                                                                
                                        <!-- Display the current profile picture (if available) -->
                                        @if($user->profile_picture)
                                            <div class="mb-2">
                                                <img src="{{ asset('uploads/profile_pictures/' . $user->profile_picture) }}" alt="Profile Picture" class="img-thumbnail" style="max-width: 150px;">
                                            </div>
                                        @endif
                                
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
                                        <label>Mobile Number</label>
                                        <input type="text" placeholder="Enter Mobile number" class="form-control"
                                            name="phone" id="student_phone" maxlength="10" value="{{ $user->phone }}"
                                            required>
                                        <div id="phone_error" style="color: red; display: none;"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Profile Picture</label>

                                        <!-- File input for uploading a new profile picture -->
                                        <input type="file" class="form-control" name="profile_picture" accept="image/*">
                                        <small class="form-text text-muted">Dont't upload to keep the current
                                            Picture.</small>
                                    </div>
                                </div>

                                 <!-- IIT or Non-IIT Selection -->
                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Institute Type <span class="required">*</span></label>
                                        <select class="form-control" id="institute_type" name="institute_type" required>
                                            <option value="">Select</option>
                                            <option value="IIT" {{ $user->institute_type == 'IIT' ? 'selected' : '' }}>IIT</option>
                                            <option value="Non-IIT" {{ $user->institute_type == 'Non-IIT' ? 'selected' : '' }}>Non-IIT</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6" id="department_section" style="display: none;">
                                    <div class="form-group">
                                        <label>Department <span class="required">*</span></label>
                                        <select class="form-control" name="department" id="department">
                                            <option value="">Select Department</option>
                                            <optgroup label="Departments">
                                                <option value="Architecture and Planning" {{ $user->department == 'Architecture and Planning' ? 'selected' : '' }}>Architecture and Planning</option>
                                                <option value="Applied Mathematics and Scientific Computing" {{ $user->department == 'Applied Mathematics and Scientific Computing' ? 'selected' : '' }}>Applied Mathematics and Scientific Computing</option>
                                                <option value="Biosciences and Bioengineering" {{ $user->department == 'Biosciences and Bioengineering' ? 'selected' : '' }}>Biosciences and Bioengineering</option>
                                                <option value="Chemical Engineering" {{ $user->department == 'Chemical Engineering' ? 'selected' : '' }}>Chemical Engineering</option>
                                                <option value="Chemistry" {{ $user->department == 'Chemistry' ? 'selected' : '' }}>Chemistry</option>
                                                <option value="Civil Engineering" {{ $user->department == 'Civil Engineering' ? 'selected' : '' }}>Civil Engineering</option>
                                                <option value="Computer Science and Engineering" {{ $user->department == 'Computer Science and Engineering' ? 'selected' : '' }}>Computer Science and Engineering</option>
                                                <option value="Design" {{ $user->department == 'Design' ? 'selected' : '' }}>Design</option>
                                                <option value="Earthquake Engineering" {{ $user->department == 'Earthquake Engineering' ? 'selected' : '' }}>Earthquake Engineering</option>
                                                <option value="Earth Sciences" {{ $user->department == 'Earth Sciences' ? 'selected' : '' }}>Earth Sciences</option>
                                                <option value="Electrical Engineering" {{ $user->department == 'Electrical Engineering' ? 'selected' : '' }}>Electrical Engineering</option>
                                                <option value="Electronics and Communication Engineering" {{ $user->department == 'Electronics and Communication Engineering' ? 'selected' : '' }}>Electronics and Communication Engineering</option>
                                                <option value="Humanities and Social Sciences" {{ $user->department == 'Humanities and Social Sciences' ? 'selected' : '' }}>Humanities and Social Sciences</option>
                                                <option value="Hydrology" {{ $user->department == 'Hydrology' ? 'selected' : '' }}>Hydrology</option>
                                                <option value="Hydro and Renewable Energy" {{ $user->department == 'Hydro and Renewable Energy' ? 'selected' : '' }}>Hydro and Renewable Energy</option>
                                                <option value="Management Studies" {{ $user->department == 'Management Studies' ? 'selected' : '' }}>Management Studies</option>
                                                <option value="Mathematics" {{ $user->department == 'Mathematics' ? 'selected' : '' }}>Mathematics</option>
                                                <option value="Mechanical and Industrial Engineering" {{ $user->department == 'Mechanical and Industrial Engineering' ? 'selected' : '' }}>Mechanical and Industrial Engineering</option>
                                                <option value="Metallurgical and Materials Engineering" {{ $user->department == 'Metallurgical and Materials Engineering' ? 'selected' : '' }}>Metallurgical and Materials Engineering</option>
                                                <option value="Paper Technology" {{ $user->department == 'Paper Technology' ? 'selected' : '' }}>Paper Technology</option>
                                                <option value="Polymer and Process Engineering" {{ $user->department == 'Polymer and Process Engineering' ? 'selected' : '' }}>Polymer and Process Engineering</option>
                                                <option value="Physics" {{ $user->department == 'Physics' ? 'selected' : '' }}>Physics</option>
                                                <option value="Water Resources Development and Management" {{ $user->department == 'Water Resources Development and Management' ? 'selected' : '' }}>Water Resources Development and Management</option>
                                            </optgroup>
                                            <optgroup label="Centers">
                                                <option value="Centre of Excellence in Disaster Mitigation & Management (CoEDMM)" {{ $user->department == 'Centre of Excellence in Disaster Mitigation & Management (CoEDMM)' ? 'selected' : '' }}>Centre of Excellence in Disaster Mitigation & Management (CoEDMM)</option>
                                                <option value="Center for Sustainable Energy" {{ $user->department == 'Center for Sustainable Energy' ? 'selected' : '' }}>Center for Sustainable Energy</option>
                                                <option value="Centre of Nanotechnology" {{ $user->department == 'Centre of Nanotechnology' ? 'selected' : '' }}>Centre of Nanotechnology</option>
                                                <option value="Centre for Photonics and Quantum Communication Technology" {{ $user->department == 'Centre for Photonics and Quantum Communication Technology' ? 'selected' : '' }}>Centre for Photonics and Quantum Communication Technology</option>
                                                <option value="Centre for Space Science and Technology" {{ $user->department == 'Centre for Space Science and Technology' ? 'selected' : '' }}>Centre for Space Science and Technology</option>
                                                <option value="Centre for Transportation Systems (CTRANS)" {{ $user->department == 'Centre for Transportation Systems (CTRANS)' ? 'selected' : '' }}>Centre for Transportation Systems (CTRANS)</option>
                                                <option value="International Centre of Excellence for Dams" {{ $user->department == 'International Centre of Excellence for Dams' ? 'selected' : '' }}>International Centre of Excellence for Dams</option>
                                                <option value="Institute Computer Centre" {{ $user->department == 'Institute Computer Centre' ? 'selected' : '' }}>Institute Computer Centre</option>
                                                <option value="Institute Instrumentation Centre" {{ $user->department == 'Institute Instrumentation Centre' ? 'selected' : '' }}>Institute Instrumentation Centre</option>
                                            </optgroup>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Student Enrollment Number <span class="required">*</span></label>
                                        <input type="text" placeholder="Enter enrollment number" class="form-control"
                                            name="enroll_number" value="{{ $user->enroll_number }}" required>
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
                                        <select class="form-control" name="supervisior_dept" id="supervisior_dept" required>
                                            <option value="">Select Department</option>
                                            <optgroup label="Departments">
                                                <option value="Architecture and Planning" {{ $user->supervisior_dept == 'Architecture and Planning' ? 'selected' : '' }}>Architecture and Planning</option>
                                                <option value="Applied Mathematics and Scientific Computing" {{ $user->supervisior_dept == 'Applied Mathematics and Scientific Computing' ? 'selected' : '' }}>Applied Mathematics and Scientific Computing</option>
                                                <option value="Biosciences and Bioengineering" {{ $user->supervisior_dept == 'Biosciences and Bioengineering' ? 'selected' : '' }}>Biosciences and Bioengineering</option>
                                                <option value="Chemical Engineering" {{ $user->supervisior_dept == 'Chemical Engineering' ? 'selected' : '' }}>Chemical Engineering</option>
                                                <option value="Chemistry" {{ $user->supervisior_dept == 'Chemistry' ? 'selected' : '' }}>Chemistry</option>
                                                <option value="Civil Engineering" {{ $user->supervisior_dept == 'Civil Engineering' ? 'selected' : '' }}>Civil Engineering</option>
                                                <option value="Computer Science and Engineering" {{ $user->supervisior_dept == 'Computer Science and Engineering' ? 'selected' : '' }}>Computer Science and Engineering</option>
                                                <option value="Design" {{ $user->supervisior_dept == 'Design' ? 'selected' : '' }}>Design</option>
                                                <option value="Earthquake Engineering" {{ $user->supervisior_dept == 'Earthquake Engineering' ? 'selected' : '' }}>Earthquake Engineering</option>
                                                <option value="Earth Sciences" {{ $user->supervisior_dept == 'Earth Sciences' ? 'selected' : '' }}>Earth Sciences</option>
                                                <option value="Electrical Engineering" {{ $user->supervisior_dept == 'Electrical Engineering' ? 'selected' : '' }}>Electrical Engineering</option>
                                                <option value="Electronics and Communication Engineering" {{ $user->supervisior_dept == 'Electronics and Communication Engineering' ? 'selected' : '' }}>Electronics and Communication Engineering</option>
                                                <option value="Humanities and Social Sciences" {{ $user->supervisior_dept == 'Humanities and Social Sciences' ? 'selected' : '' }}>Humanities and Social Sciences</option>
                                                <option value="Hydrology" {{ $user->supervisior_dept == 'Hydrology' ? 'selected' : '' }}>Hydrology</option>
                                                <option value="Hydro and Renewable Energy" {{ $user->supervisior_dept == 'Hydro and Renewable Energy' ? 'selected' : '' }}>Hydro and Renewable Energy</option>
                                                <option value="Management Studies" {{ $user->supervisior_dept == 'Management Studies' ? 'selected' : '' }}>Management Studies</option>
                                                <option value="Mathematics" {{ $user->supervisior_dept == 'Mathematics' ? 'selected' : '' }}>Mathematics</option>
                                                <option value="Mechanical and Industrial Engineering" {{ $user->supervisior_dept == 'Mechanical and Industrial Engineering' ? 'selected' : '' }}>Mechanical and Industrial Engineering</option>
                                                <option value="Metallurgical and Materials Engineering" {{ $user->supervisior_dept == 'Metallurgical and Materials Engineering' ? 'selected' : '' }}>Metallurgical and Materials Engineering</option>
                                                <option value="Paper Technology" {{ $user->supervisior_dept == 'Paper Technology' ? 'selected' : '' }}>Paper Technology</option>
                                                <option value="Polymer and Process Engineering" {{ $user->supervisior_dept == 'Polymer and Process Engineering' ? 'selected' : '' }}>Polymer and Process Engineering</option>
                                                <option value="Physics" {{ $user->supervisior_dept == 'Physics' ? 'selected' : '' }}>Physics</option>
                                                <option value="Water Resources Development and Management" {{ $user->supervisior_dept == 'Water Resources Development and Management' ? 'selected' : '' }}>Water Resources Development and Management</option>
                                            </optgroup>
                                            <optgroup label="Centers">
                                                <option value="Centre of Excellence in Disaster Mitigation & Management (CoEDMM)" {{ $user->supervisior_dept == 'Centre of Excellence in Disaster Mitigation & Management (CoEDMM)' ? 'selected' : '' }}>Centre of Excellence in Disaster Mitigation & Management (CoEDMM)</option>
                                                <option value="Center for Sustainable Energy" {{ $user->supervisior_dept == 'Center for Sustainable Energy' ? 'selected' : '' }}>Center for Sustainable Energy</option>
                                                <option value="Centre of Nanotechnology" {{ $user->supervisior_dept == 'Centre of Nanotechnology' ? 'selected' : '' }}>Centre of Nanotechnology</option>
                                                <option value="Centre for Photonics and Quantum Communication Technology" {{ $user->supervisior_dept == 'Centre for Photonics and Quantum Communication Technology' ? 'selected' : '' }}>Centre for Photonics and Quantum Communication Technology</option>
                                                <option value="Centre for Space Science and Technology" {{ $user->supervisior_dept == 'Centre for Space Science and Technology' ? 'selected' : '' }}>Centre for Space Science and Technology</option>
                                                <option value="Centre for Transportation Systems (CTRANS)" {{ $user->supervisior_dept == 'Centre for Transportation Systems (CTRANS)' ? 'selected' : '' }}>Centre for Transportation Systems (CTRANS)</option>
                                                <option value="International Centre of Excellence for Dams" {{ $user->supervisior_dept == 'International Centre of Excellence for Dams' ? 'selected' : '' }}>International Centre of Excellence for Dams</option>
                                                <option value="Institute Computer Centre" {{ $user->supervisior_dept == 'Institute Computer Centre' ? 'selected' : '' }}>Institute Computer Centre</option>
                                                <option value="Institute Instrumentation Centre" {{ $user->supervisior_dept == 'Institute Instrumentation Centre' ? 'selected' : '' }}>Institute Instrumentation Centre</option>
                                            </optgroup>
                                        </select>
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

            $(document).ready(function() {
                // Function to handle the logic
                function toggleDepartmentSection() {
                    const instituteType = $('#institute_type').val();
                    if (instituteType === 'IIT') {
                        $('#department_section').show();
                    } else {
                        $('#department_section').hide();
                    }
                }

                // Trigger the function when the page loads
                toggleDepartmentSection();

                // Attach the event listener for 'change' event
                $('#institute_type').on('change', toggleDepartmentSection);
            });

        </script>
