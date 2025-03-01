@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Custom CSS Styles -->
        <style>
            .custom-btn-width {
                min-width: 90px; /* Ensures uniform button width */
            }

            .custom-card {
                min-height: 80px; /* Adjust height as needed */
                margin: 0 auto; /* Centers it */
            }

            .marks-input-group {
                margin-bottom: 15px;
            }

            .marks-input-group label {
                font-weight: bold;
                margin-bottom: 5px;
            }

            .marks-total {
                margin-top: 10px;
                padding: 10px;
                background-color: #f8f9fa;
                border-radius: 5px;
            }

            .marks-total b {
                color: #333;
            }

            .pass {
                color: green;
                font-weight: bold;
            }

            .fail {
                color: red;
                font-weight: bold;
            }
        </style>

        <!-- Search Form Card -->
        <div class="card mb-4 custom-card">
            <div class="card-header">
                <h5 class="m-0">Search Marks Register</h5>
            </div>
            <div class="card-body">
                <form method="GET" action="{{ url('admin/examinations/marks_register') }}">
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
                            <a href="{{ url('admin/examinations/marks_register') }}" class="btn btn-dark btn-sm custom-btn-width">Reset</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Exam Schedule Table -->
        @if (!empty($getSubject) && !empty($getSubject->count()))
            <div class="card">
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>STUDENT NAME</th>
                                @foreach($getSubject as $subject)
                                    <th>
                                        {{ $subject->subject_name }} <br />
                                        ({{ $subject->subject_type }} {{ $subject->passing_mark }} / {{ $subject->full_marks }})
                                    </th>
                                @endforeach
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @if (!empty($getStudent) && !empty($getStudent->count()))
                                @foreach($getStudent as $student)
                                    <form name="post" class="SubmitForm">
                                        {{ csrf_field() }}
                                        <input type="hidden" name="student_id" value="{{ $student->id }}">
                                        <input type="hidden" name="exam_id" value="{{ Request::get('exam_id') }}">
                                        <input type="hidden" name="class_id" value="{{ Request::get('class_id') }}">
                                        <tr>
                                            <td>{{ $student->name }} {{ $student->last_name }}</td>
                                            @php
                                                $i = 1;
                                                $totalStudentMark = 0;
                                                $totalFullMarks = 0;
                                                $totalPassingMark = 0;
                                                $pass_fail_vali = 0;
                                            @endphp
                                            @foreach($getSubject as $subject)
                                                @php
                                                    $totalMark = 0;
                                                    $totalFullMarks = $totalFullMarks + $subject->full_marks;
                                                    $totalPassingMark = $totalPassingMark + $subject->passing_mark;

                                                    $getMark = $subject->getMark($student->id, Request::get('exam_id'), Request::get('class_id'), $subject->subject_id);

                                                    if (!empty($getMark)) {
                                                        $totalMark = $getMark->class_work + $getMark->home_work + $getMark->test_work + $getMark->exam;
                                                    }
                                                    $totalStudentMark = $totalStudentMark + $totalMark;
                                                @endphp
                                                <td>
                                                    <!-- Marks Input Fields -->
                                                    <div class="marks-input-group">
                                                        <label>Class Work</label>
                                                        <input type="hidden" name="mark[{{ $i }}][id]" value="{{ $subject->id }}">
                                                        <input type="hidden" name="mark[{{ $i }}][subject_id]" value="{{ $subject->subject_id }}">
                                                        <input type="text" value="{{ !empty($getMark->class_work) ? $getMark->class_work : '' }}" id="class_work_{{ $student->id }}{{ $subject->subject_id }}" name="mark[{{ $i }}][class_work]" class="form-control" placeholder="Enter Marks">
                                                    </div>
                                                    <div class="marks-input-group">
                                                        <label>Home Work</label>
                                                        <input type="text" value="{{ !empty($getMark->home_work) ? $getMark->home_work : '' }}" id="home_work_{{ $student->id }}{{ $subject->subject_id }}" name="mark[{{ $i }}][home_work]" class="form-control" placeholder="Enter Marks">
                                                    </div>
                                                    <div class="marks-input-group">
                                                        <label>Test Work</label>
                                                        <input type="text" value="{{ !empty($getMark->test_work) ? $getMark->test_work : '' }}" id="test_work_{{ $student->id }}{{ $subject->subject_id }}" name="mark[{{ $i }}][test_work]" class="form-control" placeholder="Enter Marks">
                                                    </div>
                                                    <div class="marks-input-group">
                                                        <label>Exam</label>
                                                        <input type="text" value="{{ !empty($getMark->exam) ? $getMark->exam : '' }}" id="exam_{{ $student->id }}{{ $subject->subject_id }}" name="mark[{{ $i }}][exam]" class="form-control" placeholder="Enter Marks">
                                                    </div>

                                                    <!-- Save Button -->
                                                    <div class="marks-input-group">
                                                        <button type="button" class="btn btn-primary SaveSingleSubject" data-schedule="{{ $subject->id }}" id="{{ $student->id }}" data-val="{{ $subject->subject_id }}" data-exam="{{ Request::get('exam_id') }}" data-class="{{ Request::get('class_id') }}">Save</button>
                                                    </div>

                                                    <!-- Total Marks and Pass/Fail Status -->
                                                    @if (!empty($getMark))
                                                        <div class="marks-total">
                                                            <b>Total Mark:</b> {{ $totalMark }} <br />
                                                            <b>Passing Mark:</b> {{ $subject->passing_mark }} <br />
                                                            @if ($totalMark >= $subject->passing_mark)
                                                            Result : <span class="pass">Pass</span>
                                                            @else
                                                            Result : <span class="fail">Fail</span>
                                                                @php
                                                                    $pass_fail_vali = 1;
                                                                @endphp
                                                            @endif
                                                        </div>
                                                    @endif
                                                </td>
                                                @php
                                                    $i++;
                                                @endphp
                                            @endforeach
                                            <td class="align-top">
                                                <button type="submit" class="btn btn-success">Save all</button>
                                               @if(!empty($totalStudentMark))
                                            <br />
                                            <br />
                                            <b>Total Subject Mark :</b> {{ $totalFullMarks }}
                                            <br />
                                            <b>Total Passing Mark :</b> {{ $totalPassingMark }}
                                            <br />
                                            <b>Total Student Mark :</b> {{ $totalStudentMark }}
                                            <br />
                                            @php
                                                $percentage = ($totalStudentMark * 100) / $totalFullMarks;
                                            @endphp
                                            <br />
                                            <b>Percentage :</b> {{ round($percentage, 2) }}%
                                            <br />
                                            @if($pass_fail_vali == 0)
                                                Result : <span style="color:green; font-weight: bold;">Pass</span>
                                            @else
                                                Result : <span style="color:red; font-weight: bold;">Fail</span>
                                            @endif
                                        @endif
                                            </td>
                                        <style>
                                            .align-top {
                                                vertical-align: top !important;
                                            }
                                        </style>
                                        </tr>
                                    </form>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection

@section('script')
<script type="text/javascript">
    // Form Submission for Saving All Marks
    $('.SubmitForm').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "{{ url('admin/examinations/submit_marks_register') }}",
            data: $(this).serialize(),
            dataType: "json",
            success: function(data) {
                alert(data.message);
            }
        });
    });

    // Save Single Subject Marks
    $('.SaveSingleSubject').click(function(e) {
        var student_id = $(this).attr('id');
        var subject_id = $(this).attr('data-val');
        var exam_id = $(this).attr('data-exam');
        var class_id = $(this).attr('data-class');
        var id = $(this).attr('data-schedule');

        var class_work = $('#class_work_' + student_id + subject_id).val();
        var home_work = $('#home_work_' + student_id + subject_id).val();
        var test_work = $('#test_work_' + student_id + subject_id).val();
        var exam = $('#exam_' + student_id + subject_id).val();

        $.ajax({
            type: "POST",
            url: "{{ url('admin/examinations/single_submit_marks_register') }}",
            data: {
                "_token": "{{ csrf_token() }}",
                id: id,
                student_id: student_id,
                subject_id: subject_id,
                exam_id: exam_id,
                class_id: class_id,
                class_work: class_work,
                home_work: home_work,
                test_work: test_work,
                exam: exam
            },
            dataType: "json",
            success: function(data) {
                alert(data.message);
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error:', status, error);
                alert('An error occurred while saving the marks.');
            }
        });
    });
</script>
@endsection
