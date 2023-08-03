
@extends('admin.master')
@section('title', 'Create Customer')
@section('content')


<h2>Create Customer</h2>
@include('admin.error')

<form action="{{ route('admin.customers.store') }}" method="POST" enctype="multipart/form-data">
    @csrf



    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" placeholder="Name" class="form-control" />
    </div>


    <div class="mb-3">
        <label> address</label>
        <input type="text" name="address" placeholder=" address" class="form-control " />

    </div>

    <div class="mb-3">
        <label> Phone</label>
        <input type="text" name="phone" placeholder=" phone" class="form-control " />

    </div>

    <div class="mb-3">
        <label> Email </label>
        <input type="email" name="email" placeholder=" email" class="form-control " />

    </div>




    <button class="btn btn-primary w-100">Add</button>


</form>
@endsection

