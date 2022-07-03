@extends('admin.layouts.app')

@section('title')
E-Learning | Profile
@endsection

@section('content')

<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row g-3">
            <div class="col-xl-8 col-lg-12 col-md-12">
                <div class="card teacher-card  mb-3">
                    <div class="card-body p-4 d-flex teacher-fulldeatil">
                        <div class="profile-teacher pe-xl-4 pe-md-2 pe-sm-4 pe-4 text-center w220">
                            <a href="#">
                                <img src="{{ asset('profile-image') . '/' . Auth::user()->image }}" alt="" class="avatar xl rounded-circle img-thumbnail shadow-sm">
                            </a>
                        </div>
                        <div class="teacher-info border-start ps-xl-4 ps-md-2 ps-sm-4 ps-4 w-100">
                            <h6 class="mb-0 mt-2  fw-bold">{{ Auth::user()->name }}</h6>
                            <span class="text-uppercase small text-muted">{{ Auth::user()->designation }}</span>

                            <div class="mt-3 pt-3 border-top">

                                <div class="d-block">
                                    <i class="icofont-phone-circle text-success"></i> <b>Phone: </b>{{ Auth::user()->phone }}
                                </div>
                                <div class="d-block">
                                    <i class="icofont-ui-email text-success"></i> <b>Email: </b>{{ Auth::user()->email }}
                                </div>
                                <div class="d-block">
                                    <i class="icofont-address-book text-success"></i> <b>Address: </b>{{ Auth::user()->address }}
                                </div>
                                <!-- <button type="button" class="btn btn-success"><i class="icofont-user-alt-4 color-defult-white"></i></button> -->

                            </div>
                            <ul class="social mb-0 list-inline d-flex mt-3">
                                <li><a href="#" class="avatar btn btn-link"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href="#" class="avatar btn btn-link"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="avatar btn btn-link"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#" class="avatar btn btn-link"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-12 col-md-12">
                <div class="card mb-3">
                    <div class="card-header py-3">
                        <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModalLive">Update Profile</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalLive" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="exampleModalLiveLabel">Profile Update</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Name</label>
                            <input type="text" class="form-control form-control-lg" name="name" value="{{ Auth::user()->name }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control form-control-lg" name="email" value="{{ Auth::user()->email }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Phone Number</label>
                            <input type="number" class="form-control form-control-lg" name="phone" value="{{ Auth::user()->phone }}">
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
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-control" cols="30" rows="5">{{ Auth::user()->address }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection