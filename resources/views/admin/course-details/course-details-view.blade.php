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
                        @if($user->can('Course Details Create'))
                        <div class="dropdown px-2">
                            <a href="{{ route('course-details.create') }}" class="btn btn-outline-success"><b><i class="icofont-plus"></i> Add Course Module</b></a>
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
                        <th>Teacher Name</th>
                        <th>Course Price</th>
                        <th>Course Lessons</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courseDetails as $data)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('course-image') . '/' . $data->course->course_image }}" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                            </div>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->course->course_name }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->teacher->teacher_name }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">BDT. {{ $data->course->course_price }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->course->course_lessons }}</p>
                        </td>
                        <td class="d-flex mt-3">
                            @if($user->can('Course Details Show'))
                            <a href="{{ route('course-details.show', $data->id) }}" class="btn btn-outline-success" title="Show"><i class="icofont-eye-alt"></i></a>&nbsp;
                            @endif
                            @if($user->can('Course Details Edit'))
                            <a href="{{ route('course-details.edit', $data->id) }}" class="btn btn-outline-success" title="Edit"><i class="icofont-edit"></i></a>&nbsp;
                            @endif
                            @if($user->can('Course Details Delete'))
                            <form action="{{ route('course-details.destroy', [$data->id]) }}" method="POST">
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

@endsection