@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
        @endif
        <div class="row ">

          <div class="col-md-3">
              @if(empty(auth()->user()->profile->avatar))
                  <img src="{{asset('Images/logo.png')}}" alt="" width="100%" height="200">
              @else
                  <img src="{{asset('Images/avatar')}}/{{auth()->user()->profile->avatar}}" alt="" width="100%" height="200">
              @endif


              <div class="card">
                  <form action="{{Route('profile.avatar')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="card-header">Update your photo</div>
                      <div class="card-body">
                          <input type="file" class="form-control" name="avatar"> <br>
                          <button class="btn btn-success btn-block">upload</button>


                          @if($errors->has('avatar'))
                              <div class="text-danger" >
                                  {{$errors->first('avatar')}}
                              </div>
                          @endif
                      </div>
                  </form>
              </div>

          </div>
          <div class="col-md-5">
              <div class="card">
                  <div class="card-header">Update your information</div>

                  <div class="card-body">
                      <form action="{{Route('profile.store')}}" method="post">
                          @csrf
                          <div class="form-group">
                              <label for="Address">Address</label>
                              <textarea name="address" id="" cols="30" rows="3" class="form-control">
                                  {{Auth::user()->profile->address}}
                              </textarea>
                          </div>
                          @if($errors->has('address'))
                              <div class="text-danger" >
                                  {{$errors->first('address')}}
                              </div>
                          @endif

                          <div class="form-group">
                              <label for="phone_number">Phone Number</label>
                              <input type="number" class="form-control" name="phone_number" value="{{auth()->user()->profile->phone_number}}">
                          </div>
                          @if($errors->has('phone_number'))
                              <div class="text-danger" >
                                  {{$errors->first('phone_number')}}
                              </div>
                          @endif
                          <div class="form-group">
                              <label for="experience">Experience</label>
                              <textarea name="experience" id="" cols="30" rows="3" class="form-control">
                                  {{Auth::user()->profile->experience}}
                              </textarea>
                          </div>
                          @if($errors->has('experience'))
                              <div class="text-danger" >
                                  {{$errors->first('experience')}}
                              </div>
                          @endif
                          <div class="form-group">
                              <label for="bio">Bio Data</label>
                              <textarea name="bio" id="" cols="30" rows="3" class="form-control">
                                  {{Auth::user()->profile->bio}}
                              </textarea>
                          </div>
                          @if($errors->has('bio'))
                              <div class="text-danger" >
                                  {{$errors->first('bio')}}
                              </div>
                          @endif
                          <div class="form-group">
                          <button class="btn btn-success btn-block" type="submit">Add</button>
                          </div>
                      </form>
                  </div>

              </div>
          </div>
          <div class="col-md-4">
              <div class="card">
                  <div class="card-header">User Description</div>
                  <div class="card-body">
                      <p><b>Name :</b>{{Auth::user()->name}}</p>
                      <p><b>Email :</b>{{Auth::user()->email}}</p>
                      <p><b>User Type :</b>{{Auth::user()->user_type}}</p>
                      <p><b>Address :</b>{{Auth::user()->profile->address}}</p>
                      <p><b>Phone Number :</b>{{Auth::user()->profile->phone_number}}</p>
                      <p><b>Experience :</b>{{Auth::user()->profile->experience}}</p>
                      <p><b>Bio Data :</b>{{Auth::user()->profile->bio}}</p>
                      <p><b>Member Since :</b>{{Auth::user()->created_at->diffForHumans()}}</p>

                     @if(!empty(Auth::user()->profile->cover_letter))
                         <p>Cover Letter :
                             <a href="{{Storage::url(Auth::user()->profile->cover_letter)}}">Download cover letter</a>
                         </p>
                      @else
                         <p>Please upload your cover letter </p>
                      @endif

                       @if(!empty(Auth::user()->profile->resume))
                         <p>Resume :
                             <a href="{{Storage::url(Auth::user()->profile->resume)}}">Download resume</a>
                         </p>
                      @else
                         <p>Please upload your resume </p>
                      @endif



                  </div>
              </div>
              <div class="card">
                  <form action="{{Route('profile.coverletter')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="card-header">Update your cover letter</div>
                      <div class="card-body">
                          <input type="file" class="form-control" name="cover_letter"> <br>
                          <button class="btn btn-success btn-block">upload</button>
                      </div>
                  </form>
                  @if($errors->has('cover_letter'))
                      <div class="text-danger" >
                          {{$errors->first('cover_letter')}}
                      </div>
                  @endif
              </div>

              <div class="card">
                  <form action="{{Route('profile.resume')}}" method="post" enctype="multipart/form-data">
                      @csrf
                  <div class="card-header">Update your resume</div>
                  <div class="card-body">
                      <input type="file" class="form-control" name="resume"> <br>
                      <button class="btn btn-success btn-block">upload</button>
                  </div>
                  </form>
                  @if($errors->has('resume'))
                      <div class="text-danger" >
                          {{$errors->first('resume')}}
                      </div>
                  @endif
              </div>

          </div>
        </div>
    </div>
@endsection
