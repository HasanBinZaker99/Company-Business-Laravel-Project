@extends('admin.layouts.app')

@section('title')
E-Learning | Batch Lists View
@endsection

@section('content')

<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 mb-4 no-bg">
                    <div class="card-header py-3 px-0 d-flex align-items-center justify-content-between border-bottom">
                        <h3 class=" fw-bold flex-fill">Batch Lists</h3>
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
                        <th>Course Name</th>
                        <th>Assign Teacher</th>
                        <th>Designation</th>
                        <th>Student Capacity</th>
                        <th>Student Enroll</th>
                        <th>Batch Time</th>
                        <th>Batch Start</th>
                        <th>Status</th>
                        <th>Batch Session</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 0;
                    @endphp
                    @foreach($batchlist as $data)
                    <!-- @dump($data->teacherassign[0]->teacher->teacher_name) -->
                    <tr>
                        <td>
                            <p class="fw-normal mb-1">{{ ++$i }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->batchID }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->batch_name }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->teacherassign[0]->coursedetail->course->course_name }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->teacherassign[0]->teacher->teacher_name }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->teacherassign[0]->designation }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->student_capacity }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->admission_count }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->batch_time }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->start_date }}</p>
                        </td>
                        <td>
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
                        <td>
                            <p class="fw-normal mb-1">{{ $data->batch_session }}</p>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection