@extends('layouts.app')
@section('content')
<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">

{{--
<div class="card mb-6">
   <!-- Add mb-4 for spacing -->
   <div class="d-flex justify-content-between align-items-center">
      <h5 class="card-header m-0">My Student</h5>
   </div>
</div>
<!-- Closing first card --> --}}
<style>
   .custom-card {
   min-height: 80px; /* Adjust height as needed */
   margin: 0 auto; /* Centers it */
   }
</style>
<!-- Second Table Section -->
<div class="card">
   <div class="table-responsive text-nowrap">
      <div class="d-flex justify-content-between align-items-center">
         <h5 class="card-header m-0">My Student</h5>
      </div>
      <table class="table">
         <thead>
            <tr>
               <th>Profile Pic</th>
               <th>Student Name</th>
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
               <th>Actions</th>
            </tr>
         </thead>
         <tbody class="table-border-bottom-0">
            @foreach($getRecord as $value)
            <tr>
               <td>
                  @if(!empty($value->getProfile()))
                  <img src="{{ $value->getProfile() }}" style="height: 50px; width:50px; border-radius: 50px;">
                  @endif
               </td>
               <td>{{ $value->name }} {{ $value->last_name }}</td>
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
                  <div class="dropdown">
                     <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                     <i class="ti ti-dots-vertical"></i>
                     </button>
                     <div class="dropdown-menu">
                        <a class="dropdown-item waves-effect" href="{{ url('parent/my_student/subject/'. $value->id) }}">
                        <i class="ti ti-pencil me-1"></i>Subject
                        </a>
                        <a class="dropdown-item waves-effect" href="{{ url('parent/my_student/exam_timetable/'. $value->id) }}">
                            <i class="ti ti-pencil me-1"></i>Exam Timetable
                            </a>
                            <a class="dropdown-item waves-effect" href="{{ url('parent/my_student/calendar/'. $value->id) }}">
                                <i class="ti ti-pencil me-1"></i>Calendar
                                </a>
                     </div>
                  </div>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
      <div style="padding: 30px; float: right;"></div>
   </div>
</div>
@endsection
