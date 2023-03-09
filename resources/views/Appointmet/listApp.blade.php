@extends('layout')
@section('title',"Appointment")

@section('header')
<h1 class="text-center m-3">Appointment List</h1>
<a href="/appt/create"> <button class="btn btn-success">Add</button></a>
    
@endsection

@section('Main')




<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Doc Name</th>
        <th scope="col">Room</th>
        <th scope="col"> Date</th>
        <th scope="col">Time</th>
        <th scope="col" colspan="2"> Control</th>
      </tr>
    </thead>
    <tbody>
        @forelse ($apptInfos as $appt)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>Dr.{{ $appt->doctor }}</td>
            <td>{{ $appt->room_no }}</td>
            <td>{{ $appt->apt_date }}</td>
            <td>{{$appt->apt_time }}</td>
            <td><a href="{{ route('appt.edit',$appt->id) }}">
              <button  class="btn btn-light"> <i class="fa-solid fa-pen-to-square"></i></a></button>
            </td>
             

            <td><form action="{{ route('appt.destroy',$appt->id) }}" method="POST">
                @csrf
                @method("DELETE")
                <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
              
    
                </form></td>

            
           
          </tr>

            
        @empty

        <div>No Appointment found!</div>
            
        @endforelse
     
    
    </tbody>
</table>
    
@endsection

@section('Footer')

{{ $apptInfos->links() }}

  

@endsection
