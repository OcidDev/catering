@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard | Merchant Category') }}</div>

                <div class="card-body">
                    <a class="btn btn-primary" href="{{ route('category.create') }}">Tambah Data</a>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <td>Invoice</td>
                                <td>Merchant Name</td>
                                <td>Status</td>
                                <td>Payment Method</td>
                                <td>Payment Date</td>
                                <td>Option</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $item)
                                <tr>
                                    <td>{{ $item->invoice }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->payment_method }}</td>
                                    <td>{{ $item->payment_date }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-sm btn-success me-1" href="{{ route('order.show', ['order' => $item->invoice, 'merchant_id' => $item->id]) }}">Show</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
