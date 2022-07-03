@extends('admin.layouts.app')

@section('title')
E-Learning | All Classes
@endsection

@section('content')

<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row clearfix g-3">
            <div class="col-xxl-12 col-xl-12 col-lg-12">
                <div class="border-0 mb-4">
                    <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom">
                        <h3 class="fw-bold mb-0">Class Module Information</h3>
                        <div class="dropdown">
                            <a href="{{ route('class.index') }}" class="btn btn-outline-danger">BACK</a>
                        </div>
                    </div>
                </div>
                <div class="row g-3">
                    @foreach($singleclass as $data)
                    <div class="col-lg-5 col-md-4">
                        <div class="sticky-lg-top">
                            <h6 class="mb-3 fw-bold fs-5 mb-2"><u><i>{{ $class->coursedetail->course->course_name }}</i></u></h6>
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <div class="nav-link active mb-4">
                                    <div class="d-flex align-items-center">
                                        <div class="date-info d-flex flex-column w60 justify-content-center">
                                            <span class="fw-bold fs-6">Class</span>
                                        </div>
                                        <div class="lessons-info  d-flex flex-column border-start ps-3">
                                            <span class="fw-bold fs-6">Module Chapter</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dividers-block"></div>
                            </div>
                            @foreach($data->coursedetail->coursetopic as $item)
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <div class="nav-link active mb-4">
                                    <div class="d-flex align-items-center">
                                        <div class="date-info d-flex flex-column w60 justify-content-center">
                                            <span class="text-center">{{ $item->module_class }}</span>
                                        </div>
                                        <div class="lessons-info  d-flex flex-column border-start ps-3">
                                            <span class="fw-bold fs-6">{{ $item->module_name }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="dividers-block"></div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                    <div class="col-lg-7 col-md-8">
                        <div class="tab-content " id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="lesson_name">
                                                <h6 class="mb-0 fw-bold mb-4">Teacher Information</h6>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="flex-fill text-truncate">
                                                <div class="">
                                                    <h4>{{ $class->teacher->teacher_name }}</h4>
                                                </div>
                                                <div class="">
                                                    <span><b>Phone:</b> {{ $class->teacher->teacher_phone }}</span>
                                                </div>
                                                <div class="">
                                                    <span><b>Email:</b> {{ $class->teacher->teacher_email }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dividers-block"></div>
                                        <div class="row g-2">
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="icofont-files-stack"></i>
                                                    <span class="ms-2"><b>Total:</b> {{ $class->coursedetail->course->course_lessons }} Lessons</span>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="d-flex align-items-center">
                                                    <i class="icofont-clock-time "></i>
                                                    <span class="ms-2"><b>Class Start In:</b> {{ $class->batch->batch_time }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dividers-block"></div>
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <h4 class="small fw-bold mb-0">Teacher Skill</h4>
                                            <span class="small">{{ $class->teacher->teacher_skill }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Row End -->
    </div>
</div>

@endsection