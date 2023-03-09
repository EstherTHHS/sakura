@extends("layout")

@section('title','EditMSg')

@section('Main')
<form action="{{ route("msg.update",$msgedit->id) }}" method="POST">
    @csrf
    @method("PUT")
<h2 class="text-center">
    Edit Msg
</h2>

<div class="mb-3 ">
    <label for="exampleFormControlInput1" class="form-label">Message</label>
    <input type="text" class="form-control" id="exampleFormControlInput1"
    value="{{ $msgedit->message }}" 
    name="msg" placeholder="">
</div>

<div class="mb-3 ">
    <label for="exampleFormControlInput1" class="form-label">ContainPerTab</label>
    <input type="text" class="form-control"
    value="{{ $msgedit->time }}"  id="exampleFormControlInput1" name="time" placeholder="">
</div>

   

    <button type="submit" class="btn btn-success">Update </button>
</form>

    
@endsection