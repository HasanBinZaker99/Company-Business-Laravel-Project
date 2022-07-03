@extends('admin.layouts.app')

@section('title')
E-Learning | User Create Page
@endsection

@section('content')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .form-style {
        min-height: calc(1.5em + 1rem + 2px);
        padding: 0.5rem 1rem;
        font-size: 1.25rem;
        border-radius: 0.3rem;
    }
</style>
@endpush

<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row clearfix g-3">
            <div class="col-lg-12 col-md-12 flex-column">
                <div class="row row-deck g-3">
                    @if ($errors->any())
                    <div class="alert alert-danger d-inline">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <div class="col-12">
                        <div class="card bg-info">
                            <div class="card-body text-white d-flex flex-column">
                                <div class="d-flex align-items-center mb-auto ">
                                    <div class="flex-fill ms-3 text-truncate">
                                        <h4 class=""><b><i>User Create</i></b> </h4>
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
                                                <form class="row g-1" action="{{ route('user-create.store') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row g-1">
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>User Name</b></label>
                                                                <input type="text" class="form-control" name="name" placeholder="User Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>User Email</b></label>
                                                                <input type="email" class="form-control" name="email" placeholder="User Email">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2"><b>Password</b><br><span style="color: red; font-size: 10px;">(Password must be 8 character)</span></label>
                                                                <input type="password" class="form-control" placeholder="Enter Password" name="password" placeholder="Enter Password">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Confirm Password</b><br><span style="color: red; font-size: 10px;">(Password must be 8 character)</span></label>
                                                                <input type="password" class="form-control" placeholder="Enter Confirm Password" name="password_confirmation">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>User Phone</b></label>
                                                                <input type="text" class="form-control" name="phone" placeholder="User Phone">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>User Image</b></label>
                                                                <input type="file" class="form-control" name="image">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>User Designation</b></label>
                                                                <input type="text" class="form-control" name="designation" placeholder="User Designation">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Assign Role For User</b></label>
                                                                <select name="roles[]" class="form-control selectRole" data-style="py-0" multiple>
                                                                    <option>Select Role</option>
                                                                    @foreach($roles as $item)
                                                                    <option value="{{ $item->name }}">
                                                                        {{ $item->name }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>User Address</b></label>
                                                                <textarea name="address" class="form-control" cols="60" rows="5" placeholder="Address"></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 text-right m-2 mt-4">
                                                            <button type="submit" class="btn btn-outline-success"><b>Create User</b></button>
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
        </div><!-- Row End -->
    </div>
</div>

@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.selectRole').select2();
    });
</script>
@endpush