@extends('layouts.app')
        <header class="w-100 flex align-items-center justify-content-center">
            <a href="{{ route('employees.index') }}" class="btn btn-primary ms-5 mt-2">Employees</a>
        </header>
@section('content')

<div class="flex w-75 align-item-center ms-auto bg-white">

{{-- @php
dd($employees);
@endphp --}}

</div>

@endsection
