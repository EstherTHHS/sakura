@extends('layout')

@section('title',"PatientList")

@section('header')
<h1 class="text-center m-3">Patient List</h1>

  
@endsection

@section('Main')


<a href="/patient/create" class="btn btn-success">Add</a>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">name</th>
            <th scope="col">age</th>
            <th scope="col">address</th>
            <th scope="col">ph</th>
            <th scope="col">email</th>
            <th scope="col ">Action</th>
          

          </tr>
        </thead>
        <tbody>
            @forelse ( $patientinfos as $patient )

            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $patient->name }}</td>
                <td>{{ $patient->age }}</td>
                <td>{{ $patient->address }}</td>
                <td>{{ $patient->phone }}</td>
                <td>{{ $patient->email }}</td>
                <td><a href="{{route('patient.edit',$patient->id)}}">Edit</a></td>
                <td>
                  <form action="{{ route("patient.destroy",$patient->id) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button class="btn btn-danger">Delete</button>
                  </form>
                </td>

                
            </tr>
                
            @empty
            <div>No Patient found!</div>
                
            @endforelse
          
          
        </tbody>
      </table>

      {{ $patientinfos ->links()  }}




@endsection
