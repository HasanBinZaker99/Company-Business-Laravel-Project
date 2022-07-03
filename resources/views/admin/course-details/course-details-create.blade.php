@extends('admin.layouts.app')

@section('title')
E-Learning | Course Details
@endsection

@section('content')
<div class="modal-content">
    <div class="modal-body">
        <form class="row g-1 p-0 p-4" action="{{ route('course-details.store') }}" method="POST">
            @csrf
            <div class="col-12 text-center mb-3">
                <h5 class="modal-title text-success" id="exampleModalLiveLabel"><b>Course Details</b></h5>
            </div>
            <hr>
            <div class="col-6">
                <div class="m-2">
                    <label class="form-label"><b>COURSE NAME</b></label>
                    <select name="course_id" class="form-control form-control-lg" data-style="py-0" id="courseId">
                        <option>Select Course</option>
                        @foreach($course as $item)
                        <option value="{{ $item->id }}">
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
                        <option value="{{ $item->id }}">
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
                            <th>Module Name</th>
                            <th>Module Class</th>
                        </tr>
                        <tr>
                            <td><input type="text" name="module_name[]" placeholder="Enter Module Name" class="form-control form-control-lg" /></td>
                            <td><input type="text" name="module_class[]" placeholder="Enter Module Class" class="form-control form-control-lg" /></td>
                            <td><button type="button" id="addModule" class="btn btn-outline-success">Add More</button></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="col-12 text-center mt-4">
                <button type="submit" class="btn btn-outline-success">Add Course</button>
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