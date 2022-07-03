@extends('admin.layouts.app')

@section('title')
E-Learning | Home
@endsection

@section('content')

@php
$user = Auth::guard('web')->user();
@endphp

<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row clearfix g-3">
            <div class="col-lg-7 col-md-12 flex-column">
                <div class="row row-deck g-3">
                    <div class="col-12">
                        <div class="card mb-3 bg-info">
                            <div class="card-body text-white d-flex flex-column">
                                <div class="d-flex align-items-center mb-auto mt-3">
                                    <div class="flex-fill ms-3 text-truncate mb-3">
                                        <h4 class="mb-1"><b><i><i class="icofont-simple-smile"></i> Welcome Back, E-Learning Dashboard</i></b> </h4>
                                        <span class="small-14"> <strong>{{ Auth::user()->name }}</strong></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @if($user->can('Runing Batch'))
                <div class="mb-3">
                    <div class="card-header py-3 px-0 no-bg border-0 bg-transparent">
                        <h4 class="mb-0 fw-bold text-secondary"><b><u>Our Runing Batch</u></b> </h4>
                        <span class="text-muted">Start Soon </span>
                    </div>
                    <div class="row row-deck">
                        <div class="col-md-12">
                            <div class="owl-carousel owl-theme owl-carouseltwo">
                                @foreach($teacherassign as $data)
                                @if($data->batch->status == "Runing")
                                <div class="item">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="lesson_name">
                                                    <h6 class="mb-0 fw-bold  fs-6  mb-2">{{ $data->batch->batch_name }}</h6>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar"><img class="avatar rounded-circle" src="{{ asset('teacher-image') . '/' . $data->teacher->teacher_image }}" alt=""></div>
                                                <div class="flex-fill ms-2 text-truncate">
                                                    <div class="">{{ $data->teacher->teacher_name }}</div>
                                                </div>
                                                <span class="btn btn-primary btn-sm"><strong>BDT. {{ $data->coursedetail->course->course_price }}</strong></span>
                                            </div>
                                            <div class="dividers-block"></div>
                                            <div class="row g-2">
                                                <div class="col-6">
                                                    <div class="d-flex align-items-center">
                                                        <i class="icofont-clock-time"></i>
                                                        <span class="ms-2"><b>Time:</b> {{ $data->batch->batch_time }} </span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="d-flex align-items-center">
                                                        <i class="icofont-ui-timer"></i>
                                                        <span class="ms-2"><b>Batch Start:</b> {{ $data->batch->start_date }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="d-flex align-items-center">
                                                        <i class="icofont-group-students "></i>
                                                        <span class="ms-2"><b>Capacity:</b> {{ $data->batch->student_capacity }} Students</span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="d-flex align-items-center">
                                                        <i class="icofont-calendar"></i>
                                                        <span class="ms-2"><b>Session:</b> {{ $data->batch->batch_session }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="col-lg-5 col-md-12">
                <div class="card mb-3 color-bg-200">
                    <div class="card-body">
                        @if($user->can('Notice Board'))
                        <div class="daily_practice">
                            <h5 class="mb-3 fw-bold text-info"><u><b>Notice Board</b></u></h5>
                            @foreach($notice as $data)
                            <div class="row g-2">
                                <div class="card line-lightblue mb-3">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="lesson_name">
                                                <a href="{{ route('single-notice', $data->id) }}">
                                                    <h6 class="mb-0 fw-bold text text-justify"> {{ $data->short_title }}</h6>
                                                </a>
                                                <small class="text-muted"><b>Post:</b> {{ $data->date }}</small> &nbsp; &nbsp; <small class="text-muted"><b>Post By:</b> {{ $data->user->name }}</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            <div class="row g-2">
                                <div class="card line-lightblue mb-3">
                                    <div class="card-body">
                                        <!-- <nav aria-label="...">
                                            <ul class="pagination m-0">
                                                <li class="page-item disabled">
                                                    <span class="page-link"></span>
                                                </li>
                                            </ul>
                                        </nav> -->
                                        {{$notice->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="dividers-block"></div>
                        @if($user->can('Upcoming Batch'))
                        <div class="upcoming-lessons">
                            <h4 class="mb-3 fw-bold text-success">Upcoming Batch</h4>
                            <div class="card line-lightblue mb-3">
                                @foreach($teacherassign as $data)
                                @if($data->batch->status == "Upcoming")
                                <div class="item">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="lesson_name">
                                                    <h6 class="mb-0 fw-bold  fs-6  mb-2">{{ $data->batch->batch_name }}</h6>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar"><img class="avatar rounded-circle" src="{{ asset('teacher-image') . '/' . $data->teacher->teacher_image }}" alt=""></div>
                                                <div class="flex-fill ms-2 text-truncate">
                                                    <div class="">{{ $data->teacher->teacher_name }}</div>
                                                </div>
                                                <!-- <a href="courses.html" class="btn btn-primary btn-sm" alt="join">Join Now</a> -->
                                            </div>
                                            <div class="dividers-block"></div>
                                            <div class="row g-2">
                                                <div class="col-6">
                                                    <div class="d-flex align-items-center">
                                                        <i class="icofont-clock-time"></i>
                                                        <span class="ms-2"><b>Time:</b> {{ $data->batch->batch_time }} </span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="d-flex align-items-center">
                                                        <i class="icofont-ui-timer"></i>
                                                        <span class="ms-2"><b>Batch Start:</b> {{ $data->batch->start_date }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="d-flex align-items-center">
                                                        <i class="icofont-group-students "></i>
                                                        <span class="ms-2"><b>Capacity:</b> {{ $data->batch->student_capacity }} Students</span>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="d-flex align-items-center">
                                                        <i class="icofont-calendar"></i>
                                                        <span class="ms-2"><b>Session:</b> {{ $data->batch->batch_session }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div><!-- Row End -->
    </div>
</div>
@endsection