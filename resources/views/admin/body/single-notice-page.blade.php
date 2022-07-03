@extends('admin.layouts.app')

@section('title')
E-Learning | Single Notice Page
@endsection

@section('content')

<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row g-3 py-3">
            <div class="col-lg-8 col-md-8 order-2 order-sm-2 order-md-1">
                <a href="#" title="course-img">
                    <img src="{{ asset('notice-board') . '/' . $singlenotice->image }}" alt="digital product" class="img-fluid img-thumbnail">
                </a>
                <div class="card mt-3">
                    <div class="card-header py-3">
                        <h6 class="mb-0 fw-bold ">Description of Notice</h6>
                    </div>
                    <div class="card-body pt-0">
                        <p class="mb-3 ">
                            {{ $singlenotice->long_title }}
                        </p>
                    </div>
                    <div class="card-body pt-0">
                        <div class="d-flex align-items-center justify-content-between">
                            <small class="text-muted"><b>Post:</b> {{ $singlenotice->date }}</small> &nbsp; &nbsp; <small class="text-muted"><b>Post By:</b> {{ $singlenotice->user->name }}</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection