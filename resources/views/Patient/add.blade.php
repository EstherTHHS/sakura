@extends("layout")

@section('title','Add patient')

@section('Main')
<form action="{{ route("patient.store") }}" method="POST">
    @csrf
<h2 class="text-center">
    Add Patient infos
</h2>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="userName" placeholder="name">
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Age</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="age" placeholder="age">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Address</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="address" placeholder="address">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Phone</label>
        <input type="text"  class="form-control" id="exampleFormControlInput1" name="phNo" placeholder="ph">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com">
    </div>

    <button type="submit" class="btn btn-success">Add </button>
</form>

    
@endsection
