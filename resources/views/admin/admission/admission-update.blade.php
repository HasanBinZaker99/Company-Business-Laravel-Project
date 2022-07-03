@extends('admin.layouts.app')

@section('title')
E-Learning | Student Admission Form Update
@endsection

@section('content')

<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row clearfix g-3">
            <form class="row g-1" action="{{ route('admission.update', $admission->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="col-lg-7 col-md-12 flex-column">
                    <div class="row row-deck g-3">
                        <div class="col-12">
                            <div class="card bg-success">
                                <div class="card-body text-white d-flex flex-column">
                                    <div class="d-flex align-items-center mb-auto ">
                                        <div class="flex-fill ms-3 text-truncate">
                                            <h4 class=""><b><i>Admission Form Update</i></b> </h4>
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
                                                        <div class="col-12">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Admission Date</b></label>
                                                                <input type="date" class="form-control form-control-lg" name="admission_date" value="{{ $admission->date }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Course Name</b></label>
                                                                <select name="course" class="form-control form-control-lg" data-style="py-0" id="courseID">
                                                                    <option value="">Select Course Name</option>
                                                                    @foreach($course as $item)
                                                                    <option value="{{ $item->id }}" {{ $admission->course_id == $item->id ? 'selected' : '' }}>
                                                                        {{ $item->course_name }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Batch Name</b></label>
                                                                <select name="batch" class="form-control form-control-lg" data-style="py-0" id="batchID">
                                                                    <option value="">Select Batch Name</option>
                                                                    @foreach($batch as $item)
                                                                    <option value="{{ $item->id }}" {{ $admission->batch_id == $item->id ? 'selected' : '' }}>
                                                                        {{ $item->batch_name }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Student Name</b></label>
                                                                <input type="text" class="form-control form-control-lg" name="student_name" value="{{ $admission->student_name }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Student Email</b></label>
                                                                <input type="email" class="form-control form-control-lg" name="student_email" value="{{ $admission->student_email }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Student Phone Number</b></label>
                                                                <input type="number" class="form-control form-control-lg" name="student_phone" value="{{ $admission->student_phone }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Emergency Phone Number</b></label>
                                                                <input type="number" class="form-control form-control-lg" name="emergency_phone" value="{{ $admission->emergency_phone }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Gender</b></label><br>
                                                                <input type="radio" id="Male" name="gender" value="Male" {{ $admission->gender == 'Male' ? 'checked' : ''}}>
                                                                <label for="Male"> <b>Male</b></label>&nbsp;&nbsp;
                                                                <input type="radio" id="Female" name="gender" value="Female" {{ $admission->gender == 'Female' ? 'checked' : ''}}>
                                                                <label for="Female"> <b>Female</b></label>&nbsp;&nbsp;
                                                                <input type="radio" id="other" name="gender" value="Other" {{ $admission->gender == 'Other' ? 'checked' : ''}}>
                                                                <label for="other"> <b>Other</b></label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Relation with (Emergency Number)</b></label>
                                                                <input type="text" class="form-control form-control-lg" name="relationwith_emergency_phone" value="{{ $admission->relationwith_emergency_phone }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Name of (Relation Status)</b></label>
                                                                <input type="text" class="form-control form-control-lg" name="name_ofrelation_number" value="{{ $admission->name_ofrelation_number }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Religion</b></label>
                                                                <input type="text" class="form-control form-control-lg" name="religion" value="{{ $admission->religion }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Blood Group</b></label>
                                                                <input type="text" class="form-control form-control-lg" name="blood_group" value="{{ $admission->blood_group }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>NID/Birth Registration Number</b></label>
                                                                <input type="text" class="form-control form-control-lg" name="nid" value="{{ $admission->nid }}">
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Present Address</b></label>
                                                                <textarea name="present_address" id="" cols="70" rows="5">{{ $admission->present_address }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Permanent Address</b></label>
                                                                <textarea name="permanent_address" id="" cols="70" rows="5">{{ $admission->permanent_address }}</textarea>
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
                    </div>
                </div>
                <div class="col-lg-5 col-md-12">
                    <div class="card mb-3 color-bg-200">
                        <div class="card-body">
                            <div class="daily_practice">
                                <h5 class="mb-3 fw-bold text-success"><u><b>Payment Section</b></u></h5>
                                <div class="row g-2">
                                    <div class="card line-lightblue mb-3">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="row g-1">
                                                            <div class="col-6">
                                                                <div class="m-2">
                                                                    <label class="form-label"><b>Course Price (BDT)</b></label>
                                                                    <input type="text" id="courseprice" class="form-control form-control-lg text-success fw-bold" name="course_price" value="{{ $admission->course_price }}" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="m-2">
                                                                    <label class="form-label"><b>Discount (BDT)</b></label>
                                                                    <input type="text" id="discount" class="form-control form-control-lg" name="discount" value="{{ $admission->discount }}" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="m-2">
                                                                    <label class="form-label"><b>Payment (BDT)</b></label>
                                                                    <input type="text" id="totalpayment" class="form-control form-control-lg" name="total_payment" value="{{ $admission->total_payment }}" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="m-2">
                                                                    <label class="form-label"><b>Due (BDT)</b></label>
                                                                    <input type="text" id="due" class="form-control form-control-lg text-danger fw-bold" name="due" value="{{ $admission->due }}" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="m-2">
                                                                    <label class="form-label"><b>Received Amount (BDT)</b></label>
                                                                    <input type="text" id="receivedamount" class="form-control form-control-lg" value="" {{ ($admission->due == 0) ? 'readonly' : ''}}>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 text-right m-2 mt-4">
                                                                <button type="submit" class="btn btn-outline-success form-control-lg"><b>Update Form</b></button>
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
                    </div>
                </div>
            </form>
        </div><!-- Row End -->
    </div>
</div>

@endsection


@push('script')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {

        $('#courseID').change(function(e) {

            var courseID = e.target.value;
            $.ajax({

                url: "{{ route('course-info') }}",
                type: "POST",
                data: {
                    courseID: courseID
                },

                success: function(data) {
                    // console.log(data);

                    $('#courseprice').val(data.coursedetails[0].course_price);

                }
            })
        });
    });


    // Calculator for Due Amount

    $("#receivedamount").change(function() {

        let receivedamount = parseInt($("#receivedamount").val());
        let due = parseInt($("#due").val());
        let totalpayment = parseInt($("#totalpayment").val());

        parseInt($("#totalpayment").val(receivedamount + totalpayment));
        parseInt($("#due").val(due - receivedamount));

    });
</script>

@endpush