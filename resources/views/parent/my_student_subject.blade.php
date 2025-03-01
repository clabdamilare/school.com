@extends('layouts.app')
@section('content')
<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">

   <div class="card mb-6">
      <!-- Add mb-4 for spacing -->
      <div class="d-flex justify-content-between align-items-center">
         <h5 class="card-header m-0">My Subject<span style="color: #7367f0">({{ $getUser->name }} {{ $getUser->last_name  }})</span></h5>
      </div>
   </div>
   <!-- Closing first card -->
   <!-- Table Section -->
   <div class="card">
      <div class="table-responsive text-nowrap">
         <table class="table">
            <thead>
               <tr>
                  <th>Subject Name</th>
                  <th>Subject Type</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody class="table-border-bottom-0">
               @foreach($getRecord as $value)
               <tr>
                  <td>{{ $value->subject_name }}</td>
                  <td>{{ $value->subject_type }}</td>
                  <td>
                    <div class="dropdown">
                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                            <i class="ti ti-dots-vertical"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item waves-effect" href="{{ url('parent/my_class_subject/class_timetable/' . $value->class_id . '/' . $value->subject_id . '/'.$getUser->id) }}">
                                <i class="ti ti-pencil me-1"></i> My Class Timetable
                            </a>
                        </div>
                    </div>
                </td>
               </tr>
               @endforeach
            </tbody>
         </table>
      </div>
   </div>
</div>
@endsection
