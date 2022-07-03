@extends('admin.layouts.app')

@section('title')
E-Learning | Accounts Information and Transfer
@endsection

@section('content')

@php
use App\Models\Admission;
use App\Models\Account;
@endphp

<div class="body d-flex py-lg-3 py-md-2">
    <div class="container-xxl">
        <div class="row clearfix g-3">
            <form class="row g-1" action="{{ route('accounts.store') }}" method="POST">
                @csrf
                <div class="col-lg-6 col-md-12 flex-column">
                    <div class="row row-deck g-3">
                        <div class="col-12">
                            <div class="card bg-success">
                                <div class="card-body text-white d-flex flex-column">
                                    <div class="d-flex align-items-center mb-auto ">
                                        <div class="d-flex flex-fill ms-3 text-truncate">
                                            <h4 class=""><b><i>Payment Information</i></b> </h4>
                                            <a href="{{ route('accounts.index') }}" class="btn btn-info" style="margin-left: 49px; color: white;"><b> Account Lists</b></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="row row-deck">
                            <div class="col-md-12">
                                <div class="owl-carousel owl-theme owl-carouseltwo">
                                    <div class="item">
                                        <div class="card">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <div class="row g-1">
                                                        <div class="col-6">
                                                            <div class="m-2" style="text-align: center;">
                                                                <label class="form-label"><b>Total Received Amount</b></label>
                                                                <div class="lessons-info  d-flex flex-column border-start ps-3">
                                                                    <span class="fw-bold fs-6 text-success">BDT. {{ Admission::first()->sum('total_payment') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2" style="text-align: center;">
                                                                <label class="form-label"><b>Total Due Amount</b></label>
                                                                <div class="lessons-info  d-flex flex-column border-start ps-3">
                                                                    <span class="fw-bold fs-6 text-danger">BDT. {{ Admission::first()->sum('due') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2" style="text-align: center;">
                                                                <label class="form-label"><b>Total Discount Amount</b></label>
                                                                <div class="lessons-info  d-flex flex-column border-start ps-3">
                                                                    <span class="fw-bold fs-6 text-secondary">BDT. {{ Admission::first()->sum('discount') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <div class="m-2" style="text-align: center;">
                                                                <label class="form-label"><b>Total Withdraw Amount</b></label>
                                                                <div class="lessons-info  d-flex flex-column border-start ps-3">
                                                                    <span class="fw-bold fs-6 text-info">BDT. {{ Account::first()->sum('amount') }}</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="card mb-3 color-bg-200">
                        <div class="card-body">
                            <div class="daily_practice">
                                <h5 class="mb-3 fw-bold text-success"><u><b>Payment Withdraw Section</b></u></h5>
                                <div class="row g-2">
                                    <div class="card line-lightblue mb-3">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <div class="modal-content">
                                                    <div class="modal-body">
                                                        <div class="row g-1">
                                                            <div class="col-12">
                                                                <div class="m-2">
                                                                    <label class="form-label"><b>Account Number</b></label>
                                                                    <input type="number" class="form-control form-control-lg fw-bold" name="account_number">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="m-2">
                                                                    <label class="form-label"><b>Account Holder Name</b></label>
                                                                    <input type="text" class="form-control form-control-lg fw-bold" name="account_holder_name">
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="m-2">
                                                                    <label class="form-label"><b>Transfer Amount (BDT)</b></label>
                                                                    <input type="number" class="form-control form-control-lg fw-bold" name="amount">
                                                                </div>
                                                            </div>
                                                            <div class="col-12 text-right m-2 mt-4">
                                                                <button type="submit" class="btn btn-outline-success form-control-lg"><b>Transfer Amount</b></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div><!-- Row End -->
    </div>
</div>

@endsection