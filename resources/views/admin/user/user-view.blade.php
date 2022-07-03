@extends('admin.layouts.app')

@section('title')
E-Learning | User List
@endsection

@section('content')

<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 mb-4 no-bg">
                    <div class="card-header py-3 px-0 d-flex align-items-center justify-content-between border-bottom">
                        <h3 class="fw-bold flex-fill">User Lists</h3>
                        <div class="dropdown px-2">
                            <a href="{{ route('user-create.create') }}" class="btn btn-outline-success"><b><i class="icofont-plus"></i> Create User</b></a>
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
                        <th>User Name</th>
                        <th>User Role</th>
                        <th>Designation</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 0;
                    @endphp
                    @foreach($user as $data)
                    @if($data->designation !== 'Student')
                    <tr>
                        <td>
                            <p class="fw-normal mb-1">{{ ++$i }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->name }}</p>
                        </td>
                        <td>
                            @foreach($data->roles as $role)
                            <p class="fw-normal mb-1">
                                {{ $role->name }}
                            </p>
                            @endforeach
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ ucfirst($data->designation) }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->email }}</p>
                        </td>
                        <td class="about-info d-flex mt-3">
                            <a href="{{ route('user-create.edit', $data->id) }}" class="btn btn-outline-success" title="Edit"><i class="icofont-edit"></i></a>&nbsp;
                            <form action="{{ route('user-create.destroy', [$data->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger mr-2" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete">
                                    <i class="icofont-ui-delete"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection