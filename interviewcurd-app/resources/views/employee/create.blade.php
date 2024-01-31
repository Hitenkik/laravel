@extends('layout.app')
@section('title')
    Employee Create
@endsection

@section('content')
    <div class="container">
        <form action="{{ url('employee/store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h3 class="ml-3 mt-5">Add New Employee</h3>
            <div class="card-body card-block">
                <div class="form-group"><label class="pr-1 form-label">Employee Name</label> @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="text" id="exampleInputName2" name="name"
                        class="form-control @error('name')is-invalid @enderror" value="{{ old('name') }}">
                </div>

                <div class="form-group"><label class="pr-1 form-label">Designation</label> @error('designation')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="text" id="exampleInputName2" name="designation"
                        class="form-control @error('designation')is-invalid @enderror" value="{{ old('designation') }}">
                </div>

                <div class="form-group"><label class="pr-1 form-label">Contact</label> @error('contact')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="number" id="exampleInputName2" name="contact"
                        class="form-control @error('contact')is-invalid @enderror" value="{{ old('contact') }}">
                </div>

                <div class="form-group"><label class="pr-1 form-label">Address</label> @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="text" id="exampleInputName2" name="address"
                        class="form-control @error('address')is-invalid @enderror" value="{{ old('address') }}">
                </div>

                <div class="form-group"><label class="pr-1 form-label">Uplode File</label> @error('profile')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="file" name="profile" id="profile"
                        class="form-control form-control-lg @error('profile')is-invalid @enderror"
                        value="{{ old('profile') }}">
                </div>

                <div class="d-flex ml-2">
                    <button type="submit" class="btn btn-primary btn-m ml-2"><i class="fa fa-dot-circle-o"></i>
                        Submit</button>
                    <button type="reset" class="btn btn-danger btn-m ml-2"><i class="fa fa-ban"></i> Reset</button>
                    <button type="button" class="btn btn-dark btn-m text-light ml-2"><i
                            class="bi bi-arrow-left-circle-fill p-1"></i><a
                            href="{{ url('employee/index') }}"class="text-light text-decoration-none">Back</a>
                    </button>
                </div>
        </form>
    </div>
@endsection
