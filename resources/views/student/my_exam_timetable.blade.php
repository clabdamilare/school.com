
@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        @foreach ($getRecord as $value)
        <div class="card mb-4">
            <div class="card-body">
                <h4 class="card-title">{{ $value['name'] }}</h4>
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Subject Name</th>
                                <th>Day</th>
                                <th>Exam Date</th>
                                <th>Start Time </th>
                                <th>End Time </th>
                                <th>Room Number</th>
                                <th>Full Marks </th>
                                <th>Passing Marks </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($value['exam'] as $values)
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
        </div>
        @endforeach
    </div>
</div>

@endsection



{{-- @extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">

        <style>
            table {
                table-layout: fixed;
                width: 100%;
            }
            th, td {
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
        </style>

        @foreach ($getRecord as $value)
        <div class="card mb-4">
            <div class="card-body">
                <h4 class="card-title">{{ $value['name'] }}</h4>
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Subject Name</th>
                                <th>Day</th>
                                <th>Exam Date</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Room Number</th>
                                <th>Full Marks</th>
                                <th>Passing Marks</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($value['exam'] as $values)
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
        </div>
        @endforeach
    </div>
</div>

@endsection --}}
