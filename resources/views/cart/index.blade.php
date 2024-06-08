@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard | Merchant Menu') }}</div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>quantity</th>
                                <th>Price</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $item)
                                <tr>
                                    {{-- @php
                                        dd($cart);
                                    @endphp --}}
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="d-flex">
                                                <input type="number" class="form-control me-2" name="qty" value="{{ $item->qty }}">
                                                <input type="hidden" name="rowId" value="{{ $item->rowId }}">
                                                <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                            </div>
                                        </form>

                                    </td>
                                    <td>Rp. {{ number_format($item->price) }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
                                        </div>
                                    </td>

                                </tr>
                                @endforeach

                                <tr>
                                    <th colspan="3">Tax</th>
                                    <th>Rp. {{ number_format($item->priceTax) }} (15%)</th>
                                </tr>
                                <tr>
                                    <th colspan="3">Total</th>
                                    <th>Rp. {{ number_format($total) }}</th>
                                </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="4">
                                    <a href="{{ route('checkout.index') }}" class="btn btn-primary">Checkout</a>
                                </td>
                            </tr>

                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
