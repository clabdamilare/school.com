@extends('layouts.app')

@section('content')
<div class="content-wrapper">
<div class="container-xxl flex-grow-1 container-p-y">

    <div class="col-xl mb-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Assign Subject</h5>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    {{  csrf_field() }}
                    <div class="mb-6">
                        <label class="form-label" for="basic-default-fullname">Assign Subject Name</label>
                        <select id="formtabs-country" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="formtabs-country" tabindex="-1" aria-hidden="true" name="class_id" required>
                            <option value="">select class</option>
                            @foreach($getClass as $class)
                            <option {{ ($getRecord->class_id == $class->id) ? 'selected' : '' }} value="{{ $class->id }}">{{ $class->name }}</option>
                            @endforeach
                          </select>

                    </div>

                   <div class="form-group">
    <label>subject name</label>
    @foreach($getSubject as $subject)
    @php
    $checked = "";
@endphp

@foreach($getAssignSubjectID as $subjectAssign)
    @if($subjectAssign->subject_id == $subject->id)
        @php
            $checked = "checked";
        @endphp
    @endif
@endforeach
    <div>
        <label style="font-weight: normal;">
            <input {{ $checked }} type="checkbox" value="{{ $subject->id }}" name="subject_id[]"> {{ $subject->name }}
        </label>
    </div>
    @endforeach

</div>






                    {{-- <div class="col-md-6" data-select2-id="19">
                        <label class="form-label" for="formtabs-country">Status</label>
                        <div class="position-relative" data-select2-id="18"><select id="formtabs-country" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="formtabs-country" tabindex="-1" aria-hidden="true">
                          <option value="" data-select2-id="11">Select</option>
                          <option value="Australia" data-select2-id="27">Active</option>
                          <option value="Bangladesh" data-select2-id="28">Inactive</option>
                            </div> --}}

                    <div class="mb-6">
                        <label class="form-label" for="basic-default-fullname">Status</label>
                        <select id="formtabs-country" class="select2 form-select select2-hidden-accessible" data-allow-clear="true" data-select2-id="formtabs-country" tabindex="-1" aria-hidden="true" name="status">
                            <option {{ ($getRecord->Status == 0) ? 'selected' : '' }} value="0">Active</option>
                            <option {{ ($getRecord->Status== 1) ? 'selected' : '' }} value="1">Inactive</option>
                          </select>
                    </div>



                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                </form>
            </div>
        </div>
    </div>




@endsection
