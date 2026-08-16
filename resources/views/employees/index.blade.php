@extends('layouts.app')

@section('content')



<div class="d-flex flex-column w-75 mx-auto bg-white py-5">


<div class="d-flex justify-content-between align-items-center">
    <h3>Manage employees</h3>
    <a href="{{ route('employees.create') }}" class="btn btn-primary">Create New</a>
</div>

    <table class="table table-striped mt-4">
        <div class="">
        <thead class="bg-gray">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Department</th>
                <th>Salary</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($employees as $emp)

            <tr>
                <td>{{ $emp->id }}</td>
                <td>{{ $emp->name }}</td>
                <td>{{ $emp->email }}</td>
                <td>{{ $emp->phone }}</td>
                <td>{{ $emp->dept }}</td>
                <td>{{ $emp->salary }}</td>
                <td><img src="{{ asset('storage/'.$emp->image) }}" alt="{{ $emp->image }}"  width="80" class="image-thumbnail rounded"></td>
                <td>
                    <div class="d-flex gap-2 align-center">
                        <a href="{{ route('employees.edit',$emp->id) }}" class="btn btn-info">Edit</a>
                        <form action="{{ route('employees.destroy',$emp->id) }}" method="post" onsubmit="return confirm('Are You Sure??')">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </div>

                </td>
            </tr>

            @empty
                <tr>
                    <td colspan="8"></td>
                </tr>
            @endforelse

        </tbody>

    </table>
    <div class="mt-4">
        {{ $employees->links() }}
    </div>

</div>

</div>

@endsection
