@extends('admin.layouts.app')

@section('title')
E-Learning | Assign Teacher
@endsection

@section('content')

<section>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="exampleModalLiveLabel"><b>Assign Teacher</b></h5>
            </div>
            <form action="{{ route('teacher-assign.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Batch Name</label>
                            <select name="batch" id="" class="form-control">
                                <option>Select Batch</option>
                                @foreach($batch as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->batch_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Course Name</label>
                            <select name="coursedetail" id="" class="form-control">
                                <option>Select Course Name</option>
                                @foreach($coursedetail as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->course->course_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Teacher Name</label>
                            <select name="teacher" id="teacherID" class="form-control">
                                <option>Select Teacher</option>
                                @foreach($teacher as $item)
                                <option value="{{ $item->id }}">
                                    {{ $item->teacher_name }} - {{ $item->designation->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Designation</label>
                            <input type="text" class="form-control form-control-lg" id="designationID" name="designation" value="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-success">Assign Teacher</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection


@push('script')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {

        $('#teacherID').change(function(e) {

            var teacherID = e.target.value;
            $.ajax({

                url: "{{ route('teacher-designation') }}",
                type: "POST",
                data: {
                    teacherID: teacherID
                },

                success: function(data) {

                    $('#designationID').val(data.teacherdegination[0].designation.name);

                }
            })
        });
    });
</script>

@endpush