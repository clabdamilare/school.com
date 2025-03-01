@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        @foreach ($getRecord as $value)
        <div class="card mb-4">
            @foreach($value['exam'] as $exam)
            <div class="card-body">

                <h4 class="card-title">{{ $value['class_name'] }}</h4>
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th data-scroll="false"><span>Subject Name</span></th>
                                <th data-scroll="false"><span>Day</span></th>
                                <th data-scroll="false"><span>Exam Date</span></th>
                                <th data-scroll="false"><span>Start Time</span></th>
                                <th data-scroll="false"><span>End Time</span></th>
                                <th data-scroll="false"><span>Room Number</span></th>
                                <th data-scroll="true"><span>Full Marks</span></th>
                                <th data-scroll="true"><span>Passing Marks</span></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($exam['subject'] as $values)
                            <tr>
                                <td>{{ $values['subject_name'] }}</td>
                                <td>{{ date('l', strtotime($values['exam_date'])) }}</td>
                                <td>{{ date('d-m-Y', strtotime($values['exam_date'])) }}</td>
                                <td>{{ date('h:i A', strtotime($values['start_time'])) }}</td>
                                <td>{{ date('h:i A', strtotime($values['end_time'])) }}</td>
                                <td>{{ $values['room_number'] }}</td>
                                <td>{{ $values['full_marks'] }}</td>
                                <td>{{ $values['passing_mark'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>

@endsection
