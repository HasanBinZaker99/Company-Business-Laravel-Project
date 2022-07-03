@extends('admin.layouts.app')

@section('title')
E-Learning | All Course View
@endsection

@section('content')

<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 mb-4 no-bg">
                    <div class="card-header py-3 px-0 d-flex align-items-center justify-content-between border-bottom">
                        <h3 class=" fw-bold flex-fill">All Courses</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 py-3">
            @foreach($courses as $item)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card">
                    <div class="lesson_name">
                        <div class="bg-primary d-flex justify-content-center align-items-center flex-column position-relative img-overlay">
                            <a href="{{ route('course-information', $item->id) }}">
                                <img src="{{ asset('course-image') . '/' . $item->course->course_image }}" alt="course-img" class="img-fluid">
                                <div class="position-absolute top-50 start-50 translate-middle">
                                    <h6 class="mb-0 fw-bold text-white fs-6 text-center mt-3">{{ $item->course->course_name }}</h6>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="icofont-files-stack "></i>
                                    <span class="ms-2">{{ $item->course->course_lessons }} Lessons</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="icofont-clock-time "></i>
                                    <span class="ms-2">{{ $item->course->course_length }} Hours</span>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <i class="icofont-price "></i>
                                    <span class="ms-2">BDT. {{ $item->course->course_price }}</span>
                                </div>
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