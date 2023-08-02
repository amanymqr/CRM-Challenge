
@extends('admin.master')
@section('title ' , 'create customer')
@section('content')

<h3>Edit Cutomer</h3>
<form action="{{ route('admin.customers.update', $customers->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label> Name</label>
        <input type="text" name="name" value="{{ $customers->name }}" placeholder=" Name" class="form-control" />
    </div>

    <div class="mb-3">
        <label> address</label>
        <input type="text" name="address" value="{{ $customers->address }}"  placeholder=" address" class="form-control" />
    </div>

    <div class="mb-3">
        <label> Phone</label>
        <input type="text" name="phone" value="{{ $customers->phone }}"  placeholder=" phone" class="form-control" />
    </div>

    <div class="mb-3">
        <label> Email </label>
        <input type="email" name="email"  value="{{ $customers->email }}" placeholder=" email" class="form-control" />
    </div>




    <button class="btn btn-primary w-100">edit</button>


</form>
@endsection

