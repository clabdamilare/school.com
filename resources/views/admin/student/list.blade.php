@extends('layouts.app')
@section('content')
<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">

   <div class="card mb-6">
      <!-- Add mb-4 for spacing -->
      <div class="d-flex justify-content-between align-items-center">
         <h5 class="card-header m-0">Student List (Total : {{ $getRecord->total() }})</h5>
         <a href="{{ url('admin/student/add')}}" class="btn btn-primary btn-md me-6">
         <span class="ti-xs ti ti-star me-1"></span>Add New Student
         </a>
      </div>
   </div>
   <!-- Closing first card -->
   <!-- Add margin-bottom to create space between form and table -->
   <div class="card mb-4 custom-card">
      <!-- Search Heading -->
      <div class="card-header">
         <h5 class="m-0">Search Student</h5>
         <!-- Adjust the text as needed -->
      </div>
      <div class="card-body">
         <form method="GET" action="{{ url('admin/student/list') }}">
            <div class="row g-3">
               <div class="col-md-2 col-sm-4">
                  <label class="form-label" for="formValidationUsername">Name</label>
                  <input type="text" name="name"
                     value="{{ Request::get('name') }}" class="form-control" placeholder="Name">
               </div>
               <div class="col-md-2 col-sm-4">
                  <label class="form-label" for="formValidationLastName">Last Name</label>
                  <input type="text" name="last_name"
                     value="{{ Request::get('last_name') }}" class="form-control" placeholder="Last Name">
               </div>
               <div class="col-md-2 col-sm-4">
                  <label class="form-label" for="formValidationEmail">Email</label>
                  <input type="text" name="email"
                     value="{{ Request::get('email') }}" class="form-control" placeholder="Email">
               </div>
               <div class="col-md-2 col-sm-4">
                  <label class="form-label" for="formValidationAdmission">Admission Number</label>
                  <input type="text" name="admission_number"
                     value="{{ Request::get('admission_number') }}" class="form-control" placeholder="Admission Number">
               </div>
               <div class="col-md-2 col-sm-4">
                  <label class="form-label" for="formValidationRoll">Roll Number</label>
                  <input type="text" name="roll_number"
                     value="{{ Request::get('roll_number') }}" class="form-control" placeholder="Roll Number">
               </div>
               <div class="col-md-2 col-sm-4">
                  <label class="form-label" for="formValidationClass">Class</label>
                  <input type="text" name="class"
                     value="{{ Request::get('class') }}" class="form-control" placeholder="Class">
               </div>
               <div class="col-md-2 col-sm-4">
                  <label class="form-label" for="formValidationClass">Gender</label>
                  <select id="formtabs-country" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="formtabs-country" tabindex="-1" aria-hidden="true" class="form-control" name="gender">
                     <option value="">Select Gender</option>
                     <option {{ (Request::get('gender') == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                     <option {{ (Request::get('gender') == 'Female') ? 'selected' : '' }} value="Female">Female</option>
                     <option {{ (Request::get('gender') == 'Other') ? 'selected' : '' }} value="Other">Other</option>
                  </select>
               </div>
               <div class="col-md-2 col-sm-4">
                  <label class="form-label" for="formValidationClass">Caste</label>
                  <input type="text" name="caste"
                     value="{{ Request::get('caste') }}" class="form-control" placeholder="Caste">
               </div>
               <div class="col-md-2 col-sm-4">
                  <label class="form-label" for="formValidationClass">Religion</label>
                  <input type="text" name="religion"
                     value="{{ Request::get('religion') }}" class="form-control" placeholder="Religion">
               </div>
               <div class="col-md-2 col-sm-4">
                  <label class="form-label" for="formValidationClass">mobile Number</label>
                  <input type="text" name="mobile_number"
                     value="{{ Request::get('mobile_number') }}" class="form-control" placeholder="mobile Number">
               </div>
               <div class="col-md-2 col-sm-4">
                  <label class="form-label" for="formValidationClass">Blood Group</label>
                  <input type="text" name="blood_group"
                     value="{{ Request::get('blood_group') }}" class="form-control" placeholder="Blood Group">
               </div>
               <div class="col-md-2 col-sm-4">
                  <label class="form-label" for="formValidationClass">Status</label>
                  <select id="formtabs-country" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="formtabs-country" tabindex="-1" aria-hidden="true" class="form-control" name="status">
                     <option value="">Select Status</option>
                     <option {{ (Request::get('status') == 100)? 'selected' : '' }} value="100">Active</option>
                     <option {{ (Request::get('status') == 1) ? 'selected' : '' }} value="1">Inactive</option>
                  </select>
               </div>
               <div class="col-md-2 col-sm-4">
                  <label class="form-label" for="formValidationDate">Admission Date</label>
                  <input type="date" name="admission_date"
                     value="{{ Request::get('admission_date') }}" class="form-control">
               </div>
               <div class="col-md-2 col-sm-4">
                  <label class="form-label" for="formValidationDate">Created Date</label>
                  <input type="date" name="date"
                     value="{{ Request::get('date') }}" class="form-control">
               </div>
               <!-- Buttons aligned properly -->
               <div class="col-md-2 d-flex align-items-end gap-2">
                  <button type="submit" class="btn btn-info btn-sm">Search</button>
                  <a href="{{ url('admin/student/list') }}" class="btn btn-dark btn-sm">Reset</a>
               </div>
            </div>
         </form>
      </div>
   </div>
   <!-- End of Form Card -->
   <style>
      .custom-card {
      min-height: 80px; /* Adjust height as needed */
      margin: 0 auto; /* Centers it */
      }
   </style>
   <!-- Table Section -->
   <div class="card">
      <div class="table-responsive text-nowrap">
         <table class="table">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Profile Pic</th>
                  <th>Student Name</th>
                  <th>Parent Name</th>
                  <th>Email</th>
                  <th>Admission Number</th>
                  <th>Roll Number</th>
                  <th>Class</th>
                  <th>Gender</th>
                  <th>Date of Birth </th>
                  <th>Caste </th>
                  <th>Religion</th>
                  <th>Mobile Number</th>
                  <th>Admission Date</th>
                  <th>Blood Group</th>
                  <th>Height</th>
                  <th>Weight</th>
                  <th>Created date</th>
                  <th>Status</th>
                  <th>Actions</th>
               </tr>
            </thead>
            <tbody class="table-border-bottom-0">
               @foreach($getRecord as $value)
               <tr>
                  <td>{{ $value->id }}</td>
                  <td>
                     @if(!empty($value->getProfile()))
                     <img src="{{ $value->getProfile() }}" style="height: 50px; width:50px; border-radius: 50px;">
                     @endif
                  </td>
                  <td>{{ $value->name }} {{ $value->last_name }}</td>
                  <td>{{ $value->parent_name }} {{ $value->parent_last_name}}</td>
                  <td>{{ $value->email }}</td>
                  <td>{{ $value->admission_number }}</td>
                  <td>{{ $value->roll_number }}</td>
                  <td>{{ $value->class_name }}</td>
                  <td>{{ $value->gender }}</td>
                  <td>
                     @if(!empty($value->date_of_birth))
                     {{ date('d-m-Y', strtotime($value->date_of_birth)) }}
                     @endif
                  </td>
                  <td>{{ $value->caste }}</td>
                  <td>{{ $value->religion }}</td>
                  <td>{{ $value->mobile_number }}</td>
                  <td>
                     @if(!empty($value->admission_date))
                     {{ date('d-m-Y', strtotime($value->admission_date)) }}
                     @endif
                  </td>
                  <td>{{ $value->blood_group }}</td>
                  <td>{{ $value->height }}</td>
                  <td>{{ $value->weight }}</td>
                  {{--
                  <td>{{ ($value->status == 0)? 'Active' : 'Inactive' }}</td>
                  --}}
                  <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                  <td>
                     @if($value->status == 0)
                     <span class="badge bg-label-primary">Active</span>
                     @else
                     <span class="badge bg-label-danger">Inactive</span>
                     @endif
                  </td>
                  {{--
                  <td><span class="badge bg-label-primary me-1">Active</span></td>
                  --}}
                  <td>
                     <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="ti ti-dots-vertical"></i>
                        </button>
                        <div class="dropdown-menu">
                           <a class="dropdown-item waves-effect" href="{{ url('admin/student/edit/' . $value->id) }}">
                           <i class="ti ti-pencil me-1"></i> Edit
                           </a>
                           <form action="{{ url('admin/student/delete/' . $value->id) }}" method="get" style="display: inline;">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="dropdown-item waves-effect" onclick="return confirm('Are you sure you want to delete this student?');">
                              <i class="ti ti-trash me-1"></i> Delete
                              </button>
                           </form>
                        </div>
                     </div>
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
         <div style="padding: 30px; float: right;">
            {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
         </div>
      </div>
   </div>
</div>
@endsection
