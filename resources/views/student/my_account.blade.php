@extends('layouts.app')
@section('content')
<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">
<div class="col-xl mb-6">
   <div class="card">
      <div class="card-header d-flex justify-content-between align-items-center">
         <h5 class="mb-0">My Account</h5>
      </div>
      <div class="card-body">
         <form action="" method="post" enctype="multipart/form-data">
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
@endsection
