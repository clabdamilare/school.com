@extends('layouts.app')

@section('content')
<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">

<!-- SweetAlert CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Check for Session Message -->
@if(session('success'))
    <script>
        Swal.fire({
            title: "Success!",
            text: "{{ session('success') }}",
            icon: "success",
            confirmButtonText: "OK"
        });
    </script>
@endif

<div class="card mb-6">  <!-- Add mb-4 for spacing -->
    <div class="d-flex justify-content-between align-items-center">
        <h5 class="card-header m-0">Parent Student List ( {{ $getParent->name }} {{ $getParent->last_name }})</h5>
        
    </div>
</div>  <!-- Closing first card -->

<!-- Add margin-bottom to create space between form and table -->
<div class="card mb-4 custom-card">
    <!-- Search Heading -->
    <div class="card-header">
        <h5 class="m-0">Search Parent Student</h5> <!-- Adjust the text as needed -->
    </div>

     <div class="card-body">
        <form method="GET" action="{{ url('admin/parent/my-student/' . $parent_id) }}">

            <div class="row g-3">
              <div class="col-md-2 col-sm-4">
                    <label class="form-label" for="formValidationUsername">Student ID</label>
                    <input type="text" name="id"
                           value="{{ Request::get('id') }}" class="form-control" placeholder="Student ID">
                </div>

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

               

                <!-- Buttons aligned properly -->
                <div class="col-md-2 d-flex align-items-end gap-2">
                    <button type="submit" class="btn btn-info btn-sm">Search</button>
                    <a href="{{ url('admin/parent/my-student/'.$parent_id) }}" class="btn btn-dark btn-sm">Reset</a>
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

@if(!empty($getSearchStudent))
<!-- Table Section -->
<div class="card mb-4"> <!-- Added mb-4 for bottom margin -->
    <div class="table-responsive text-nowrap">
     <div class="d-flex justify-content-between align-items-center">
        <h5 class="card-header m-0"> Student List </h5>
        
    </div>
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Profile Pic</th>
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Parent Name</th>
                    <th>Created Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            
            
             @foreach($getSearchStudent as $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>
                        @if(!empty($value->getProfile()))
                        <img src="{{ $value->getProfile() }}" style="height: 50px; width:50px; border-radius: 50px;">

                        @endif
                        </td>

                        <td>{{ $value->name }} {{ $value->last_name }}</td>
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->parent_name }}</td>
                    <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>

                    {{-- <td><span class="badge bg-label-primary me-1">Active</span></td> --}}
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="ti ti-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item waves-effect" href="{{ url('admin/parent/assign_student_parent/' . $value->id.'/' .$parent_id) }}">
                                    <i class="ti ti-pencil me-1"></i> Add Student To Parent
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
@endif
<!-- Second Table Section -->
<div class="card">
    <div class="table-responsive text-nowrap">
     <div class="d-flex justify-content-between align-items-center">
        <h5 class="card-header m-0">Parent Student List</h5>
        
    </div>
       <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Profile Pic</th>
                    <th>Student Name</th>
                    <th>Email</th>
                    <th>Parent Name</th>
                    <th>Created Date</th>
                    <th>Action</th>
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
                        <td>{{ $value->email }}</td>
                        <td>{{ $value->parent_name }}</td>
                    <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>

                    {{-- <td><span class="badge bg-label-primary me-1">Active</span></td> --}}
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="ti ti-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item waves-effect" href="{{ url('admin/parent/assign_student_parent_delete/' . $value->id) }}">
                                    <i class="ti ti-pencil me-1"></i> Delete
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
