@extends('layouts.app')

@section('content')
<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="col-xl mb-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Add New Student</h5>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    {{  csrf_field() }}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">First Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}"  placeholder="First Name" required>
                            <div style="color:red">{{ $errors->first('name') }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Last Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="last_name" value="{{ old('last_name') }}"  placeholder="Last Name" required>
                            <div style="color:red">{{ $errors->first('last_name') }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Admission Number<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="admission_number" value="{{ old('admission_number') }}"  placeholder="Admission Number" required>
                            <div style="color:red">{{ $errors->first('admission_number') }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Roll Number<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="roll_number" value="{{ old('roll_number') }}"  placeholder="Roll Number" required>
                            <div style="color:red">{{ $errors->first('roll_number') }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Class <span style="color: red;">*</span></label>
                            <select id="formtabs-country" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="formtabs-country" tabindex="-1" aria-hidden="true" class="form-control" required name="class_id">
                                <option value="">Select Class</option>
                                @foreach($getClass as $value)
                                <option {{ (old('class_id') == $value->id) ? 'selected' : '' }} value="{{ $value->id }}">{{ $value->name }}</option>
                                @endforeach
                            </select>
                            <div style="color:red">{{ $errors->first('class_id') }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Gender <span style="color: red;">*</span></label>
                            <select id="formtabs-country" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="formtabs-country" tabindex="-1" aria-hidden="true" class="form-control" required name="gender">
                                <option value="">Select Gender</option>
                                <option {{ (old('gender') == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                                <option {{ (old('gender') == 'Female') ? 'selected' : '' }} value="Female">Female</option>
                                <option {{ (old('gender') == 'Other') ? 'selected' : '' }} value="Other">Other</option>
                            </select>
                            <div style="color:red">{{ $errors->first('gender') }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" >Date Of Birth <span style="color: red;">*</span></label>
                            <input type="date" class="form-control" required name="date_of_birth" value="{{ old('date_of_birth') }}">
                            <div style="color:red">{{ $errors->first('date_of_birth') }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Caste<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="caste" value="{{ old('caste') }}"  placeholder="Caste" >
                            <div style="color:red">{{ $errors->first('caste') }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Religion<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="religion" value="{{ old('religion') }}"  placeholder="Religion" required >
                            <div style="color:red">{{ $errors->first('religion') }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" >mobile Number<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number') }}"  placeholder="mobile Number" required>
                            <div style="color:red">{{ $errors->first('mobile_number') }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" >Admission Date<span style="color: red;">*</span></label>
                            <input type="date" class="form-control" name="admission_date" value="{{ old('admission_date') }}" required>
                            <div style="color:red">{{ $errors->first('admission_date') }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Profile Pic<span style="color: red;">*</span></label>
                            <input type="file" class="form-control" name="profile_pic" >
                            <div style="color:red">{{ $errors->first('profile_pic') }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Blood Group<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="blood_group" value="{{ old('blood_group') }}" placeholder="Blood Group"  required>
                            <div style="color:red">{{ $errors->first('blood_group') }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label" >Height<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="height"  value="{{ old('height') }}" placeholder="Height"  required>
                            <div style="color:red">{{ $errors->first('height') }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Weight<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="weight" value="{{ old('weight') }}" placeholder="Weight"  required>
                            <div style="color:red">{{ $errors->first('weight') }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Status<span style="color: red;">*</span></label>
                            <select id="formtabs-country" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="formtabs-country" tabindex="-1" aria-hidden="true" class="form-control" required name="status">
                                <option value="">Select Status</option>
                                <option {{ (old('status') == 0) ? 'selected' : '' }} value="0">Active</option>
                                <option {{ (old('status') == 1) ? 'selected' : '' }} value="1">Inactive</option>
                            </select>
                            <div style="color:red">{{ $errors->first('status') }}</div>
                        </div>

                    </div>



                    <div class="mb-6">
                        <label class="form-label" for="basic-default-email">Email<span style="color: red;">*</span></label>

                        <div class="input-group input-group-merge">
                            <input type="text" id="basic-default-email" name="email" value="{{ old('email') }}" class="form-control" placeholder="john.doe" aria-label="email">

                            <span class="input-group-text">@gmail.com</span>
                        </div>
                    </div>




                    <!-- Add margin-bottom to create space before the Send button -->
                    <div class="col-md-6 mb-4">
                        <div class="form-password-toggle">
                            <label class="form-label" for="multicol-password">Password<span style="color: red;">*</span></label>
                            <div class="input-group input-group-merge">
                                <input type="password" id="multicol-password" name="password" class="form-control" placeholder="············" aria-describedby="multicol-password2" required>
                                <span class="input-group-text cursor-pointer" id="multicol-password2"><i class="ti ti-eye-off"></i></span>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary waves-effect waves-light">submit</button>
                </form>
            </div>
        </div>
    </div>


    @if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            html: '{!! implode("<br>", $errors->all()) !!}',
            confirmButtonText: 'OK'
        });
    </script>
@endif
    <script>
        document.getElementById("basic-default-email").addEventListener("input", function() {
            // Remove @gmail.com if user tries to type it
            this.value = this.value.replace(/@gmail\.com/i, "");
        });

        document.querySelector("form").addEventListener("submit", function(event) {
            let emailField = document.getElementById("basic-default-email");
            let emailValue = emailField.value.trim();

            // Check if email already ends with @gmail.com
            if (!emailValue.endsWith("@gmail.com")) {
                emailField.value = emailValue + "@gmail.com";
            } else {
                // Remove any additional @gmail.com just in case
                emailField.value = emailValue.replace(/@gmail\.com/gi, "") + "@gmail.com";
            }
        });
    </script>
@endsection
