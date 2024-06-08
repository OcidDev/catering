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
                                <td>Name</td>
                                <td>slug</td>
                                <td>Description</td>
                                <td>Image</td>
                                <td>Option</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->slug }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td><img class="w-50 " src="{{ Storage::url($item->image) }}" alt="Image"></td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-sm btn-warning me-1" href="{{ route('category.edit',$item->id) }}">Edit</a>
                                            <form action="{{ route('category.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                            </form>
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
