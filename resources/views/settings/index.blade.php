@extends('layouts.app')
@section('content')
<div class="content-wrapper">
   <div class="container-xxl flex-grow-1 container-p-y">
      <div class="row fv-plugins-icon-container">
         <div class="col-md-12">
            <div class="nav-align-top">
               <ul class="nav nav-pills flex-column flex-md-row mb-6 gap-2 gap-lg-0">
                  <li class="nav-item">
                     <a class="nav-link active waves-effect waves-light" href="javascript:void(0);">
                     <i class="ti-sm ti ti-users me-1_5"></i> Account
                     </a>
                  </li>
                  <li class="nav-item">
                     @php
                     // Determine the correct URL based on user type
                     $userType = Auth::user()->user_type;
                     $changePasswordUrl = '';
                     if ($userType == 1) {
                     $changePasswordUrl = url('admin/change_password');
                     } elseif ($userType == 2) {
                     $changePasswordUrl = url('teacher/change_password');
                     } elseif ($userType == 3) {
                     $changePasswordUrl = url('student/change_password');
                     } elseif ($userType == 4) {
                     $changePasswordUrl = url('parent/change_password');
                     }
                     @endphp
                     <a class="nav-link waves-effect waves-light @if(Request::segment(2) == 'change_password') active @endif" href="{{ $changePasswordUrl }}">
                     <i class="ti-sm ti ti-lock me-1_5"></i> Security
                     </a>
                  </li>
                  <!-- Content for Teachers Only -->
                  <li class="nav-item">
                     <a class="nav-link waves-effect waves-light" href="pages-account-settings-billing.html">
                     <i class="ti-sm ti ti-bookmark me-1_5"></i> Billing &amp; Plans
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link waves-effect waves-light" href="pages-account-settings-notifications.html">
                     <i class="ti-sm ti ti-bell me-1_5"></i> Notifications
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link waves-effect waves-light" href="pages-account-settings-connections.html">
                     <i class="ti-sm ti ti-link me-1_5"></i> Connections
                     </a>
                  </li>
               </ul>
            </div>
            <!-- Content for Admin (User Type 1) -->
            @if (Auth::user()->user_type == 1)
            <div class="col-xl mb-6">
               <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                     <h5 class="mb-0">My Account</h5>
                  </div>
                  <div class="card-body">
                     <form action="{{ route('admin.account.update') }}" method="post" enctype="multipart/form-data">
                        {{  csrf_field() }}
                        <div class="mb-6">
                           <label class="form-label" for="basic-default-fullname">Name</label>
                           <input type="text" class="form-control" name="name" value="{{ $getRecord->name }}" id="basic-default-fullname" placeholder="name" required>
                        </div>
                        <div class="mb-6">
                           <label class="form-label" for="basic-default-email">Email</label>
                           <div class="input-group input-group-merge">
                              <input type="text" id="basic-default-email" name="email" value="{{ $getRecord->email }}" class="form-control" placeholder="john.doe" aria-label="email">
                              {{-- <span class="input-group-text">@gmail.com</span> --}}
                           </div>
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                     </form>
                  </div>
               </div>
            </div>
            <script>
               document.getElementById("basic-default-email").addEventListener("input", function() {
                   // Remove @gmail.com if user tries to type it
                   this.value = this.value.replace(/@gmail\.com/i, "");
               });

               document.querySelector("form").addEventListener("submit", function(event) {
                   let emailField = document.getElementById("basic-default-email");
                   emailField.value = emailField.value.trim() + "@gmail.com"; // Ensure @gmail.com is added before submission
               });
            </script>
            <!-- Content for Teachers (User Type 2) -->
            @if (Auth::user()->user_type == 2)
            <div class="col-xl mb-6">
               <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                     <h5 class="mb-0">My Account</h5>
                  </div>
                  <div class="card-body">
                     <form action="{{ route('teacher.account.update') }}" method="post" enctype="multipart/form-data">
                        {{  csrf_field() }}
                        <div class="row">
                           <div class="col-md-6 mb-3">
                              <label class="form-label">First Name <span style="color: red;">*</span></label>
                              <input type="text" class="form-control" name="name" value="{{ old('name', $getRecord->name) }}"  placeholder="First Name" required>
                              <div style="color:red">{{ $errors->first('name') }}</div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label class="form-label">Last Name <span style="color: red;">*</span></label>
                              <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $getRecord->last_name) }}"  placeholder="Last Name" required>
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
                              <label class="form-label" >Date Of Birth <span style="color: red;">*</span></label>
                              <input type="date" class="form-control" required name="date_of_birth" value="{{ old('date_of_birth', $getRecord->date_of_birth) }}">
                              <div style="color:red">{{ $errors->first('date_of_birth') }}</div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label class="form-label" >mobile Number<span style="color: red;">*</span></label>
                              <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number', $getRecord->mobile_number) }}"  placeholder="mobile Number" required>
                              <div style="color:red">{{ $errors->first('mobile_number') }}</div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label class="form-label">Marital Status<span style="color: red;">*</span></label>
                              <input type="text" class="form-control" name="marital_status" value="{{ old('marital_status', $getRecord->marital_status) }}" placeholder="Marital Status"  required>
                              <div style="color:red">{{ $errors->first('marital_status') }}</div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label class="form-label">Profile Pic<span style="color: red;">*</span></label>
                              <input type="file" class="form-control" name="profile_pic" >
                              <div style="color:red">{{ $errors->first('profile_pic') }}</div>
                              @if(!empty($getRecord->getProfile()))
                              <img src="{{ $getRecord->getProfile() }}" style="width: auto; height: 50px;">
                           </div>
                           <div class="col-md-6 mb-3">
                              <label class="form-label">Current Address<span style="color: red;">*</span></label>
                              <textarea class="form-control" name="address" required> {{ old('address', $getRecord->address) }}  </textarea>
                              <div style="color:red">{{ $errors->first('address') }}</div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label class="form-label">Permanent Address<span style="color: red;">*</span></label>
                              <textarea class="form-control" name="permanent_address"required> {{ old('permanent_address', $getRecord->permanent_address) }} </textarea>
                              <div style="color:red">{{ $errors->first('permanent_address') }}</div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label class="form-label">Qualification<span style="color: red;">*</span></label>
                              <textarea class="form-control" name="qualification" required> {{ old('qualification', $getRecord->qualification) }} </textarea>
                              <div style="color:red">{{ $errors->first('qualification') }}</div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label class="form-label">Work Experience<span style="color: red;">*</span></label>
                              <textarea class="form-control" name="work_experience" required>{{ old('work_experience', $getRecord->work_experience) }} </textarea>
                              <div style="color:red">{{ $errors->first('work_experience') }}</div>
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
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">submit</button>
                     </form>
                  </div>
               </div>
            </div>
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
            @endif
            <!-- Content for Students (User Type 3) -->
            @if (Auth::user()->user_type == 3)
            <div class="col-xl mb-6">
               <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                     <h5 class="mb-0">My Account</h5>
                  </div>
                  <div class="card-body">
                     <form action="{{ route('student.account.update') }}" method="post" enctype="multipart/form-data">
                        {{  csrf_field() }}
                        <div class="row">
                           <div class="col-md-6 mb-3">
                              <label class="form-label">First Name <span style="color: red;">*</span></label>
                              <input type="text" class="form-control" name="name" value="{{ old('name', $getRecord->name) }}"  placeholder="First Name" required>
                              <div style="color:red">{{ $errors->first('name') }}</div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label class="form-label">Last Name <span style="color: red;">*</span></label>
                              <input type="text" class="form-control" name="last_name" value="{{ old('last_name', $getRecord->last_name) }}"  placeholder="Last Name" required>
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
                              <label class="form-label" >Date Of Birth <span style="color: red;">*</span></label>
                              <input type="date" class="form-control" required name="date_of_birth" value="{{ old('date_of_birth', $getRecord->date_of_birth) }}">
                              <div style="color:red">{{ $errors->first('date_of_birth') }}</div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label class="form-label">Caste<span style="color: red;">*</span></label>
                              <input type="text" class="form-control" name="caste" value="{{ old('caste', $getRecord->caste) }}"  placeholder="Caste" >
                              <div style="color:red">{{ $errors->first('caste') }}</div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label class="form-label">Religion<span style="color: red;">*</span></label>
                              <input type="text" class="form-control" name="religion" value="{{ old('religion', $getRecord->religion) }}"  placeholder="Religion" required >
                              <div style="color:red">{{ $errors->first('religion') }}</div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label class="form-label" >mobile Number<span style="color: red;">*</span></label>
                              <input type="text" class="form-control" name="mobile_number" value="{{ old('mobile_number', $getRecord->mobile_number) }}"  placeholder="mobile Number" required>
                              <div style="color:red">{{ $errors->first('mobile_number') }}</div>
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
                              <label class="form-label">Blood Group<span style="color: red;">*</span></label>
                              <input type="text" class="form-control" name="blood_group" value="{{ old('blood_group', $getRecord->blood_group) }}" placeholder="Blood Group"  required>
                              <div style="color:red">{{ $errors->first('blood_group') }}</div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label class="form-label" >Height<span style="color: red;">*</span></label>
                              <input type="text" class="form-control" name="height"  value="{{ old('height', $getRecord->height) }}" placeholder="Height"  required>
                              <div style="color:red">{{ $errors->first('height') }}</div>
                           </div>
                           <div class="col-md-6 mb-3">
                              <label class="form-label">Weight<span style="color: red;">*</span></label>
                              <input type="text" class="form-control" name="weight" value="{{ old('weight', $getRecord->weight) }}" placeholder="Weight"  required>
                              <div style="color:red">{{ $errors->first('weight') }}</div>
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
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                     </form>
                  </div>
               </div>
            </div>
            @endif
            <script>
               document.getElementById("basic-default-email").addEventListener("input", function() {
                   let value = this.value;

                   // Remove duplicate '@gmail.com' if user tries to type it again
                   value = value.replace(/@gmail\.com{2,}/gi, "@gmail.com");

                   // Ensure @gmail.com is not removed while typing
                   if (!value.includes("@gmail.com")) {
                       value = value.replace(/@.*$/, ""); // Remove other domains if typed
                   }

                   this.value = value;
               });

               document.querySelector("form").addEventListener("submit", function(event) {
                   let emailField = document.getElementById("basic-default-email");
                   let emailValue = emailField.value.trim();

                   // Remove any existing '@gmail.com' and append only one instance
                   emailValue = emailValue.replace(/@gmail\.com/gi, "") + "@gmail.com";

                   emailField.value = emailValue;
               });
            </script>
            @endif
            <!-- Content for Parents (User Type 4) -->
            @if (Auth::user()->user_type == 4)
            <div class="col-xl mb-6">
               <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                     <h5 class="mb-0">My Account </h5>
                  </div>
                  <div class="card-body">
                     <form action="{{ route('parent.account.update') }}" method="post" enctype="multipart/form-data">
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
                        </div>
                        <div class="mb-6">
                           <label class="form-label" for="basic-default-email">Email<span style="color: red;">*</span></label>
                           <div class="input-group input-group-merge">
                              <input type="text" id="basic-default-email" name="email" value="{{ old('email', $getRecord->email) }}" class="form-control" placeholder="john.doe" aria-label="email">
                              <span class="input-group-text">@gmail.com</span>
                           </div>
                        </div>
                        <!-- Add margin-bottom to create space before the Send button -->
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                     </form>
                  </div>
               </div>
            </div>
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
            @endif
            <!-- Common Content for All Users -->
            <div class="card mb-6">
               <div class="card-body">
                  <h5>Common Content</h5>
                  <!-- Add common content here -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
