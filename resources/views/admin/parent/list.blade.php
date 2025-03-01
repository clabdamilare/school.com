@extends('layouts.app')

@section('content')
<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">


<div class="card mb-6">  <!-- Add mb-4 for spacing -->
    <div class="d-flex justify-content-between align-items-center">
        <h5 class="card-header m-0">Parent List (Total : {{ $getRecord->total() }})</h5>
        <a href="{{ url('admin/parent/add')}}" class="btn btn-primary btn-md me-6">
            <span class="ti-xs ti ti-star me-1"></span>Add New Parent
        </a>
    </div>
</div>  <!-- Closing first card -->

<!-- Add margin-bottom to create space between form and table -->
<div class="card mb-4 custom-card">
    <!-- Search Heading -->
    <div class="card-header">
        <h5 class="m-0">Search Parent</h5> <!-- Adjust the text as needed -->
    </div>

     <div class="card-body">
        <form method="GET" action="{{ url('admin/parent/list') }}">
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
                    <label class="form-label" for="formValidationClass">Gender</label>
                    <select id="formtabs-country" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="formtabs-country" tabindex="-1" aria-hidden="true" class="form-control" name="gender">
                        <option value="">Select Gender</option>
                        <option {{ (Request::get('gender') == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                        <option {{ (Request::get('gender') == 'Female') ? 'selected' : '' }} value="Female">Female</option>
                        <option {{ (Request::get('gender') == 'Other') ? 'selected' : '' }} value="Other">Other</option>
                    </select>

                </div>
                 <div class="col-md-2 col-sm-4">
                    <label class="form-label" for="formValidationClass">mobile Number</label>
                    <input type="text" name="mobile_number"
                           value="{{ Request::get('mobile_number') }}" class="form-control" placeholder="mobile Number">
                </div>
                <div class="col-md-2 col-sm-4">
                    <label class="form-label" for="formValidationClass">Occupation</label>
                    <input type="text" name="occupation"
                           value="{{ Request::get('occupation') }}" class="form-control" placeholder="Occupation">
                </div>
                <div class="col-md-2 col-sm-4">
                    <label class="form-label" for="formValidationClass">Address</label>
                    <input type="text" name="address"
                           value="{{ Request::get('address') }}" class="form-control" placeholder="Address">
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
                    <label class="form-label" for="formValidationDate">Created Date</label>
                    <input type="date" name="date"
                           value="{{ Request::get('date') }}" class="form-control">
                </div>
                <!-- Buttons aligned properly -->
                <div class="col-md-2 d-flex align-items-end gap-2">
                    <button type="submit" class="btn btn-info btn-sm">Search</button>
                    <a href="{{ url('admin/parent/list') }}" class="btn btn-dark btn-sm">Reset</a>
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Phone</th>
                    <th>Occupation</th>
                    <th>Address</th>
                    <th>Status</th>
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
                    <td>{{ $value->gender }}</td>
                    <td>{{ $value->mobile_number }}</td>
                    <td>{{ $value->occupation }}</td>
                    <td>{{ $value->address }}</td>

                       <td>
                        @if($value->status == 0)
                            <span class="badge bg-label-primary">Active</span>
                        @else
                            <span class="badge bg-label-danger">Inactive</span>
                        @endif
                    </td>
                    <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="ti ti-dots-vertical"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item waves-effect" href="{{ url('admin/parent/edit/' . $value->id) }}">
                                    <i class="ti ti-pencil me-1"></i> Edit
                                </a>
                                <form action="{{ url('admin/parent/delete/' . $value->id) }}" method="GET" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item waves-effect" onclick="return confirm('Are you sure you want to delete this parent?');">
                                        <i class="ti ti-trash me-1"></i> Delete
                                    </button>
                                </form>
                                  <a class="dropdown-item waves-effect" href="{{ url('admin/parent/my-student/' . $value->id) }}">
                                    <i class="ti ti-pencil me-1"></i>My Student
                                </a>
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
