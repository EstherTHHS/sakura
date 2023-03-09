@extends("layout")

@section('title','Add Drugs')

@section('Main')
<form action="{{ route("drug.store") }}" method="POST">
    @csrf
<h2 class="text-center">
    Add Drugs
</h2>

    <div class="mb-3 ">
        <label for="exampleFormControlInput1" class="form-label">Drug Name</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="drugname" placeholder="">
    </div>

    <div class="mb-3 ">
        <label for="exampleFormControlInput1" class="form-label">ContainPerTab</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="contain" placeholder="">
    </div>
    <div class="mb-3 ">
        <label for="exampleFormControlInput1" class="form-label">stock</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="stock" placeholder="">
        
    </div>
    <div class="mb-3 ">
        <label for="exampleFormControlInput1" class="form-label">price</label>
        <input type="text"  class="form-control" id="exampleFormControlInput1" name="price" placeholder="">
    </div>
   

    <button type="submit" class="btn btn-success">Add</button>
</form>

    
@endsection