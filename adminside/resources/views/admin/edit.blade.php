@extends('layout.app')
@section('title')
    Edit User
@endsection

@section('content')
    <form action="{{ url('admin/update/' . $admin->id) }}" method="post">
        @csrf
        <div class="container mt-3">
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Name" value="{{ $admin->name }}" />
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="container mt-3">
            <div class="mb-3">
                <label for="" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="lastname" placeholder="Name"
                    value="{{ $admin->lastname }}" />
                @error('lastname')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="container mt-3">
            <div class="mb-3">
                <label for="" class="form-label">Nick Name</label>
                <input type="text" class="form-control" name="nickname" placeholder="Name"
                    value="{{ $admin->nickname }}" />
                @error('nickname')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="container mt-3">
            <div class="mb-3">
                <label for="" class="form-label">Gender</label>
                <input type="text" class="form-control" name="gender" placeholder="Name" value="{{ $admin->gender }}" />
                @error('gender')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="container mt-3">
            <div class="mb-3">
                <label for="" class="form-label">Message</label>
                <input type="text" class="form-control" name="message" placeholder="Name"
                    value="{{ $admin->message }}" />
                @error('message')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="container mt-3">
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <input type="email" class="form-control" name="email" placeholder="Name" value="{{ $admin->email }}" />
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="container mt-3">
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Name"
                    value="{{ $admin->password }}" />
                @error('[password]')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <div class="container mt-3">
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="reset" class="btn btn-warning">Reset</button>
                <a href="{{ url('admin') }}" class="btn btn-dark">Back</a>
            </div>
        </div>
    </form>
@endsection
