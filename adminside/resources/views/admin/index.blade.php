@extends('layout.app')
@section('title')
    Users
@endsection

@section('content')
    <div class="container">
        <a href="{{ url('admin/create') }}" class="btn btn-primary">Create User</a>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Nick Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Message</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admin as $admins)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $admins->name }}</td>
                            <td>{{ $admins->lastname }}</td>
                            <td>{{ $admins->nickname }}</td>
                            <td>{{ $admins->gender }}</td>
                            <td>{{ $admins->message }}</td>
                            <td>{{ $admins->email }}</td>
                            <td>{{ $admins->password }}</td>
                            {{-- <td><img src="{{ asset($admins->profile) }}" height="50" width="50" alt="No Image"></td> --}}
                            <td><a href="{{ url('admin/edit/' . $admins->id) }}">Edit</a></td>
                            <td><a href="{{ url('admin/delete/' . $admins->id) }}">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
