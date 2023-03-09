@extends("layout")

@section('title','EditBooking')

@section('Main')
<form action="{{ route("appt.update",$bookingInfo->id) }}" method="POST">
    @csrf
    @method("PUT")
<h2 class="text-center">
    Edit Drug
</h2>


<div class="mb-3 ">
    <label for="exampleFormControlInput1" class="form-label">Doctor Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1"
    value="{{ $bookingInfo->doctor }}" 
    name="doc" placeholder="">
</div>

<div class="mb-3 ">
    <label for="exampleFormControlInput1" class="form-label">Room.No</label>
    <input type="text" class="form-control" id="exampleFormControlInput1"
    value="{{ $bookingInfo->room_no }}"
     name="roNo" placeholder="">
</div>
<div class="mb-3 ">
    <label for="exampleFormControlInput1" class="form-label">Date</label>
    <input type="date" class="form-control"
    value="{{ $bookingInfo->apt_date }}"
    id="exampleFormControlInput1" name="date" placeholder="">
    
</div>
<div class="mb-3 ">
    <label for="exampleFormControlInput1" class="form-label">Time</label>
    <input type="time"  class="form-control" 
    value="{{ $bookingInfo->apt_time }}"
    id="exampleFormControlInput1" name="time" placeholder="">
</div>
   

    <button type="submit" class="btn btn-success">Update </button>
</form>

    
@endsection