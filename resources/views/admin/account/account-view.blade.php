@extends('admin.layouts.app')

@section('title')
E-Learning | Amount Transfer Lists
@endsection

@section('content')

<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 mb-4 no-bg">
                    <div class="card-header py-3 px-0 d-flex align-items-center justify-content-between border-bottom">
                        <h3 class=" fw-bold flex-fill">Amount Transfer Lists</h3>
                        <div class="dropdown px-2">
                            <a href="{{ route('accounts.create') }}" class="btn btn-outline-success"><b><i class="icofont-plus"></i> Transfer Amount</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 py-3">
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                    <tr>
                        <th>Sl.</th>
                        <th>Account Holder Name</th>
                        <th>Account Number</th>
                        <th>Transfer Amount</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 0;
                    @endphp
                    @foreach($accounts as $data)
                    <tr>
                        <td>
                            {{ ++$i }}
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->account_holder_name }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">{{ $data->account_number }}</p>
                        </td>
                        <td>
                            <p class="fw-normal mb-1">BDT. {{ $data->amount }}</p>
                        </td>
                        <td class="about-info d-flex mt-3">
                            <form action="{{ route('accounts.destroy', [$data->id]) }}" method="POST">
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