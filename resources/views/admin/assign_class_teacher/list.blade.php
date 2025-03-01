@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">


        <div class="card mb-6">
            <!-- Add mb-4 for spacing -->
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header m-0">Assign Class Teacher ({{  $getRecord->total() }})</h5>
                <a href="{{ url('admin/assign_class_teacher/add') }}" class="btn btn-primary btn-md me-6">
                    <span class="ti-xs ti ti-star me-1"></span>Add New Assign Class Teacher
                </a>
            </div>
        </div> <!-- Closing first card -->

        <!-- Add margin-bottom to create space between form and table -->
        <div class="card mb-4 custom-card">
            <!-- Search Heading -->
            <div class="card-header">
                <h5 class="m-0">Search Assign Class Teacher</h5> <!-- Adjust the text as needed -->
            </div>

            <div class="card-body">
                <form method="GET" action="{{ url('admin/assign_class_teacher/list') }}">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="row g-3 align-items-end">
                            <div class="col-md-2 col-sm-4">
                                <label class="form-label" for="className">Class Name</label>
                                <input type="text" id="className"
                                       value="{{ Request::get('class_name') }}" name="class_name"
                                       class="form-control" placeholder="Class Name">
                            </div>

                            <div class="col-md-2 col-sm-4">
                                <label class="form-label" for="subjectName">Teacher Name</label>
                                <input type="text" id="subjectName"
                                       value="{{ Request::get('teacher_name') }}" name="teacher_name"
                                       class="form-control" placeholder="Teacher Name">
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
                                <label class="form-label" for="formValidationDate">Date</label>
                                <input type="date" name="date" id="formValidationDate"
                                       value="{{ Request::get('date') }}" class="form-control" placeholder="Search Date">
                            </div>

                            <div class="col-md-2 col-auto d-flex gap-2 ms-3">
                                <button type="submit" class="btn btn-info btn-sm custom-btn-width">Search</button>
                                <a href="{{ url('admin/assign_class_teacher/list') }}" class="btn btn-dark btn-sm custom-btn-width">Reset</a>
                            </div>
                        </div>

                    </div>
                </form>

            </div>

        </div>
        <!-- End of Form Card -->


        <style>
            .custom-card {

                min-height: 80px;
                /* Adjust height as needed */
                margin: 0 auto;
                /* Centers it */
            }

            .custom-btn-width {
                width: 130px;
                /* Adjust as needed */
            }
        </style>

        <!-- Table Section -->
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Class Name</th>
                            <th>Teacher Name</th>
                            <th>Status</th>
                            <th>Created By</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($getRecord as $value)
                        <tr>
                            <td>{{ $value->id }}</td>
                            <td>{{ $value->class_name }}</td>
                            <td>{{ $value->teacher_name }}</td>

                            <td>
                                @if($value->status == 0)
                                <span class="badge bg-label-primary">Active</span>
                                @else
                                <span class="badge bg-label-danger">Inactive</span>
                                @endif
                            </td>
                            <td>{{ $value->created_by_name }}</td>
                            <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                        data-bs-toggle="dropdown">
                                        <i class="ti ti-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item waves-effect"
                                            href="{{ url('admin/assign_class_teacher/edit/' . $value->id) }}">
                                            <i class="ti ti-pencil me-1"></i> Edit
                                        </a>
                                         <a class="dropdown-item waves-effect"
                                            href="{{ url('admin/assign_class_teacher/edit_single/' . $value->id) }}">
                                            <i class="ti ti-pencil me-1"></i> Edit Single
                                        </a>
                                        <form action="{{ url('admin/assign_class_teacher/delete/' . $value->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item waves-effect"
                                                onclick="return confirm('Are you sure you want to delete this Assign Subject?');">
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
