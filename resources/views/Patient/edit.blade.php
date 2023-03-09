@extends("layout")

@section('title','Edit patient')

@section('Main')
<form action="{{ route("patient.update",$patientinfos->id) }}" method="POST">
    @csrf
    @method("PUT")
<h2 class="text-center">
   Edit Patient infos
</h2>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Name</label>
        <input type="text" value="{{ $patientinfos->name }}" class="form-control" id="exampleFormControlInput1" name="userName" placeholder="name">
    </div>

    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Age</label>
        <input type="text" class="form-control" id="exampleFormControlInput1"  value="{{ $patientinfos->age }}" name="age" placeholder="age">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Address</label>
        <input type="text" class="form-control" id="exampleFormControlInput1"
        value="{{ $patientinfos->address }}"
        name="address" placeholder="address">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Phone</label>
        <input type="text"  class="form-control" id="exampleFormControlInput1"
        value="{{ $patientinfos->phone }}"
        name="phNo" placeholder="ph">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Email address</label>
        <input type="email" class="form-control" id="exampleFormControlInput1"
        value="{{ $patientinfos->email }}"
        name="email" placeholder="name@example.com">
    </div>

    <button type="submit" class="btn btn-success">Update </button>
</form>

    
@endsection
