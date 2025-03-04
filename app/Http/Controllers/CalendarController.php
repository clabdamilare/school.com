<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ClassSubjectModel;
use App\Models\WeekModel;
use App\Models\ClassSubjectTimetableModel;
use App\Models\ExamScheduleModel;
use App\Models\AssignClassTeacherModel;
use App\Models\User;
use Auth;


class CalendarController extends Controller
{
    public function MyCalendar()
        {

            $data['getMyTimetable'] = $this->getTimetable(Auth::user()->class_id);
            $data['getExamTimetable'] = $this->getExamTimetable(Auth::user()->class_id);

            $data['header_title'] = "My Calendar";
            return view('student.my_calendar', $data);
        }


        public function getExamTimetable($class_id)
        {
            $getExam = ExamScheduleModel::getExam($class_id);
            $result = array();
            foreach($getExam as $value)
            {
                $dataE = array();
                $dataE['name'] = $value->exam_name;
                $getExamTimetable = ExamScheduleModel::getExamTimetable($value->exam_id, $class_id);
                $results = array();
                foreach($getExamTimetable as $values)
                {
                    $dataS = array();
                    $dataS['subject_name'] = $values->subject_name;
                    $dataS['exam_date'] = $values->exam_date;
                    $dataS['start_time'] = $values->start_time;
                    $dataS['end_time'] = $values->end_time;
                    $dataS['room_number'] = $values->room_number;
                    $dataS['full_marks'] = $values->full_marks;
                    $dataS['passing_mark'] = $values->passing_mark;
                    $results[] = $dataS;
                }
                $dataE['exam'] = $results;
                $result[] = $dataE;
            }
            return $result;
        }

            // parent side

            public function MyCalendarParent($student_id)
            {
                $getStudent = User::getSingle($student_id);
                $data['getMyTimetable'] = $this->getTimetable($getStudent->class_id);

                $data['getExamTimetable'] = $this->getExamTimetable($getStudent->class_id);
                $data['getStudent'] = $getStudent;
                $data['header_title'] = "Student Calendar";
                return view('parent.my_calendar', $data);
            }

            // teacher side

            public function MyCalendarTeacher()
            {
                $teacher_id = Auth::user()->id;
                $data['getClassTimetable'] = AssignClassTeacherModel::getCalendarTeacher($teacher_id);
                $data['getExamTimetable'] = ExamScheduleModel::getExamTimetableTeacher($teacher_id);
                $data['header_title'] = "My Calendar";
                return view('teacher.my_calendar', $data);
            }



        public function getTimetable($class_id)
   {
    $result = array();
    $getRecord = ClassSubjectModel::MySubject($class_id);
    foreach($getRecord as $value)
    {
        $dataS['name'] = $value->subject_name;
        $getWeek = WeekModel::getRecord();
        $week = array();
        foreach($getWeek as $valueW)
        {
            $dataW = array();
            $dataW['week_name'] = $valueW->name;
            $dataW['fullcalendar_day'] = $valueW->fullcalendar_day;
            $ClassSubject = ClassSubjectTimetableModel::getRecordClassSubject($value->class_id, $value->subject_id, $valueW->id);
            if(!empty($ClassSubject))
            {
                $dataW['start_time'] = $ClassSubject->start_time;
                $dataW['end_time'] = $ClassSubject->end_time;
                $dataW['room_number'] = $ClassSubject->room_number;
                $week[] = $dataW;
            }
        }

        $dataS['week'] = $week;
        $result[] = $dataS;
    }

    return $result;
    }





}

