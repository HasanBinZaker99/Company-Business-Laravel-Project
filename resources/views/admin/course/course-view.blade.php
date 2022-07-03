@extends('admin.layouts.app')

@section('title')
E-Learning | Course Details
@endsection

@section('content')

@php
$user = Auth::guard('web')->user();
@endphp

<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 mb-4 no-bg">
                    <div class="card-header py-3 px-0 d-flex align-items-center justify-content-between border-bottom">
                        <h3 class=" fw-bold flex-fill">Courses Add</h3>
                        @if($user->can('Course Create'))
                        <div class="dropdown px-2">
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModalLive"><b><i class="icofont-plus"></i> Add Course</b></button>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 py-3">
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>Image</th>
                        <th>Course Name</th>
                        <th>Course Price</th>
                        <th>Course Length</th>
                        <th>Course Lessons</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($course as $data)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('course-image') . '/' . $data->course_image }}" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                            </div>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->course_name }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">BDT. {{ $data->course_price }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->course_length }} Hour</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->course_lessons }}</p>
                        </td>
                        <td class="about-info d-flex mt-3">
                            @if($user->can('Course Edit'))
                            <a href="{{ route('course-add.edit', $data->id) }}" class="btn btn-outline-success" title="Edit"><i class="icofont-edit"></i></a>&nbsp;
                            @endif
                            @if($user->can('Course Delete'))
                            <form action="{{ route('course-add.destroy', [$data->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger mr-2" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete">
                                    <i class="icofont-ui-delete"></i></button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModalLive" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="exampleModalLiveLabel">Course Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('course-add.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Course Name</label>
                            <input type="text" class="form-control form-control-lg" name="course_name">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Course Price</label>
                            <input type="text" class="form-control form-control-lg" name="course_price">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Course Length</label>
                            <input type="text" class="form-control form-control-lg" name="course_length">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Course Lessons</label>
                            <input type="text" class="form-control form-control-lg" name="course_lessons">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="course_image">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">About Course</label>
                            <textarea name="long_details" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success">Add Course</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection