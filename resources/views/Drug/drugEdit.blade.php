@extends("layout")

@section('title','Edit Drug')

@section('Main')
<form action="{{ route("drug.update",$drugItem->id) }}" method="POST">
    @csrf
    @method("PUT")
<h2 class="text-center">
    Edit Drug
</h2>

<div class="mb-3 ">
    <label for="exampleFormControlInput1" class="form-label">Drug Name</label>
    <input type="text" class="form-control" id="exampleFormControlInput1"
    value="{{ $drugItem->drugName }}" 
    name="drugname" placeholder="">
</div>

<div class="mb-3 ">
    <label for="exampleFormControlInput1" class="form-label">ContainPerTab</label>
    <input type="text" class="form-control"
    value="{{ $drugItem->containPerTab }}" id="exampleFormControlInput1" name="contain" placeholder="">
</div>
<div class="mb-3 ">
    <label for="exampleFormControlInput1" class="form-label">stock</label>
    <input type="text" class="form-control"
    value="{{ $drugItem->stock }}"
    id="exampleFormControlInput1" name="stock" placeholder="">
    
</div>
<div class="mb-3 ">
    <label for="exampleFormControlInput1" class="form-label">price</label>
    <input type="text"  class="form-control" 
    value="{{ $drugItem->price }}"
    id="exampleFormControlInput1" name="price" placeholder="">
</div>
   

    <button type="submit" class="btn btn-success">Update </button>
</form>

    
@endsection