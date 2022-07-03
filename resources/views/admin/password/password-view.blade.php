@extends('admin.layouts.app')

@section('title')
E-Learning | Password View Page
@endsection

@section('content')

<section>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="exampleModalLiveLabel"><b>Change Password</b></h5>
            </div>
            <form action="{{ route('change.password') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Current Password</label>
                            <input type="password" name="current_password" class="form-control form-control-lg">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">New Password<br><span style="color: red; font-size: 10px;">(Password must be 8 character)</span></label>
                            <input type="password" name="new_password" class="form-control form-control-lg">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Confirm Password<br><span style="color: red; font-size: 10px;">(Password must be 8 character)</span></label>
                            <input type="password" name="new_confirm_password" class="form-control form-control-lg">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-success fw-bold">Update Password</button>
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

        $('#userID').change(function(e) {

            var userID = e.target.value;
            $.ajax({

                url: "{{ route('user-info') }}",
                type: "POST",
                data: {
                    userID: userID
                },

                success: function(data) {

                    console.log(data);

                    $('#userEmail').val(data.userInfo[0].email);
                    $('#userPhone').val(data.userInfo[0].phone);

                }
            })
        });
    });
</script>

@endpush