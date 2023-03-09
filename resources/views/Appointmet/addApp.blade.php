@extends("layout")

@section('title','Add Appointment')

@section('Main')
<form action="{{ route("appt.store") }}" method="POST">
    @csrf
<h2 class="text-center">
    Add Appointment
</h2>

    <div class="mb-3 ">
        <label for="exampleFormControlInput1" class="form-label">Doctor Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="doc" placeholder="">
    </div>

    <div class="mb-3 ">
        <label for="exampleFormControlInput1" class="form-label">Room.No</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="roNo" placeholder="">
    </div>
    <div class="mb-3 ">
        <label for="exampleFormControlInput1" class="form-label">Date</label>
        <input type="date" class="form-control" id="exampleFormControlInput1" name="date" placeholder="">
        
    </div>
    <div class="mb-3 ">
        <label for="exampleFormControlInput1" class="form-label">Time</label>
        <input type="time"  class="form-control" id="exampleFormControlInput1" name="time" placeholder="">
    </div>
   

    <button type="submit" class="btn btn-success">Add</button>
</form>

    
@endsection