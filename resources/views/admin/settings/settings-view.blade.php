@extends('admin.layouts.app')

@section('title')
E-Learning | Settings View
@endsection

@section('content')

<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 mb-4 no-bg">
                    <div class="card-header py-3 px-0 d-flex align-items-center justify-content-between border-bottom">
                        <h3 class=" fw-bold flex-fill">Settings Information</h3>
                        @if($settings)
                        <div class="dropdown px-2">
                            <a href="{{ route('settings.create') }}" class="btn btn-outline-success disabled"><b><i class="icofont-plus"></i> Settings</b></a>
                        </div>
                        @else
                        <div class="dropdown px-2">
                            <a href="{{ route('settings.create') }}" class="btn btn-outline-success"><b><i class="icofont-plus"></i> Settings</b></a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 py-3">
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>Company Logo</th>
                        <th>Title</th>
                        <th>Company Name</th>
                        <th>Company Phone</th>
                        <th>Company Email</th>
                        <th>Web Link</th>
                        <th>address</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 0;
                    @endphp
                    @foreach($settings as $data)
                    <tr>
                        <td>
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('company-logo') . '/' . $data->company_logo }}" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                            </div>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->title }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->company_name }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->company_phone }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->company_email }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->web_link }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->address }}</p>
                        </td>
                        <td class="d-flex mt-3">
                            <a href="{{ route('settings.edit', $data->id) }}" class="btn btn-outline-success" title="Edit"><i class="icofont-edit"></i></a>&nbsp;
                            <form action="{{ route('settings.destroy', [$data->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger mr-2" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete">
                                    <i class="icofont-ui-delete"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection