@extends('layouts.app')
@section('content')
@section('style')

<style type="text/css">
.fc-daygrid-event {
    white-space: normal;
}
</style>

@endsection
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="col-xl mb-6">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">My Calendar</h5>
                </div>
                <div class="card-body">
                    <!-- The calendar container -->
                    <div id="calendar"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

<script type="text/javascript">
    var events = new Array();

    @foreach($getClassTimetable as $value)
    events.push({
        title: 'Class: {{ $value->class_name }} - {{ $value->subject_name }}',
        daysOfWeek: [ {{ $value->fullcalendar_day }} ],
        startTime: '{{ $value->start_time }}',
        endTime: '{{ $value->end_time }}'
    });
@endforeach

@foreach($getExamTimetable as $exam)
    events.push({
        title: 'Exam {{ $exam->class_name }} - {{ $exam->exam_name }} - {{ $exam->subject_name }} ({{ date('h:i A', strtotime($exam->start_time)) }} to {{ date('h:i A', strtotime($exam->end_time)) }})',
        start: '{{ $exam->exam_date }}',
        end: '{{ $exam->exam_date }}',
        color: 'red',
        url: '{{ url('teacher/my_exam_timetable') }}'
    });
@endforeach


    var calendarID = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarID, {
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        initialDate: '<?=date('Y-m-d')?>',
        navLinks: true,
        editable: false,
        events: events,
        // initialView: 'timeGridWeek',
    });
    calendar.render();
</script>
@endsection
