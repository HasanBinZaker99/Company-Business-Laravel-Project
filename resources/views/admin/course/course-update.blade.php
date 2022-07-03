@extends('admin.layouts.app')

@section('title')
E-Learning | Edit Teacher Details
@endsection

@section('content')

<section>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="exampleModalLiveLabel"><b>Course Information Update</b></h5>
            </div>
            <form action="{{ route('course-add.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Course Name</label>
                            <input type="text" class="form-control form-control-lg" name="course_name" value="{{ $course->course_name }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Course Price</label>
                            <input type="text" class="form-control form-control-lg" name="course_price" value="{{ $course->course_price }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Course Length</label>
                            <input type="text" class="form-control form-control-lg" name="course_length" value="{{ $course->course_length }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Course Lessons</label>
                            <input type="text" class="form-control form-control-lg" name="course_lessons" value="{{ $course->course_lessons }}">
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
                            <textarea name="long_details" class="form-control" cols="30" rows="5">{{ $course->long_details }}</textarea>
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