@extends('layout')

@section('title',"login")
@section('css')
<link rel="stylesheet" href="./css/login.css">
@endsection

    
@section('Main')





<section class="mysec" style="background-color: #98b0b7">
  
  {{-- show validation all error list in view  --}}
{{-- @if ($errors->any())
  @foreach ($errors->all() as $error )

  <li>{{ $error }}</li>
    
  @endforeach
@endif --}}
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="./img/sakura.jpg"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="/login" method="POST">
                  @csrf

                  <div class="d-flex align-items-center mb-3 pb-1">
                  
                    <span class="h1 fw-bold mb-0"><img width="100" src="https://www.gstatic.com/delight/confetti/cherry/kp2.gif" alt=""></span>
                  </div>

                  <h5 class="fw-bold mb-3 pb-3 text-center mycolor"  style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="form-outline mb-4">
                    <input type="text"
                    name="username"
                    class="form-control form-control-lg " placeholder="Username" value="{{ old("username") }}" />
                   
                    {{-- show specific error.take the same name form input name --}}
                     @error("username")
                     <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-outline mb-4">
                    <input type="text" name="email" class="form-control form-control-lg" placeholder="Email address" value="{{ old("email") }}" />
                    @error("email")
                    <span class="text-danger">{{ $message }}</span>
                      
                    @enderror
              
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name="password"
                    class="form-control form-control-lg" placeholder="Password" />
                    @error("password")
                     <span class="text-danger">{{ $message }}</span>
                     @enderror
                    
                    
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-secondary my-submitbtn btn-lg btn-block"  type="submit" >Login</button>
                  </div>

               
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    
@endsection