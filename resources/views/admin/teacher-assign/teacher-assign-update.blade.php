@extends('admin.layouts.app')

@section('title')
E-Learning | Assign Teacher Update
@endsection

@section('content')

<section>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="exampleModalLiveLabel"><b>Assign Teacher Update</b></h5>
            </div>
            <form action="{{ route('teacher-assign.update', $teacherassign->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="col-12">
                        <div class="m-2">
                            <label class="form-label"><b>BATCH NAME</b></label>
                            <select name="batch" class="form-control form-control-lg" data-style="py-0">
                                <option>Select Batch</option>
                                @foreach($batch as $item)
                                <option value="{{ $item->id }}" {{$teacherassign->batch_id == $item->id ? 'selected' : ''}}>
                                    {{ $item->batch_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="m-2">
                            <label class="form-label"><b>COURSE NAME</b></label>
                            <select name="coursedetail" id="" class="form-control">
                                <option>Select Course Name</option>
                                @foreach($coursedetail as $item)
                                <option value="{{ $item->id }}" {{$teacherassign->coursedetail_id == $item->id ? 'selected' : ''}}>
                                    {{ $item->course->course_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="m-2">
                            <label class="form-label"><b>TEACHER NAME</b></label>
                            <select name="teacher" class="form-control form-control-lg" data-style="py-0" id="teacherID">
                                <option>Select Teacher</option>
                                @foreach($teacher as $item)
                                <option value="{{ $item->id }}" {{$teacherassign->teacher_id == $item->id ? 'selected' : ''}}>
                                    {{ $item->teacher_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="m-2">
                            <label class="form-label"><b>DESIGNATION</b></label>
                            <input type="text" class="form-control form-control-lg" id="designationID" name="designation" value="{{ $teacherassign->designation }}">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-success">Update Assign Teacher</button>
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