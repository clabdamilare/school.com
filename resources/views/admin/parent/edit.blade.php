@extends('layouts.app')

@section('content')
<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="col-xl mb-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Parent</h5>
            </div>
            <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    {{  csrf_field() }}
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">First Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="name" value="{{ old('name', $getRecord->name) }}"  placeholder="First Name" >
                            <div style="color:red">{{ $errors->first('name') }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Last Name <span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $getRecord->last_name) }}"  placeholder="Last Name" >
                            <div style="color:red">{{ $errors->first('last_name') }}</div>
                        </div>

                       


                        <div class="col-md-6 mb-3">
                            <label>Gender <span style="color: red;">*</span></label>
                            <select id="formtabs-country" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="formtabs-country" tabindex="-1" aria-hidden="true" class="form-control" required name="gender">
                                <option value="">Select Gender</option>
                                <option {{ (old('gender', $getRecord->gender) == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                                <option {{ (old('gender', $getRecord->gender) == 'Female') ? 'selected' : '' }} value="Female">Female</option>
                                <option {{ (old('gender', $getRecord->gender) == 'Other') ? 'selected' : '' }} value="Other">Other</option>
                            </select>
                            <div style="color:red">{{ $errors->first('gender') }}</div>
                        </div>

                      

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Occupation<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="occupation" value="{{ old('occupation', $getRecord->occupation) }}"  placeholder="Occupation" >
                            <div style="color:red">{{ $errors->first('occupation') }}</div>
                        </div>


                        <div class="col-md-6 mb-3">
                            <label class="form-label" >mobile Number<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number', $getRecord->mobile_number) }}"  placeholder="mobile Number" required>
                            <div style="color:red">{{ $errors->first('mobile_number') }}</div>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Address<span style="color: red;">*</span></label>
                            <input type="text" class="form-control" required name="address" value="{{ old('address', $getRecord->address) }}"  placeholder="Address" >
                            <div style="color:red">{{ $errors->first('address') }}</div>
                        </div>

                    

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Profile Pic<span style="color: red;">*</span></label>
                            <input type="file" class="form-control" name="profile_pic" >
                            <div style="color:red">{{ $errors->first('profile_pic') }}</div>
                             @if(!empty($getRecord->getProfile()))
                            <img src="{{ $getRecord->getProfile() }}" style="width: auto; height: 24px;">
                            @endif
                        </div>

       
                        <div class="col-md-6 mb-3">
                            <label>Status<span style="color: red;">*</span></label>
                            <select id="formtabs-country" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="formtabs-country" tabindex="-1" aria-hidden="true" class="form-control" required name="status">
                                <option value="">Select Status</option>
                                <option {{ (old('status', $getRecord->status) == 0) ? 'selected' : '' }} value="0">Active</option>
                                <option {{ (old('status', $getRecord->status) == 1) ? 'selected' : '' }} value="1">Inactive</option>
                            </select>
                            <div style="color:red">{{ $errors->first('status') }}</div>
                        </div>

                    </div>



                    <div class="mb-6">
                        <label class="form-label" for="basic-default-email">Email<span style="color: red;">*</span></label>

                        <div class="input-group input-group-merge">
                            <input type="text" id="basic-default-email" name="email" value="{{ old('email', $getRecord->email) }}" class="form-control" placeholder="john.doe" aria-label="email">

                            <span class="input-group-text">@gmail.com</span>
                        </div>
                    </div>




                    <!-- Add margin-bottom to create space before the Send button -->
                    <div class="col-md-6 mb-4">
                        <div class="form-password-toggle">
                            <label class="form-label" for="multicol-password">Password<span style="color: red;"></span></label>
                            <div class="input-group input-group-merge">
                                <input type="text" id="multicol-password" name="password" class="form-control" placeholder="············" aria-describedby="multicol-password2" >
                                <span class="input-group-text cursor-pointer" id="multicol-password2"><i class="ti ti-eye-off"></i></span>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
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
