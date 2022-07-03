@extends('admin.layouts.app')

@section('title')
E-Learning | Batch Update
@endsection

@section('content')

<section>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="exampleModalLiveLabel"><b>Batch Information Update</b></h5>
            </div>
            <form action="{{ route('batch.update', $batch->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Batch Name</label>
                            <input type="text" class="form-control form-control-lg" name="batch_name" value="{{ $batch->batch_name }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Student Capacity</label>
                            <input type="text" class="form-control form-control-lg" name="student_capacity" value="{{ $batch->student_capacity }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Batch Time</label>
                            <input type="text" class="form-control form-control-lg" name="batch_time" value="{{ $batch->batch_time }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Batch Start</label>
                            <input type="date" class="form-control form-control-lg" name="start_date" value="{{ $batch->start_date }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Batch Session</label>
                            <input type="text" class="form-control form-control-lg" name="batch_session" value="{{ $batch->batch_session }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Status</label>
                            <select name="status" id="" class="form-control">
                                @foreach($batches as $item)
                                <option value="{{ $item->id }}" {{$batch->id == $item->id ? 'selected' : ''}}>
                                    {{ $item->status }}
                                </option>
                                @endforeach
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
                    <button type="submit" class="btn btn-outline-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection