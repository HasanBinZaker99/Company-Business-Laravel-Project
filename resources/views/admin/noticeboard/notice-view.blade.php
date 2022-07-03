@extends('admin.layouts.app')

@section('title')
E-Learning | Notice-Board View
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
                        <h3 class=" fw-bold flex-fill">All Notice</h3>
                        @if($user->can('Notice Board Create'))
                        <div class="dropdown px-2">
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModalLive"><i class="icofont-plus"></i> <b>Add Notice</b></button>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 py-3">
            @foreach($notice as $data)
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card">
                    <div class="lesson_name">
                        <div class="bg-primary d-flex justify-content-center align-items-center flex-column position-relative img-overlay">
                            <img src="{{ asset('notice-board') . '/' . $data->image }}" alt="course-img" class="img-fluid" width="238px" height="158px">
                            <div class="position-absolute top-50 start-50 translate-middle">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row g-2">
                            <div class="col-12">
                                <div class="d-flex align-items-center">
                                    <span class="ms-2"><b>{{ $data->short_title }}</b></span>
                                </div>
                            </div>
                            @if($user->can('Notice Board Edit'))
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <a href="{{ route('notice-board.edit', $data->id) }}" class="btn btn-outline-success">Edit Notice</a>
                                </div>
                            </div>
                            @endif
                            @if($user->can('Notice Board Delete'))
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <form action="{{ route('notice-board.destroy', [$data->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                            Delete</button>
                                    </form>
                                </div>
                            </div>
                            @endif
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
                <h5 class="modal-title text-success" id="exampleModalLiveLabel">Notice Information</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('notice-board.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control form-control-lg" name="date">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Short Title</label>
                            <textarea name="short_title" class="form-control" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Long Title</label>
                            <textarea name="long_title" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success">Add Notice</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection