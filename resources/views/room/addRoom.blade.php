@extends("layout")

@section('title','Add Rooms')

@section('Main')
<form action="{{ route("room.store") }}" method="POST">
    @csrf
<h2 class="text-center">
    Add Room services
</h2>

    <div class="mb-3 ">
        <label for="exampleFormControlInput1" class="form-label">Room No</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="roomNo" placeholder="Room No">
    </div>

    <div class="mb-3 ">
        <label for="exampleFormControlInput1" class="form-label">Price</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="price" placeholder="price">
    </div>
    <div class="mb-3 ">
        <label for="exampleFormControlInput1" class="form-label">status</label>
        {{-- <input type="text" class="form-control" id="exampleFormControlInput1" name="status" placeholder="status"> --}}
        <select class="form-select"  name="status"  aria-label="Default select example">
            <option selected value="available">Available</option>
            <option value="active">Active</option>
            <option value="lock">Lock</option>
            
          </select>
    </div>
    <div class="mb-3 ">
        <label for="exampleFormControlInput1" class="form-label">Available person</label>
        <input type="text"  class="form-control" id="exampleFormControlInput1" name="person" placeholder="person">
    </div>
   

    <button type="submit" class="btn btn-success">Add </button>
</form>

    
@endsection