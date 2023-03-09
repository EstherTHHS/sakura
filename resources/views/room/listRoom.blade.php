@extends('layout')
@section('title',"Roomlist")

@section('header')
<h1 class="text-center m-3">Room List</h1>
<div class="m-5"><a href="/room/create"> <button class="btn btn-success">Add Room</button></a></div>
    
@endsection

@section('Main')




<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Room no</th>
        <th scope="col">Price</th>
        <th scope="col">status</th>
        <th scope="col">AvailablePerson</th>
        <th scope="col" colspan="2"> Control</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($roomInfos as $room)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $room->room_no }}</td>
            <td>${{ $room->price }}</td>
            <td>{{ $room->status }}</td>
            <td>{{ $room->available_person }}</td>
            <td><a href="{{ route('room.edit',$room->id) }}">
              <button  class="btn btn-light"> <i class="fa-solid fa-pen-to-square"></i></a></td></button>
             

            <td><form action="{{ route('room.destroy',$room->id) }}" method="POST">
                @csrf
                @method("DELETE")
                <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
              
    
                </form></td>

            
           
          </tr>

            
        @empty

        <div>No Room found!</div>
            
        @endforelse
     
    
    </tbody>
  </table>
 
  
    
@endsection




@section('Footer')


<div>

  {{ $roomInfos->links() }}

</div>
 



  

@endsection
