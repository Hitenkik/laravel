@extends('layout.app')
@section('title')
    User create
@endsection

@section('content')
    <div class="p-3">
        <a href="{{ url('users/create') }}" class="btn btn-success ml-3 p-2 rounded">Create New Record</a>
        <div class="table-responsive m-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact No</th>
                        <th scope="col">Address</th>
                        <th scope="col">Date Of Birth</th>
                        <th scope="col">Image</th>
                        <th scope="col">Changes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $employee)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $employee->name }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->phone_no }}</td>
                            <td>{{ $employee->address }}</td>
                            <td>{{ $employee->dob }}</td>
                            <td><img src="{{ asset($employee->profile) }}" height="70" width="40" alt="No Image">
                            </td>
                            <td>
                                <a href="{{ url('users/edit/' . $employee->id) }}" class="btn btn-success rounded">Edit</a>
                                <a href="{{ url('users/delete/' . $employee->id) }}"
                                    class="btn btn-danger rounded">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
