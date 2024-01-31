@extends('layout.app')
@section('title')
    User create
@endsection

@section('content')
    <div class="p-3">
        <a href="{{ url('employee/create') }}" class="btn btn-success ml-3 p-2 rounded">Create New Record</a>
        <div class="table-responsive m-3">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Designation</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Address</th>
                        <th scope="col">Profile</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employee as $employe)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $employe->name }}</td>
                            <td>{{ $employe->designation }}</td>
                            <td>{{ $employe->contact }}</td>
                            <td>{{ $employe->address }}</td>
                            <td><img src="{{ asset($employe->profile) }}" height="40" width="40" alt="No Image">
                            </td>
                            <td>
                                <a href="{{ url('employee/edit/' . $employe->id) }}"
                                    class="btn btn-success rounded">Edit</a>

                                <a href="{{ url('employee/delete/' . $employe->id) }}"
                                    class="btn btn-danger rounded">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
