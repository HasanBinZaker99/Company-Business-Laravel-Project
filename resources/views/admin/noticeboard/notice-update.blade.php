@extends('admin.layouts.app')

@section('title')
E-Learning | Notice-Board Update
@endsection

@section('content')

<section>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-success" id="exampleModalLiveLabel"><b>Notice-board Information Update</b></h5>
            </div>
            <form action="{{ route('notice-board.update', $notice->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="modal-body">
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Date</label>
                            <input type="date" class="form-control form-control-lg" name="date" value="{{ $notice->date }}">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Short Title</label>
                            <textarea name="short_title" class="form-control" cols="30" rows="3">{{ $notice->short_title }}</textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Long Title</label>
                            <textarea name="long_title" class="form-control" cols="30" rows="5">{{ $notice->long_title }}</textarea>
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