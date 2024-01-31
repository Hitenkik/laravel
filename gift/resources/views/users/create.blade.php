@extends('layout.app')
@section('title')
    Employee create
@endsection

@section('content')
    <div class="container">
        <form action="{{ url('users/store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h3 class="ml-3 mt-5">Add New Employee</h3>
            <div class="card-body card-block">
                <div class="form-group"><label class="pr-1 form-label">Employee Name</label> @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="text" id="exampleInputName2" name="name"
                        class="form-control @error('name')is-invalid @enderror" value="{{ old('name') }}">
                </div>
                <div class="form-group"><label class="pr-1 form-label">Email</label> @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="email" id="exampleInputName2" name="email"
                        class="form-control @error('email')is-invalid @enderror" value="{{ old('email') }}">
                </div>
                <div class="form-group"><label class="pr-1 form-label">Password</label> @error('password')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="d-flex">
                        <input type="password" id="password" name="password" style="width: 97%"
                            class="form-control @error('password')is-invalid @enderror" value="{{ old('password') }}">
                        <button type="button" id="togglePassword" class="btn btn-outline-secondary">
                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
                <script>
                    document.getElementById('togglePassword').addEventListener('click', function() {
                        var passwordInput = document.getElementById('password');
                        var type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                        passwordInput.setAttribute('type', type);

                        var icon = this.querySelector('i');
                        icon.className = type === 'password' ? 'fa fa-eye-slash' : 'fa fa-eye';
                    });
                </script>
                <div class="form-group"><label class="pr-1 form-label">Contact Number</label>
                    @error('phone_no')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="number" name="phone_no" class="form-control @error('phone_no')is-invalid @enderror"
                        value="{{ old('phone_no') }}">
                </div>
                <div class="form-group"><label class="pr-1 form-label">Address</label> @error('address')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="text" id="exampleInputName2" name="address"
                        class="form-control @error('address')is-invalid @enderror" value="{{ old('address') }}">
                </div>
                <div class="form-group"><label class="pr-1 form-label">Date Of Birth </label>
                    @error('dob')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="date" name="dob" class="form-control @error('dob')is-invalid @enderror"
                        value="{{ old('dob') }}">
                </div>
                <div class="form-group"><label class="pr-1 form-label">Uplode File</label> @error('profile')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <input type="file" name="profile" id="profile"
                        class="form-control form-control-lg @error('profile')is-invalid @enderror"
                        value="{{ old('profile') }}">
                </div>
            </div>
            <div class="d-flex ml-2">
                <button type="submit" class="btn btn-primary btn-m ml-2"><i class="fa fa-dot-circle-o"></i> Submit</button>
                <button type="reset" class="btn btn-danger btn-m ml-2"><i class="fa fa-ban"></i> Reset</button>
                <button type="button" class="btn btn-dark btn-m text-light ml-2"><i
                        class="bi bi-arrow-left-circle-fill p-1"></i><a
                        href="{{ url('users/index') }}"class="text-light text-decoration-none">Back</a>
                </button>
            </div>
        </form>
    </div>
@endsection
