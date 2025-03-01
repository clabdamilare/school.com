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

    @foreach($getMyTimetable as $value)
        @foreach($value['week'] as $week)
            events.push({
                title: '{{ $value['name'] }}',
                daysOfWeek: [ {{ $week['fullcalendar_day'] }} ],
                startTime: '{{ $week['start_time'] }}',
                endTime: '{{ $week['end_time'] }}'
            });
        @endforeach
    @endforeach

    @foreach($getExamTimetable as $valueE)
    @foreach($valueE['exam'] as $exam)
        events.push({

            title: '{{ $valueE['name'] }} - {{ $exam['subject_name'] }} ({{ date('h:i A', strtotime($exam['start_time'])) }} to {{ date('h:i A', strtotime($exam['end_time'])) }})',
            start: '{{ $exam['exam_date'] }}',
            end: '{{ $exam['exam_date'] }}',
            color: '#7367f0',
            url: '{{ url('student/my_exam_timetable') }}'
        });
    @endforeach
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
