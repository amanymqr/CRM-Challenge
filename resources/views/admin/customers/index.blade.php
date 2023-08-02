@extends('admin.master')
{{--  @section('title ' , 'create customer')  --}}
@section('content')

{{--  <h1 class="h3 mb-4 text-gray-800">All Customers</h1>  --}}
@if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('msg') }}
    </div>
@endif
<h3>All Customers</h3>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>address</th>
            <th>phone</th>
            <th>email</th>
            <th>Actions</th>
            {{--  <th>user_id </th>
            --}}
        </tr>
    </thead>
    <tbody>

        @foreach ($customers as $customer)
        <tr>
            <td>{{ $customer->id }}</td>
            <td>{{$customer->name }}</td>
            <td>{{$customer->address }}</td>
            <td>{{$customer->phone }}</td>
            <td>{{$customer->email }}</td>
            <td>
                <a class="btn btn-sm btn-primary" href="{{ route('admin.customers.edit' , $customer->id) }}"><i class="fas fa-edit"></i></a>



                <form class="d-inline" action="{{ route('admin.customers.destroy' , $customer->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure')"><i class="fas fa-trash"></i></button>
                </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
{{ $customers->links('pagination::bootstrap-5') }}
@stop
