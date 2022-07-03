@extends('admin.layouts.app')

@section('title')
E-Learning | Edit Teacher Details
@endsection

@section('content')

<section>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="exampleModalLiveLabel"><b>Teacher Details Update</b></h5>
            </div>
            <form action="{{ route('teacher.update', $teacher->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label"><b>Teacher Name</b></label>
                            <input type="text" class="form-control form-control-lg" name="teacher_name" value="{{ $teacher->teacher_name }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label"><b>Teacher Email</b></label>
                            <input type="email" class="form-control form-control-lg" name="teacher_email" value="{{ $teacher->teacher_email }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label"><b>Teacher Phone Number</b></label>
                            <input type="number" class="form-control form-control-lg" name="teacher_phone" value="{{ $teacher->teacher_phone }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Teacher Designation</label>
                            <select name="teacher_designation" id="" class="form-control form-control-lg">
                                <option value="">Select Designation</option>
                                @foreach($designation as $item)
                                <option value="{{ $item->id }}" {{$teacher->designation_id == $item->id ? 'selected' : ''}}>
                                    {{ $item->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label"><b>Teacher Image</b></label>
                            <input type="file" class="form-control" name="teacher_image">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label"><b>About Teacher</b></label>
                            <textarea name="teacher_about" class="form-control" cols="30" rows="5">{{ $teacher->teacher_about }}</textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label"><b>Teacher Skills</b></label>
                            <textarea name="teacher_skill" class="form-control" cols="30" rows="5">{{ $teacher->teacher_skill }}</textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label"><b>Address</b></label>
                            <textarea name="teacher_address" class="form-control" cols="30" rows="5">{{ $teacher->teacher_address }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection