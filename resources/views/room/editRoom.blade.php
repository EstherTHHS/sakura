@extends("layout")

@section('title','Edit Rooms')

@section('Main')
<form action="{{ route("room.update",$roomEditInfos->id) }}" method="POST">
    @csrf
    @method("PUT")
<h2 class="text-center">
    Edit Room services
</h2>

    <div class="mb-3 ">
        <label for="exampleFormControlInput1" class="form-label">Room No</label>
        <input type="text" value="{{ $roomEditInfos->room_no }}" class="form-control" id="exampleFormControlInput1" name="roomNo" placeholder="Room No">
    </div>

    <div class="mb-3 ">
        <label for="exampleFormControlInput1" class="form-label">Price</label>
        <input type="text" class="form-control" value="{{ $roomEditInfos->price }}" id="exampleFormControlInput1" name="price" placeholder="price">
    </div>
    <div class="mb-3 ">
        <label for="exampleFormControlInput1" class="form-label">status</label>
        {{-- <input type="text" class="form-control" id="exampleFormControlInput1" name="status" placeholder="status"> --}}
        <select class="form-select"  name="status"  aria-label="Default select example">
            <option selected value="available" 
            @if ($roomEditInfos->status == "available") {{ 'selected' }} @endif>Available</option>
            <option value="active" 
            @if($roomEditInfos->status=="active"){{ 'selected' }} @endif>Active</option>
            <option value="lock"
            @if ($roomEditInfos->status =="lock"){{'selected'}} @endif>Lock</option>
            
          </select>
    </div>
    <div class="mb-3 ">
        <label for="exampleFormControlInput1" class="form-label">Available person</label>
        <input type="text"  class="form-control" 
        value="{{ $roomEditInfos->available_person }}"id="exampleFormControlInput1" name="person" placeholder="person">
    </div>
   

    <button type="submit" class="btn btn-success">Update </button>
</form>

    
@endsection