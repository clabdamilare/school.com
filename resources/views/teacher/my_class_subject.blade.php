@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">


        <div class="card mb-6">
            <!-- Add mb-4 for spacing -->
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-header m-0">My Class & Subject</h5>

            </div>
        </div> <!-- Closing first card -->

        <!-- Add margin-bottom to create space between form and table -->

        <!-- End of Form Card -->



        <!-- Table Section -->
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>

                            <th>Class Name</th>
                            <th>Subject Name</th>
                            <th>Subject Type</th>
                            <th>My Class Timetable</th>
                            <th>Created Date</th>
                            <th>Actions</th>

                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach($getRecord as $value)
                        <tr>

                            <td>{{ $value->class_name }}</td>
                            <td>{{ $value->subject_name }}</td>
                            <td>{{ $value->subject_type }}</td>
                            <td>

                                @php
                                $ClassSubject = $value->getMyTimeTable($value->class_id, $value->subject_id);
                                @endphp

                                @if (!empty($ClassSubject))
                                    {{ date('h:i A', strtotime($ClassSubject->start_time)) }}
                                    to
                                    {{ date('h:i A', strtotime($ClassSubject->end_time)) }}
                                    <br />
                                    <span style="color: #7367f0;">Room number: {{ $ClassSubject->room_number }}</span>
                                @endif


                            </td>
                            <td>{{ date('d-m-Y H:i A', strtotime($value->created_at)) }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="ti ti-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item waves-effect" href="{{ url('teacher/my_class_subject/class_timetable/' . $value->class_id . '/' . $value->subject_id) }}">
                                            <i class="ti ti-pencil me-1"></i> My Class Timetable
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>

                <div style="padding: 30px; float: right;">

                </div>
            </div>
        </div>
    </div>
    @endsection
