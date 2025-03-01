@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <style>
            .custom-btn-width {
                min-width: 90px; /* Ensures uniform button width */
            }

            .custom-card {
                min-height: 80px; /* Adjust height as needed */
                margin: 0 auto; /* Centers it */
            }
        </style>

        <!-- Search Form Card -->
        <div class="card mb-4 custom-card">
            <div class="card-header">
                <h5 class="m-0">Search Exam Schedule</h5>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ url('admin/examinations/exam_schedule') }}">
                    <div class="row gx-2 align-items-end w-100">
                        <!-- Exam Dropdown -->
                        <div class="col-md-3 col-sm-4">
                            <label>Exam</label>
                            <select class="form-select select2" name="exam_id" id="classDropdown" required>
                                <option value="">Select</option>
                                @foreach($getExam as $exam)
                                    <option value="{{ $exam->id }}" {{ request('exam_id') == $exam->id ? 'selected' : '' }}>
                                        {{ $exam->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Class Dropdown -->
                        <div class="col-md-3 col-sm-4">
                            <label>Class</label>
                            <select class="form-select select2" name="class_id" id="subjectDropdown" required>
                                <option value="">Select</option>
                                @foreach($getClass as $class)
                                    <option value="{{ $class->id }}" {{ request('class_id') == $class->id ? 'selected' : '' }}>
                                        {{ $class->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Buttons -->
                        <div class="col-auto d-flex gap-2">
                            <button type="submit" class="btn btn-info btn-sm custom-btn-width">Search</button>
                            <a href="{{ url('admin/examinations/exam_schedule') }}" class="btn btn-dark btn-sm custom-btn-width">Reset</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Exam Schedule Table -->
        @if(!empty($getRecord))
            <form action="{{ url('admin/examinations/exam_schedule_insert') }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="exam_id" value="{{ Request::get('exam_id') }}">
                <input type="hidden" name="class_id" value="{{ Request::get('class_id') }}">

                <div class="card">
                    <div class="table-responsive text-nowrap">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Subject Name</th>
                                    <th>Exam Date</th>
                                    <th>Start Time</th>
                                    <th>End Time</th>
                                    <th>Room Number</th>
                                    <th>Full Marks</th>
                                    <th>Passing Marks</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @php $i = 1; @endphp
                                @foreach($getRecord as $value)
                                    <tr>
                                        <td>
                                            {{ $value['subject_name'] }}
                                            <input type="hidden" class="form-control" value="{{ $value['subject_id'] }}" name="schedule[{{ $i }}][subject_id]">
                                        </td>
                                        <td>
                                            <input type="date" class="form-control" value="{{ $value['exam_date'] }}" name="schedule[{{ $i }}][exam_date]">
                                        </td>
                                        <td>
                                            <input type="time" class="form-control" value="{{ $value['start_time'] }}" name="schedule[{{ $i }}][start_time]">
                                        </td>
                                        <td>
                                            <input type="time" class="form-control" value="{{ $value['end_time'] }}" name="schedule[{{ $i }}][end_time]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" value="{{ $value['room_number'] }}" name="schedule[{{ $i }}][room_number]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" value="{{ $value['full_marks'] }}" name="schedule[{{ $i }}][full_marks]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" value="{{ $value['passing_mark'] }}" name="schedule[{{ $i }}][passing_mark]">
                                        </td>
                                    </tr>
                                    @php $i++; @endphp
                                @endforeach
                            </tbody>
                        </table>

                        <div style="text-align: right; padding: 20px;">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        @endif
    </div>
</div>
@endsection
