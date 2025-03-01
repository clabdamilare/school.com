@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">

        <!-- Search Form -->
        <div class="card mb-4 custom-card">
            <div class="card-header">
                <h5 class="m-0">Search Class Timetable</h5>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ url('admin/class_timetable/list') }}">
                    <div class="row g-3 align-items-end">
                        <!-- Class Name Dropdown -->
                        <div class="col-md-3 col-sm-4 ms-3">
                            <label>Class Name</label>
                            <select class="form-select select2 getClass" name="class_id" id="classDropdown" required>
                                <option value="">Select</option>
                                @foreach($getClass as $class)
                                    <option value="{{ $class->id }}" {{ request('class_id') == $class->id ? 'selected' : '' }}>
                                        {{ $class->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Subject Name Dropdown -->
                        <div class="col-md-3 col-sm-4 ms-3">
                            <label>Subject Name</label>
                            <select class="form-select select2 getSubject" name="subject_id" id="subjectDropdown" required>
                                <option value="">Select</option>
                                @foreach($getSubject as $subject)
                                    <option value="{{ $subject->subject_id }}" {{ request('subject_id') == $subject->subject_id ? 'selected' : '' }}>
                                        {{ $subject->subject_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-2 col-auto d-flex gap-2 ms-3">
                            <button type="submit" class="btn btn-info btn-sm custom-btn-width">Search</button>
                            <a href="{{ url('admin/class_timetable/list') }}" class="btn btn-dark btn-sm custom-btn-width">Reset</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @if (!empty(Request::get('class_id')) && !empty(Request::get('subject_id')))
        <form action="{{ url('admin/class_timetable/add') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="subject_id" value="{{ Request::get('subject_id') }}">
           <input type="hidden" name="class_id" value="{{ Request::get('class_id') }}">
        <!-- Table Section -->
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Week</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Room Number</th>
                        </tr>
                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach ($week as $value)
                                <tr>
                                    <th>
                                        <input type="hidden" name="timetable[{{ $i }}][week_id]" value="{{ $value['week_id'] }}">
                                        {{ $value['week_name'] }}
                                    </th>
                                    <td>
                                        <input type="time" name="timetable[{{ $i }}][start_time]" value="{{ $value['start_time'] }}" class="form-control">
                                    </td>
                                    <td>
                                        <input type="time" name="timetable[{{ $i }}][end_time]" value="{{ $value['end_time'] }}" class="form-control">
                                    </td>
                                    <td>
                                        <input type="text" style="width: 200px;" name="timetable[{{ $i }}][room_number]" value="{{ $value['room_number'] }}" class="form-control">
                                    </td>
                                </tr>
                                @php
                                $i++;
                                @endphp
                            @endforeach
                        </tbody>
                    </thead>

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

<!-- Store Class-Subject Data in JavaScript -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let subjectData = {!! $subjectData !!};

        console.log("Loaded Subject Data:", subjectData);

        const classDropdown = document.getElementById("classDropdown");
        const subjectDropdown = document.getElementById("subjectDropdown");

        function updatesubject(classId, selectedSubjectId = null) {
            console.log("Updating subjects for class ID:", classId);
            subjectDropdown.innerHTML = "<option value=''>Select</option>";

            if (classId && subjectData[classId]) {
                subjectData[classId].forEach(subject => {
                    let option = document.createElement("option");
                    option.value = subject.subject_id;
                    option.textContent = subject.subject_name;

                    if (selectedSubjectId && subject.subject_id == selectedSubjectId) {
                        option.selected = true;
                    }

                    subjectDropdown.appendChild(option);
                });
            }
        }

        // On page load, maintain selection
        let selectedClassId = classDropdown.value;
        let selectedSubjectId = "{{ request('subject_id') }}";

        if (selectedClassId) {
            updatesubject(selectedClassId, selectedSubjectId);
        }

        // Update subjects when class changes
        classDropdown.addEventListener("change", function() {
            updatesubject(this.value);
        });
    });
</script>

@endsection
