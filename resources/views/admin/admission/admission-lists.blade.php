@extends('admin.layouts.app')

@section('title')
E-Learning | Admission Lists
@endsection

@section('content')

<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 mb-4 no-bg">
                    <div class="card-header py-3 px-0 d-flex align-items-center justify-content-between border-bottom">
                        <h3 class=" fw-bold flex-fill">Admission Lists</h3>
                        <div class="dropdown px-2">
                            <!-- <a href="{{ route('admission.create') }}" class="btn btn-outline-success"><b><i class="icofont-plus"></i> Admission</b></a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 py-3">
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>SL</th>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Phone Number</th>
                        <th>Email</th>
                        <th>Course Name</th>
                        <th>Course Price</th>
                        <th>Batch Name</th>
                        <th>Batch Start</th>
                        <th>Course Price</th>
                        <th>Due</th>
                        <th>Total Payment</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 0;
                    @endphp
                    @foreach($admission as $data)
                    <tr>
                        <td>
                            <p class="fw-normal mb-1">{{ ++$i }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->studentID }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->student_name}}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->student_phone}}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->student_email}}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->course->course_name}}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->course->course_price}}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->batch->batch_name}}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->batch->start_date}}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->course->course_price}}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->due}}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->total_payment}}</p>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection