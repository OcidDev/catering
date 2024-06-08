@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">

                    {{-- Jika error tampilkan pesan --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{-- Form update --}}
                    <form action="{{ route('profile.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" aria-describedby="helpId" value="{{ $user->name }}">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Password</label>
                            <input type="text" name="password" id="password" class="form-control">
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Photo</label>
                            <input type="file" name="photo" id="photo" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Phone</label>
                            <input type="number" name="phone" id="phone" class="form-control" value="{{ $user->phone }}">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Address</label>
                            <input type="text" name="address" id="address" class="form-control" value="{{ $user->address }}">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Gender</label>
                            <select name="gender" id="gender" class="form-control">
                                <option value="Laki-laki" {{ $user->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="Perempuan" {{ $user->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>



                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
