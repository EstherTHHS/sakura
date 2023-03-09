<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Dashboard</title>
    <script src="jquery3.6.0.js"></script>
    <script src="script.js"></script>
    <!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css?=time()" rel="stylesheet" />
    <link rel="stylesheet" href="./dashboard.css" />
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
    ></script>
  </head>
  <body >
    <div class="main">
      <div class="header">
        <span id="logo"><img src="" alt="" /></span>

        {{-- <span class="contact">Care Center
          <p id="phone"><ion-icon name="call"></ion-icon> </p></span> --}}
          {{-- language switch --}}
         

          
          <div style="color: #9a616d " class="h2 text-center fw-bold">
            <ion-icon name="flower-outline"></ion-icon>{{ __('message.welcome') }}
          </div>

          <div class="dropdown float-end">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
           Lang
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="/lang/en">English</a></li>
              <li><a class="dropdown-item" href="/lang/jp">Japan</a></li>
              <li><a class="dropdown-item" href="/lang/mm">Myanmar</a></li>
            </ul>
          </div>

          

      </div>
      <div class="mainbody">
        <div class="nav">
          <div class="systemname"><ion-icon name="flower-outline"></ion-icon>{{ __('message.hname') }}</div>
          <ul class="menu">
            <li class="active"><ion-icon name="apps"></ion-icon>@lang('message.dashboard')</li>
          
          <a href="./doctorlist.html">    <li><ion-icon name="git-network"></ion-icon> @lang('message.doclist')</li></a>

          <a  href="/logout"><li>
            <ion-icon name="log-out-outline"></ion-icon> @lang('message.logout')</li></a>


        
      </ul>
         
          <hr>
          <ul class="menu">
           
          </ul>
        </div>
        <div class="body">
          
          <div style="color: #9a616d " class=" h5 fw-bold p-3 float-end">
            <span>{{ __('message.username') }}:</span>{{ session("username") }}
          </div>
          
          
          <p class="dashboard">{{ __('message.hstatus') }}</p>
          <div class="h_status">
            <div class="doctor">
              <ion-icon name="git-network"></ion-icon>
              <p class="name">{{ __('message.doctor') }}</p>
              <p class="count" id="dcount"></p>
            </div>
            <div class="nurse">
              <ion-icon name="people-outline"></ion-icon>
              <p class="name">@lang('message.nurse')</p>
              <p class="count" id="ncount"></p>
            </div>
            <div class="room">
              <ion-icon name="bed-outline"></ion-icon>
              <p class="name">@lang('message.bed')</p>
              <p class="count" id="bcount"></p>
            </div>
          </div>
          <div class="detailstatus">
            <div class="status">
              <div class="title colorprimary bgsecondary">
                <ion-icon name="bed-outline"></ion-icon><span id="roomTitle">@lang('message.Room') </span>
              </div>
          
               


    <table class="table" id="room">

      
      <tbody>
        @forelse ($roomInfo as $room)
        <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $room->room_no }}</td>
            <td>${{ $room->price }}</td>
            <td>{{ $room->status }}</td>
            <td>{{ $room->available_person }}</td>
            

              <td><a href="{{ route('room.edit',$room->id) }}">
                <span style="color: #b4721c"><i class="fa-solid fa-pen-to-square"></i></span>
              </td>
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
    

                
              
              <a href="/room"> <button class="btn btnroom">SEE ALL</button></a>
             
              <a href="/room/create"> <button class="btn btnroom">Add Room</button></a>
             
            </div>
            <div class="status">
              <div class="title bgthird">
                <ion-icon name="mail-unread-outline"></ion-icon><span id="messageTitle"> @lang('message.Msg')</span>
              </div>
              <table class="table" id="message">
                <tbody>
                  @forelse ($msgInfo as $msg)
                  <tr>
                      
                      <td>
                        <span><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-brand-messenger" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#9a616d" fill="none" stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                          <path d="M3 20l1.3 -3.9a9 8 0 1 1 3.4 2.9l-4.7 1" />
                          <path d="M8 13l3 -2l2 2l3 -2" />
                        </svg>
                        {{ $msg->message }}</td>
                      <td>{{ $msg->time }}</td>
                      
                      {{-- <td><a href="{{ route('msg.edit',$msg->id) }}">
                        <span style="color: #b4721c"><i class="fa-solid fa-pen-to-square"></i></span></a>
                    
                      </td> --}}
                       
          
                     
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
            
              <a href="/msg"><button class="btn btnmessage ">Read More</button></a>
            
               <a href="/msg/create"> <button class="btn btnmessage">Add Message</button></a>
            </div>
          </div>
          <div class="detailstatus">
            <div class="status">
              <div class="title colorprimary bgfouth">
              <ion-icon name="medkit"></ion-icon><span id="drugTitle">@lang('message.DrugStore')</span>
              </div>
              <table class="table">
                
                <tbody>
                    @forelse ($drugList as $drug)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $drug->drugName }}</td>
                        <td>{{ $drug->containPerTab }}mg</td>
                        <td>{{ $drug->stock }}</td>
                        <td>${{$drug->price }}/perItem</td>
                        <td><a href="{{ route('drug.edit',$drug->id) }}">
                          <span style="color: #b4721c"><i class="fa-solid fa-pen-to-square"></i></span>
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
             <a href="/drug"> <button class="btn btndrug bgfouth">CHECK ALL</button></a>
             <a href="/drug/create"> <button class="btn btndrug bgfouth"><ion-icon name="add-circle"></ion-icon> Add Drug</button></a>
            </div>
            <div class="status">
              <div class="title colorprimary btnappointment">
              <ion-icon name="calendar"></ion-icon><span id="appointmentTitle"> @lang('message.Appointment') </span>
              </div>
              <table class="table">
                
                <tbody>
                    @forelse ($apptInfos as $appt)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>Dr.{{ $appt->doctor }}</td>
                        <td>{{ $appt->room_no }}</td>
                        <td>{{ $appt->apt_date }}</td>
                        <td>{{$appt->apt_time }}</td>
                        <td><a href="{{ route('appt.edit',$appt->id) }}">
                          <span style="color: #b4721c"><i class="fa-solid fa-pen-to-square"></i></span>
                        </td>
                         
            
                        <td><form action="{{ route('appt.destroy',$appt->id) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            {{-- <span style="color: #ff0000"> <i class="fa-solid fa-trash-can"></i></span> --}}

                            <button class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                          
                
                            </form></td>
            
                        
                       
                      </tr>
            
                        
                    @empty
            
                    <div>No Appointment found!</div>
                        
                    @endforelse
                 
                
                </tbody>
            </table>
              
              <a href="/appt">
              <button class="btn btndrug btnappointment">SEE ALL</button></a>
              
              <a href="/appt/create"><button class="btn btndrug btnappointment">
             <ion-icon name="add-circle"></ion-icon>Add</button></a>

                
            </div>
        </div>
      </div>
    </div>
  </body>
</html>
