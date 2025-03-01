@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">



        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">{{ $getClass->name }} - {{ $getSubject->name }} <span style="color:#7367f0">({{ $getStudent->name }} {{ $getStudent->last_name }})</span></h5>
                <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Week</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Room Number</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($getRecord as $valueW)
                            <tr>
                                <td>{{ $valueW['week_name'] }}</td>
                                <td>{{ !empty($valueW['start_time']) ? date('h:i A', strtotime($valueW['start_time'])) : '' }}</td>
                                <td>{{ !empty($valueW['end_time']) ? date('h:i A', strtotime($valueW['end_time'])) : '' }}</td>
                                <td>{{ $valueW['room_number'] ?? 'N/A' }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
