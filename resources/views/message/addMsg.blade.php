@extends("layout")

@section('title','AddMsgs')

@section('Main')
<form action="{{ route("msg.store") }}" method="POST">
    @csrf
<h2 class="text-center m-3">
    Add Message
</h2>

    <div class="mb-3 ">
        <label for="exampleFormControlInput1" class="form-label">Message </label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="message" placeholder="">
    </div>

   
    <div class="mb-3 ">
        <label for="exampleFormControlInput1" class="form-label">Time</label>
        <input type="time"  class="form-control" id="exampleFormControlInput1" name="time" placeholder="">
    </div>
   

    <button type="submit" class="btn btn-success">Add</button>
</form>

    
@endsection