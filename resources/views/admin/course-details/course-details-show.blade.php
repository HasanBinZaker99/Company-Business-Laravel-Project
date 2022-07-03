@extends('admin.layouts.app')

@section('title')
E-Learning | Course Details Show
@endsection

@section('content')
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row g-3 py-3">
            <div class="col-lg-8 col-md-8 order-2 order-sm-2 order-md-1">
                <img src="{{ asset('course-image') . '/' . $courseDetails->course->course_image }}" alt="digital product" class="img-fluid img-thumbnail">
                <div class="card mt-3">
                    <div class="card-header py-3">
                        <h6 class="mb-0 fw-bold ">Description</h6>
                    </div>
                    <div class="card-body pt-0">
                        <p class="mb-3 ">
                            {{ $courseDetails->course->long_details }}
                        </p>
                        <div class="order-list">
                            <ul class="list-group">
                                @if($courseDetails->coursetopic)
                                @foreach($courseDetails->coursetopic as $data)
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
                            <div class="ms-auto h4 mb-0 "><strong>BDT. {{ $courseDetails->course->course_price }}</strong></div>
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
                                <div class="ms-auto">{{ $courseDetails->course->course_lessons }} Hour</div>
                            </div>
                            <div class="list-group-item bg-transparent d-flex align-items-center px-0">
                                <strong class="">Length</strong>
                                <div class="ms-auto">{{ $courseDetails->course->course_length }} Class</div>
                            </div>
                            <!-- <div class="list-group-item bg-transparent d-flex align-items-center px-0">
                                <strong class="">Students</strong>
                                <div class="ms-auto">100</div>
                            </div> -->
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