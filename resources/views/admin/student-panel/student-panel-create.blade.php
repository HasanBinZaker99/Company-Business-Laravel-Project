@extends('admin.layouts.app')

@section('title')
E-Learning | Student Panel Create
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
            <form class="row g-1" action="{{ route('student-panel.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-8 col-md-12 flex-column">
                    <div class="row row-deck g-3">
                        <div class="col-12">
                            <div class="card bg-success">
                                <div class="card-body text-white d-flex flex-column">
                                    <div class="d-flex align-items-center mb-auto ">
                                        <div class="flex-fill ms-3 text-truncate">
                                            <h4 class=""><b><i>Student Panel Create</i></b> </h4>
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
                                                                <label class="form-label"><b>Student Name</b></label>
                                                                <select name="admission" class="form-control" data-style="py-0" id="studentID">
                                                                    <option value="">Select Student Name</option>
                                                                    @foreach($admission as $item)
                                                                    <option value="{{ $item->id }}">
                                                                        {{ $item->student_name }}
                                                                    </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" id="studentname" class="form-control" name="name" value="" readonly>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Student Phone Number</b></label>
                                                                <input type="text" id="studentphone" class="form-control" name="phone" value="" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Student Email</b></label>
                                                                <input type="email" id="studentemail" class="form-control" name="email" value="" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Password</b><br><span style="color: red; font-size: 10px;">(Password must be 8 character)</span></label>
                                                                <input type="password" class="form-control" name="password" autocomplete="new-password">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Confirmed Password</b><br><span style="color: red; font-size: 10px;">(Password must be 8 character)</span></label>
                                                                <input type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Assign Role For Student</b></label>
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
                                                                <label class="form-label"><b>Student Image</b></label>
                                                                <input type="file" class="form-control" name="image">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Designation</b></label>
                                                                <input type="text" class="form-control" name="designation">
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2">
                                                                <label class="form-label"><b>Present Address</b></label>
                                                                <textarea name="address" id="studentaddress" cols="39" rows="5" readonly></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 text-right m-2 mt-4">
                                                            <button type="submit" class="btn btn-outline-success form-control-lg"><b>Create Panel</b></button>
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


<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.selectRole').select2();
    });
</script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).ready(function() {

        $('#studentID').change(function(e) {

            var studentID = e.target.value;
            $.ajax({

                url: "{{ route('student-details') }}",
                type: "POST",
                data: {
                    studentID: studentID
                },

                success: function(data) {
                    console.log(data);

                    $('#studentname').val(data.admissiondetails[0].student_name);
                    $('#studentphone').val(data.admissiondetails[0].student_phone);
                    $('#studentemail').val(data.admissiondetails[0].student_email);
                    $('#studentaddress').val(data.admissiondetails[0].present_address);

                }
            })
        });
    });


    // Calculator for Subtotal amount

    $("#discount").change(function() {

        let discount = parseInt($("#discount").val());
        let courseprice = parseInt($("#courseprice").val());

        parseInt($("#subtotal").val(courseprice - discount));

    });

    // Calculator for Subtotal amount

    $("#totalpayment").change(function() {

        let totalpayment = parseInt($("#totalpayment").val());
        let subtotal = parseInt($("#subtotal").val());

        parseInt($("#due").val(subtotal - totalpayment));

    });
</script>


@endpush