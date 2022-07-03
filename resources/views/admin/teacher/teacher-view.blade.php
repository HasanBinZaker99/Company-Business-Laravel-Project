@extends('admin.layouts.app')

@section('title')
E-Learning | Teacher
@endsection

@section('content')

@php

use App\Models\Designation;

$user = Auth::guard('web')->user();
$designation = Designation::all();

@endphp


<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 mb-4 no-bg">
                    <div class="card-header py-3 px-0 d-flex align-items-center justify-content-between border-bottom">
                        <h3 class=" fw-bold flex-fill mb-0">Teachers</h3>
                        <div class="dropdown px-2">
                            @if($user->can('Teacher Create'))
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModalLive"><b><i class="icofont-plus"></i> Add Teacher</b></button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 row-cols-1 row-cols-sm-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-3 row-deck py-3">
            @foreach($teacher as $data)
            <div class="col">
                <div class="card teacher-card">
                    <div class="card-body p-4 d-flex">
                        <div class="profile-teacher pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
                            <a href="teachers-info.html">
                                <img src="{{ asset('teacher-image') . '/' . $data->teacher_image }}" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                            </a>
                            <div class="about-info d-flex align-items-center mt-3 justify-content-center">
                                <div class="d-flex me-2">
                                    <p><b>Skills:</b></p>
                                    <span class="">{{ $data->teacher_skill }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="teacher-info border-start ps-xl-4 ps-md-2 ps-sm-4 ps-4 w-100">
                            <span class="mb-0 mt-2 fw-bold d-block fs-6">{{ $data->teacher_name }}</span>
                            <span class="text-uppercase small text-muted ">{{ $data->designation->name }}</span>
                            <div class="video-setting-icon mt-3 pt-3 border-top">
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    @if($user->can('Teacher Edit'))
                                    <a href="{{ route('teacher.edit', $data->id) }}" class="btn btn-outline-success">Edit</a>&nbsp;
                                    @endif
                                    @if($user->can('Teacher Delete'))
                                    <form action="{{ route('teacher.destroy', [$data->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                            Delete</button>
                                    </form>
                                    @endif
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

<!-- Modal -->
<div class="modal fade" id="exampleModalLive" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="exampleModalLiveLabel">Teacher Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('teacher.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Teacher Name</label>
                            <input type="text" class="form-control form-control-lg" name="teacher_name">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Teacher Designation</label>
                            <select name="teacher_designation" id="" class="form-control form-control-lg">
                                <option value="">Select Designation</option>
                                @foreach($designation as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Teacher Email</label>
                            <input type="email" class="form-control form-control-lg" name="teacher_email">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Teacher Phone Number</label>
                            <input type="number" class="form-control form-control-lg" name="teacher_phone">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Teacher Image</label>
                            <input type="file" class="form-control" name="teacher_image">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">About Teacher</label>
                            <textarea name="teacher_about" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Teacher Skills</label>
                            <textarea name="teacher_skill" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Address</label>
                            <textarea name="teacher_address" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success">Add Teacher</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection