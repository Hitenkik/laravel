@extends('layout.app')
@section('title')
    Edit Employee-Details
@endsection

@section('content')
    <div class="container">
        <form action="{{ url('users/update/' . $user->id) }}" method="post">
            @csrf
            <h3 class="ml-3">Edit Employee</h3>
            <div class="card-body card-block mt-4">
                <div class="form-group"><label wclass="pr-1 form-label">Employee Name</label>
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="text" id="exampleInputName2" name="name" class="form-control"
                        value="{{ $user->name }}">
                </div>
                <div class="form-group"><label class="pr-1 form-label">Email</label> @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="email" id="exampleInputName2" name="email" class="form-control"
                        value="{{ $user->email }}">
                </div>
                <div class="form-group"><label class="pr-1 form-label">Contact Number</label>
                    @error('phone_no')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="number" name="phone_no" class="form-control" value="{{ $user->phone_no }}">
                </div>
                <div class="form-group"><label class="pr-1 form-label">Address</label>
                    @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="text" id="exampleInputName2" name="address" class="form-control"
                        value="{{ $user->address }}">
                </div>
                <div class="form-group"><label class="pr-1 form-label">Date Of Birth </label>
                    @error('dob')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="date" name="dob" class="form-control" value="{{ $user->dob }}">
                </div>
            </div>
            <div class="d-flex ml-2">
                <button type="submit" class="btn btn-primary btn-m ml-2 rounded"><i class="bi bi-arrow-up-circle-fill"></i>
                    Update</button>
            </div>
        </form>
    </div>
@endsection
