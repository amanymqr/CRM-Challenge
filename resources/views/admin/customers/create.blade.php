
@extends('admin.master')
@section('title ' , 'create customer')
@section('content')

<h3>Create Cutomer</h3>
<form action="{{ route('admin.customers.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label> Name</label>
        <input type="text" name="name" placeholder=" Name" class="form-control" />
    </div>

    <div class="mb-3">
        <label> address</label>
        <input type="text" name="address" placeholder=" address" class="form-control" />
    </div>

    <div class="mb-3">
        <label> Phone</label>
        <input type="text" name="phone" placeholder=" phone" class="form-control" />
    </div>

    <div class="mb-3">
        <label> Email </label>
        <input type="email" name="email" placeholder=" email" class="form-control" />
    </div>




    <button class="btn btn-primary w-100">Add</button>


</form>
@endsection

