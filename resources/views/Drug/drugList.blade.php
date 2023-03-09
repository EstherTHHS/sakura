@extends('layout')
@section('title',"druglist")

@section('header')
<h1 class="text-center m-3">Drug List</h1>

<a href="/drug/create"> <button class="btn btn-success">Add drug</button></a>

    
@endsection

@section('Main')




<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Drug Name</th>
        <th scope="col">Contain Per Tab</th>
        <th scope="col">stock</th>
        <th scope="col">Price</th>
        <th scope="col" colspan="2"> Control</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($drugList as $drug)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $drug->drugName }}</td>
            <td>{{ $drug->containPerTab }}mg</td>
            <td>{{ $drug->stock }}</td>
            <td>${{$drug->price }}/perItem</td>
            <td><a href="{{ route('drug.edit',$drug->id) }}">
              <button  class="btn btn-light"> <i class="fa-solid fa-pen-to-square"></i></a></button>
            </td>
             

            <td><form action="{{ route('drug.destroy',$drug->id) }}" method="POST">
                @csrf
                @method("DELETE")
                <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
              
    
                </form></td>

            
           
          </tr>

            
        @empty

        <div>No Drug found!</div>
            
        @endforelse
     
    
    </tbody>
</table>
    
@endsection

@section('Footer')

{{$drugList->links()  }}

  
@endsection
