@extends('admin.master')
@section('title', 'All Users')
@section('content')

<h1 class="h3 mb-4 text-gray-800">All Customers</h1>
@if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('msg') }}
    </div>
@endif

<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>email</th>

        </tr>
    </thead>
    <tbody>

        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{$user->name }}</td>
            <td>{{$user->email }}</td>


        </tr>
        @endforeach
    </tbody>
</table>
{{--  {{ $customer->links() }}  --}}
@stop
