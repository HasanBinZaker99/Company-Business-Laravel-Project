@extends('admin.layouts.app')

@section('title')
E-Learning | Email Lists
@endsection

@section('content')

<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 mb-4 no-bg">
                    <div class="card-header py-3 px-0 d-flex align-items-center justify-content-between border-bottom">
                        <h3 class="fw-bold flex-fill">Email Send</h3>
                        <div class="dropdown px-2">
                            <button type="button" class="btn btn-outline-success send-email" data-bs-toggle="modal" data-bs-target="#exampleModalLive"><b> Send Email</b></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 py-3">
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>#</th>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>
                            <input type="checkbox" class="user-checkbox" name="users[]" value="{{ $user->id }}">
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $user->id }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $user->name }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $user->email }}</p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('script')

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".send-email").click(function() {
        var selectRowsCount = $("input[class='user-checkbox']:checked").length;

        if (selectRowsCount > 0) {

            var ids = $.map($("input[class='user-checkbox']:checked"), function(c) {
                return c.value;
            });

            $.ajax({
                type: 'POST',
                url: "{{ route('student.email.send') }}",
                data: {
                    ids: ids
                },
                success: function(data) {
                    alert(data.success);
                }
            });

        } else {
            alert("Please select at least one user from list.");
        }
        // console.log(selectRowsCount);
    });
</script>

@endpush