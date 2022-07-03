@extends('admin.layouts.app')

@section('title')
E-Learning | Admission View
@endsection

@section('content')

@php
$user = Auth::guard('web')->user();
@endphp

<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 mb-4 no-bg">
                    <div class="card-header py-3 px-0 d-flex align-items-center justify-content-between border-bottom">
                        <h3 class=" fw-bold flex-fill">Admission Lists</h3>
                        <div class="dropdown px-2">
                            @if($user->can('Admission Create'))
                            <a href="{{ route('admission.create') }}" class="btn btn-outline-success"><b><i class="icofont-plus"></i> Admission</b></a>
                            @endif
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
                        <th>Course Name</th>
                        <th>Batch Name</th>
                        <th>Course Price</th>
                        <th>Due</th>
                        <th>Total Payment</th>
                        <th>Action</th>
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
                            <p class="fw-normal mb-1">{{ $data->course->course_name}}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->batch->batch_name}}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->course->course_price}}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1 text-danger fw-bold">{{ $data->due}}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->total_payment}}</p>
                        </td>
                        <td class="d-flex mt-3">
                            @if($user->can('Admission Show'))
                            <a href="{{ route('admission.show', $data->id) }}" class="btn btn-outline-success" title="Show"><i class="icofont-eye-alt"></i></a>&nbsp;
                            @endif
                            @if($user->can('Admission Edit'))
                            <a href="{{ route('admission.edit', $data->id) }}" class="btn btn-outline-success" title="Edit"><i class="icofont-edit"></i></a>&nbsp;
                            @endif
                            @if($user->can('Admission Delete'))
                            <form action="{{ route('admission.destroy', [$data->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger mr-2" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete">
                                    <i class="icofont-ui-delete"></i></button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection