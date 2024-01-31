@extends('layout.app')
@section('title')
    Edit Profile
@endsection

@section('contect')
    <form action="" method="post">
        @csrf
        <div class="container mt-3">
            <div class="mb-3">
                <label class="form-control">Name</label>
                <input type="text" name="name" placeholder="Name" value="{{ $user->name }}">
                @error('name')
                    <span></span>
                @enderror
            </div>
        </div>
    </form>
@endsection
