@extends('admin.layouts.app')

@section('title')
E-Learning | Settings Information Update
@endsection

@section('content')
<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row clearfix g-3">
            <div class="col-lg-7 col-md-12 flex-column">
                <div class="row row-deck g-3">
                    <div class="col-12">
                        <div class="card bg-success">
                            <div class="card-body text-white d-flex flex-column">
                                <div class="d-flex align-items-center mb-auto ">
                                    <div class="flex-fill ms-3 text-truncate">
                                        <h4 class=""><b><i>Settings Information Update</i></b> </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="row row-deck">
                        <div class="col-md-12">
                            <div class="owl-carousel owl-theme owl-carouseltwo">
                                <div class="item">
                                    <div class="card">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <div class="row g-1">
                                                    <form class="row g-1" action="{{ route('settings.update', $settings->id) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PATCH')
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Software Title</b></label>
                                                                <input type="text" name="title" class="form-control form-control-lg" value="{{ $settings->title }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Company Name</b></label>
                                                                <input type="text" name="company_name" class="form-control form-control-lg" value="{{ $settings->company_name }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Company Phone Number</b></label>
                                                                <input type="text" name="company_phone" class="form-control form-control-lg" value="{{ $settings->company_phone }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Company Email</b></label>
                                                                <input type="email" name="company_email" class="form-control form-control-lg" value="{{ $settings->company_email }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Web Link</b></label>
                                                                <input type="text" name="web_link" class="form-control form-control-lg" value="{{ $settings->web_link }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Company Logo</b></label>
                                                                <input type="file" name="company_logo" class="form-control form-control-lg">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Company Address</b></label>
                                                                <textarea name="address" id="" cols="70" rows="5">{{ $settings->address }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 text-left mt-4">
                                                            <div class="m-2">
                                                                <button type="submit" class="btn btn-outline-success">Update Settings</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Row End -->
    </div>
</div>

@endsection