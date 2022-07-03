@extends('admin.layouts.app')

@section('title')
E-Learning | All Course View
@endsection

@section('content')

<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row g-3 py-3">
            <div class="col-lg-8 col-md-8 order-2 order-sm-2 order-md-1">
                <img src="{{ asset('course-image') . '/' . $courseInfo->course->course_image }}" alt="digital product" class="img-fluid img-thumbnail">
                <div class="card mt-3">
                    <div class="card-header py-3">
                        <h6 class="mb-0 fw-bold ">Description</h6>
                    </div>
                    <div class="card-body pt-0">
                        <p class="mb-3 ">
                            {{ $courseInfo->course->long_details }}
                        </p>
                        <div class="order-list">
                            <ul class="list-group">
                                @if($courseInfo->coursetopic)
                                @foreach($courseInfo->coursetopic as $data)
                                <li class="list-group-item d-flex flex-wrap">
                                    <span class=" fw-bold">{{ $data->module_name }}</span>
                                    <div class="ms-auto d-flex align-items-center">
                                        <span class="text-muted"><b>Class</b> {{ $data->module_class }}</span>
                                    </div>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 order-1 order-sm-1 order-md-2">
                <div class="card sticky-top">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-3">
                            <div class="dropdown">
                                <h3><strong>Price -</strong></h3>
                            </div>
                            <div class="ms-auto h4 mb-0 "><strong>BDT. {{ $courseInfo->course->course_price }}</strong></div>
                        </div>

                        <div class="mt-4 mb-3 text-success text-center">
                            <h4><strong>Join our Class</strong></h4>
                        </div>

                        <div class="mb-4 text-center">
                            <div class="d-flex align-items-center justify-content-center flex-wrap">
                                <div class="d-flex align-items-center">
                                    <strong>Contact Number : 01934-453979</strong>
                                </div>

                            </div>
                        </div>

                        <div class="list-group list-group-flush mb-4">
                            <div class="list-group-item bg-transparent d-flex align-items-center px-0">
                                <strong class="">Lessons</strong>
                                <div class="ms-auto"><i class="icofont-wall-clock "></i> {{ $courseInfo->course->course_lessons }} Hour</div>
                            </div>
                            <div class="list-group-item bg-transparent d-flex align-items-center px-0">
                                <strong class="">Length</strong>
                                <div class="ms-auto">{{ $courseInfo->course->course_length }} Class</div>
                            </div>
                        </div>
                        <div class="mt-4 mb-3 text-center">
                            <h5><strong><i>Our Teacher</i></strong></h5>
                        </div>

                        <div class="mb-4 text-center">
                            <div class="d-flex align-items-center justify-content-center flex-wrap">
                                <li class="list-group-item py-3 text-center text-md-start">
                                    <div class="d-flex align-items-center flex-column flex-sm-column flex-md-row">
                                        <div class="no-thumbnail mb-2 mb-md-0">
                                            <img class="avatar lg rounded-circle" src="{{ asset('teacher-image') . '/' . $courseInfo->teacher->teacher_image }}" alt="">
                                        </div>
                                        <div class="flex-fill ms-3 text-truncate">
                                            <h6 class="mb-0  fw-bold">{{ $courseInfo->teacher->teacher_name }}</h6>
                                            <span class="text-muted">{{ $courseInfo->teacher->teacher_designation }}</span>
                                        </div>
                                    </div>
                                </li>

                            </div>
                        </div>

                        <div class="card card-body mb-0 bg-dark">
                            <ul class="list-unstyled text-white ms-1 mb-0">
                                <li class="d-flex align-items-center pb-1"><i class="bi bi-check2-circle me-2"></i> 100% Money Back Guarantee</li>
                                <li class="d-flex align-items-center pb-1"><i class="bi bi-check2-circle  me-2"></i> 6 Months Support</li>
                                <li class="d-flex align-items-center"><i class="bi bi-check2-circle  me-2"></i>Future updates</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection