@extends('admin.layouts.app')

@section('title')
E-Learning | All Classes
@endsection

@section('content')

<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 mb-4 no-bg">
                    <div class="card-header py-3 px-0 d-flex align-items-center justify-content-between border-bottom">
                        <h3 class=" fw-bold flex-fill">All Classes</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 py-3">
            @foreach($class as $data)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="card">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="lesson_name">
                                    <a href="{{ route('class.show', $data->id) }}">
                                        <h6 class="mb-0 fw-bold fs-6 mb-2">{{ $data->teacherassign[0]->coursedetail->course->course_name }}</h6>
                                    </a>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="avatar"><img class="avatar rounded-circle" src="{{ asset('teacher-image') . '/' . $data->teacherassign[0]->teacher->teacher_image }}" alt=""></div>
                                <div class="flex-fill ms-2 text-truncate">
                                    <div class="">{{ $data->teacherassign[0]->teacher->teacher_name }}</div>
                                </div>
                                <div class="
                            <?php if ($data->status === 'Upcoming') { ?>
                                text-info
                                <?php } elseif ($data->status === 'Runing') { ?>
                                    text-success
                                    <?php } elseif ($data->status === 'Complete') { ?>
                                        text-danger
                                        <?php } elseif ($data->status === 'Full') { ?>
                                            text-dark
                                            <?php } ?>
                            "><b>{{ $data->status }}</b></div>
                            </div>
                            <div class="dividers-block"></div>
                            <div class="row g-2">
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="icofont-files-stack "></i>
                                        <span class="ms-2">{{ $data->teacherassign[0]->coursedetail->course->course_lessons }} Lessons</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="icofont-clock-time"></i>
                                        <span class="ms-2">{{ $data->batch_time }}</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="icofont-group-students"></i>
                                        <span class="ms-2">{{ $data->admission_count }} Students</span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex align-items-center">
                                        <i class="icofont-calendar"></i>
                                        <span class="ms-2">{{ $data->start_date }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dividers-block"></div>
                            <div class="d-flex align-items-center justify-content-between mb-2">
                                <h4 class="small fw-bold mb-0">Student Limit {{ $data->student_capacity }}</h4>
                            </div>
                            <div class="progress" style="height: 8px;">
                                <div class="progress-bar bg-secondary" role="progressbar" style="width: 25%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-secondary ms-1" role="progressbar" style="width: 25%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                <div class="progress-bar bg-secondary ms-1" role="progressbar" style="width: 28%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection