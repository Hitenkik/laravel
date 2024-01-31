@extends('layout.app')
@section('title')
    Create User
@endsection

@section('content')
    {{-- @if ($errors->any())
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    @endif --}}

    <form action="{{ url('admin/store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container mt-3">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name" />
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="container mt-3">
            <div class="mb-3">
                <label for="" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lastname" placeholder="Last Name" />
                @error('lastname')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="container mt-3">
            <div class="mb-3">
                <label for="" class="form-label">Nick Name</label>
                <input type="text" class="form-control" name="nickname" placeholder="Nick Name" />
                @error('nickname')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="container mt-3">
            <div class="mb-3">
                <label for="" class="form-label">Gender</label>
                <input type="text" class="form-control" name="gender" placeholder="Gender" />
                @error('gender')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="container mt-3">
            <div class="mb-3">
                <label for="" class="form-label">Message</label>
                <input type="text" class="form-control" name="message" placeholder="Message" />
                @error('message')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="container mt-3">
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Email" />
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="container mt-3">
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password" />
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="container mt-3">
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-warning">Reset</button>
                <a href="{{ url('admin') }}" class="btn btn-dark">Back</a>
            </div>
        </div>
    </form>
@endsection
