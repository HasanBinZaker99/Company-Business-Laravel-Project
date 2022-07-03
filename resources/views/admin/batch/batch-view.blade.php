@extends('admin.layouts.app')

@section('title')
E-Learning | Batch Details View
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
                        <h3 class=" fw-bold flex-fill">Batch Create</h3>
                        <div class="dropdown px-2">
                            @if($user->can('Batch Create'))
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#exampleModalLive"><b><i class="icofont-plus"></i> Add Batch</b></button>
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
                        <th>Batch ID</th>
                        <th>Batch Name</th>
                        <th>Student Capacity</th>
                        <th>Batch Time</th>
                        <th>Batch Start</th>
                        <th>Batch Session</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 0;
                    @endphp
                    @foreach($batch as $data)
                    <tr>
                        <td>
                            <p class="fw-normal mb-1">{{ ++$i }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">#{{ $data->batchID }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->batch_name }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->student_capacity }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->batch_time }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->start_date }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->batch_session }}</p>
                        </td>
                        <td>
                            <!-- <p class="fw-normal mb-1">{{ $data->status }}</p> -->
                            <div class="
                            <?php if ($data->status === 'Upcoming') { ?>
                                text-info
                                <?php } elseif ($data->status === 'Runing') { ?>
                                    text-success
                                    <?php } elseif ($data->status === 'Complete') { ?>
                                        text-danger
                                        <?php } elseif ($data->status === 'Full') { ?>
                                            text-dark
                                            <?php } ?>
                            "><b>{{ $data->status }}</b></div>
                        </td>
                        <td class="about-info d-flex mt-3">
                            @if($user->can('Batch Edit'))
                            <a href="{{ route('batch.edit', $data->id) }}" class="btn btn-outline-success" title="Edit"><i class="icofont-edit"></i></a>&nbsp;
                            @endif
                            @if($user->can('Batch Delete'))
                            <form action="{{ route('batch.destroy', [$data->id]) }}" method="POST">
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

<!-- Modal -->
<div class="modal fade" id="exampleModalLive" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="exampleModalLiveLabel">Batch Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('batch.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Batch Name</label>
                            <input type="text" class="form-control form-control-lg" name="batch_name">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Student Capacity</label>
                            <input type="text" class="form-control form-control-lg" name="student_capacity">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Batch Time</label>
                            <input type="text" class="form-control form-control-lg" name="batch_time">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Batch Start</label>
                            <input type="date" class="form-control form-control-lg" name="start_date">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Batch Session</label>
                            <input type="text" class="form-control form-control-lg" name="batch_session">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Status</label>
                            <select name="status" id="" class="form-control">
                                <option>Select Status</option>
                                <option value="Upcoming">Upcoming</option>
                                <option value="Runing">Runing</option>
                                <option value="Complete">Complete</option>
                                <option value="Full">Full</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-outline-success">Batch Create</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection