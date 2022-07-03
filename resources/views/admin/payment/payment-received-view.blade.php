@extends('admin.layouts.app')

@section('title')
E-Learning | Payment Received
@endsection

@section('content')

<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row clearfix g-3">
            <form class="row g-1" action="{{ route('admission.store') }}" method="POST">
                @csrf
                <div class="col-lg-7 col-md-12 flex-column">
                    <div class="row row-deck g-3">
                        <div class="col-12">
                            <div class="card bg-success">
                                <div class="card-body text-white d-flex flex-column">
                                    <div class="d-flex align-items-center mb-auto ">
                                        <div class="flex-fill ms-3 text-truncate">
                                            <h4 class=""><b><i>Students Payment Received</i></b> </h4>
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
                                                                <label class="form-label"><b>Student ID</b></label>
                                                                <select name="studentID" class="form-control form-control-lg selectpicker" data-live-search="true" data-style="py-0" id="studentID">
                                                                    <option value="">Select Student ID</option>
                                                                    @foreach($admission as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->studentID }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Student Name</b></label>
                                                                <input type="text" id="studentname" class="form-control form-control-lg" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Admission Date</b></label>
                                                                <input type="date" id="date" class="form-control form-control-lg" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Course Name</b></label>
                                                                <input type="text" id="course" class="form-control form-control-lg" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Batch Name</b></label>
                                                                <input type="text" id="batch" class="form-control form-control-lg" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Student Email</b></label>
                                                                <input type="email" id="email" class="form-control form-control-lg" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Student Phone Number</b></label>
                                                                <input type="number" id="phone" class="form-control form-control-lg" readonly>
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
                                                                    <input type="text" id="courseprice" class="form-control form-control-lg text-success fw-bold" name="course_price" value="" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="m-2">
                                                                    <label class="form-label"><b>Discount (BDT)</b></label>
                                                                    <input type="text" id="discount" class="form-control form-control-lg" name="discount" value="" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="m-2">
                                                                    <label class="form-label"><b>Payment (BDT)</b></label>
                                                                    <input type="text" id="totalpayment" class="form-control form-control-lg" name="total_payment" value="" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="m-2">
                                                                    <label class="form-label"><b>Due (BDT)</b></label>
                                                                    <input type="text" id="due" class="form-control form-control-lg text-danger fw-bold" name="due" value="" readonly>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="m-2">
                                                                    <label class="form-label"><b>Received Amount (BDT)</b></label>
                                                                    <input type="text" id="receivedamount" class="form-control form-control-lg" value="">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 text-right m-2 mt-4">
                                                                <button type="submit" class="btn btn-outline-success form-control-lg"><b>Received Amount</b></button>
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

        $('#studentID').change(function(e) {

            var admissionID = e.target.value;
            $.ajax({

                url: "{{ route('admission-details') }}",
                type: "POST",
                data: {
                    admissionID: admissionID
                },

                success: function(data) {

                    console.log(data);

                    $('#studentname').val(data.admissionID[0].student_name);
                    $('#date').val(data.admissionID[0].date);
                    $('#course').val(data.admissionID[0].course.course_name);
                    $('#batch').val(data.admissionID[0].batch.batch_name);
                    $('#email').val(data.admissionID[0].student_email);
                    $('#phone').val(data.admissionID[0].student_phone);
                    $('#courseprice').val(data.admissionID[0].course_price);
                    $('#discount').val(data.admissionID[0].discount);
                    $('#due').val(data.admissionID[0].due);
                    $('#totalpayment').val(data.admissionID[0].total_payment);

                }
            })
        });
    });

    // Calculator for Received amount

    $("#receivedamount").change(function() {

        let receivedamount = parseInt($("#receivedamount").val());
        let totalpayment = parseInt($("#totalpayment").val());
        let due = parseInt($("#due").val());

        parseInt($("#totalpayment").val(totalpayment + receivedamount));
        parseInt($("#due").val(due - receivedamount));

    });
</script>

@endpush