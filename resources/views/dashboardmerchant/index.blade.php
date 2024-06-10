@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard | User') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Total Order</h4>
                                    <p class="card-text">100</p>
                                </div>
                            </div>

                        </div>

                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Total Earning</h4>
                                    <p class="card-text">100</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Total Order Sukses</h4>
                                    <p class="card-text">50</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Total Order Cancel</h4>
                                    <p class="card-text">50</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
