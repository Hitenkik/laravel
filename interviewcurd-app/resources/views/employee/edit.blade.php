@extends('layout.app')
@section('title')
    Edit Employee-Details
@endsection

@section('content')
    <div class="container">
        <form action="{{ url('employee/update/' . $employee->id) }}" method="post">
            @csrf
            <h3 class="ml-3">Edit Employee</h3>
            <div class="card-body card-block">
                <div class="form-group"><label class="pr-1 form-label">Employee Name</label> @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="text" id="exampleInputName2" name="name"
                        class="form-control @error('name')is-invalid @enderror" value="{{ $employee->name }}">
                </div>

                <div class="form-group"><label class="pr-1 form-label">Designation</label> @error('designation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="text" id="exampleInputName2" name="designation"
                        class="form-control @error('designation')is-invalid @enderror" value="{{ $employee->designation }}">
                </div>

                <div class="form-group"><label class="pr-1 form-label">Contact</label> @error('contact')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="number" id="exampleInputName2" name="contact"
                        class="form-control @error('contact')is-invalid @enderror" value="{{ $employee->contact }}">
                </div>

                <div class="form-group"><label class="pr-1 form-label">Address</label> @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="text" id="exampleInputName2" name="address"
                        class="form-control @error('address')is-invalid @enderror" value="{{ $employee->address }}">
                </div>

                <div class="d-flex ml-2">
                    <button type="submit" class="btn btn-primary btn-m ml-2 rounded"><i
                            class="bi bi-arrow-up-circle-fill"></i>
                        Update</button>
                </div>
        </form>
    </div>
@endsection
