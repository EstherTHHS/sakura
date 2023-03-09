@extends('layout')
@section('title',"MsgList")

@section('header')
<h1 class="text-center m-3">Message List</h1>

<a href="/msg/create"> <button class="btn btn-success">Add email</button></a>
    
@endsection

@section('Main')




<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Message</th>
        <th scope="col">Time</th>
        <th scope="col" colspan="2"> Control</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($msgInfo as $msg)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td  style="word-wrap:break-word;">{{ $msg->message }}</td>
            <td>{{ $msg->time }}</td>
            
            <td><a href="{{ route('msg.edit',$msg->id) }}">
              <button  class="btn btn-light"> <i class="fa-solid fa-pen-to-square"></i></a></button>
            </td>
             

           
            <td><form action="{{ route('msg.destroy',$msg->id) }}" method="POST">
              @csrf
              @method("DELETE")
              <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
            
  
              </form></td>

            
           
          </tr>

            
        @empty

        <div>No Msg found!</div>
            
        @endforelse
     
    
    </tbody>
</table>
    
@endsection

@section('Footer')

   {{$msgInfo->links()  }}

@endsection
