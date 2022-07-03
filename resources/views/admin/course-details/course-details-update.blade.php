@extends('admin.layouts.app')

@section('title')
E-Learning | Course Details Update
@endsection

@section('content')

<div class="modal-content">
    <div class="modal-body">
        <form class="row g-1 p-0 p-4" action="{{ route('course-details.update', $courseDetails->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <div class="col-12 text-center mb-3">
                <h5 class="modal-title text-success" id="exampleModalLiveLabel"><b>Course Details Update</b></h5>
            </div>
            <hr>
            <div class="col-6">
                <div class="m-2">
                    <label class="form-label"><b>COURSE NAME</b></label>
                    <select name="course_id" class="form-control form-control-lg" data-style="py-0" id="courseId">
                        <option>Select Course</option>
                        @foreach($course as $item)
                        <option value="{{ $item->id }}" {{$courseDetails->course_id == $item->id ? 'selected' : ''}}>
                            {{ $item->course_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="m-2">
                    <label class="form-label"><b>TEACHER NAME</b></label>
                    <select name="teacher_id" class="form-control form-control-lg" data-style="py-0" id="teacherId">
                        <option>Select Teacher</option>
                        @foreach($teacher as $item)
                        <option value="{{ $item->id }}" {{$courseDetails->teacher_id == $item->id ? 'selected' : ''}}>
                            {{ $item->teacher_name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12">
                <div class="col-12">
                    <table class="table" id="dynamicTable">
                        <tr>
                            <th></th>
                            <th>Module Name</th>
                            <th>Module Class</th>
                        </tr>
                        @if($courseDetails->coursetopic)
                        @foreach($courseDetails->coursetopic as $data)
                        <tr>
                            <td><input type="hidden" name="module[]" value="{{ $data->id }}" /></td>
                            <td><input type="text" name="module_name[]" value="{{ $data->module_name }}" class="form-control form-control-lg" /></td>
                            <td><input type="text" name="module_class[]" value="{{ $data->module_class }}" class="form-control form-control-lg" /></td>
                            <!-- <td><button type="button" id="addModule" class="btn btn-outline-success">Add More</button></td> -->
                            @if($courseDetails->coursetopic->first()->id == $data->id)
                            <td><button type="button" name="add" id="addModule" class="btn btn-outline-success">Add More</button></td>
                            @endif
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
            <div class="col-12 text-left mt-4">
                <button type="submit" class="btn btn-outline-success">Update Course</button>
            </div>
        </form>
    </div>
</div>

@endsection

@push('script')

<script>
    $("#addModule").click(function() {

        $("#dynamicTable").append(
            `<tr>
				<td><input type="hidden" name="module[]" value="{{ $data->id }}" /></td>
				<td><input type="text" name="module_name[]" placeholder="Enter Module Name" class="form-control form-control-lg" /></td>
				<td><input type="text" name="module_class[]" placeholder="Enter Module Class" class="form-control form-control-lg" /></td>
				<td><button type="button" class="btn btn-outline-danger remove-tr">Remove</button></td>
			</tr>
				`);
    });

    $(document).on('click', '.remove-tr', function() {
        $(this).parents('tr').remove();
    });
</script>

@endpush