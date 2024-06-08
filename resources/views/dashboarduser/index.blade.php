@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard | User') }}</div>

                <div class="card-body">

                    <form action="">
                        <div class="mb-3">
                            <label for="" class="form-label">Cari</label>
                            <input type="text" name="cari" class="form-control">
                            <input type="submit" value="Cari" class="btn mt-2 btn-primary">
                        </div>
                    </form>


                    <div class="row">
                        @foreach ($menus as $item)
                        <div class="col-md-3 ">
                            <div class="card p-1">
                                <img src="{{ Storage::url($item->image) }}" class="card-img-top" alt="...">
                                <div class="card-body">
                                  <h5 class="card-title">{{ $item->name }}</h5>
                                  <p class="card-text">{{ $item->description }}</p>
                                  <p class="card-text text-end">Rp. {{ $item->price }}</p>
                                  <form action="{{ route('cart.store') }}" method="POST">
                                      @csrf
                                      <input type="hidden" name="id" value="{{ $item->id }}">
                                      <input type="hidden" name="name" value="{{ $item->name }}">
                                      <input type="hidden" name="price" value="{{ $item->price }}">
                                      <button type="submit" class="btn btn-primary w-100 mt-2">Add to Cart</button>
                                  </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
