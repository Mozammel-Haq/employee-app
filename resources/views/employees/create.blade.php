@extends('layouts.app')
<header class="w-100 flex align-items-center justify-content-center">
    <a href="{{ route('employees.index') }}" class="btn btn-primary ms-5 mt-2">Back</a>
</header>
@section('content')
    <div class="flex w-50 align-item-center ms-5 bg-white shadow px-5 py-1 mt-2">

        <form action="{{ route('employees.store') }}" method="post" enctype="multipart/form-data" class="mt-5">
            @csrf
            <div class="form-group">
                <label for="name">Enter Name:</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="name">
            </div>
            <br>
            <div class="form-group">
                <label for="email">Enter Email:</label>
                <input type="text" class="form-control" name="email" id="email" placeholder="email">
            </div>
            <br>
            <div class="form-group">
                <label for="phone">Enter Phone:</label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="phone">
            </div>
            <br>
            <div class="form-group">
                <label for="dept">Enter Department:</label>
                <input type="text" class="form-control" name="dept" id="dept" placeholder="dept">
            </div>
            <br>
            <div class="form-group">
                <label for="salary">Enter Salary:</label>
                <input type="number" class="form-control" name="salary" id="salary" placeholder="salary">
            </div>
            <br>
            <div class="form-group">
                <label for="image">Enter Image:</label>
                <input type="file" class="form-control" name="image" id="image" placeholder="image">
            </div>
            <br>
            <button type="submit" class="mt-2 btn btn-primary">Create</button>
        </form>

    </div>
@endsection
