@extends('admin.master')
{{--  @section('title ' , 'create customer')  --}}
@section('content')

{{--  <h1 class="h3 mb-4 text-gray-800">All Customers</h1>  --}}
@if (session('msg'))
    <div class="alert alert-{{ session('type') }}">
        {{ session('msg') }}
    </div>
@endif
<h3>Trashed Customers</h3>
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



                <form class="d-inline" action="{{ route('customer.restore' , $customer->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <button class="btn btn-sm btn-info" >
                        restore</button>
                </form>
                <form class="d-inline" action="{{ route('customer.force-delete' , $customer->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure')">
                        delete for ever</button>
                </form>
            </td>

        </tr>
        @endforeach
    </tbody>
</table>
{{--  {{ $customers->links('pagination::bootstrap-5') }}  --}}
@stop
