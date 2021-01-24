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
              @if(empty(auth()->user()->company->logo))
                  <img src="{{asset('Images/logo.png')}}" alt="" width="100%" height="200">
              @else
                  <img src="{{asset('Images/logo')}}/{{auth()->user()->company->logo}}" alt="" width="100%" height="200">
              @endif


              <div class="card">
                  <form action="{{Route('company.logo')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="card-header">Update company logo</div>
                      <div class="card-body">
                          <input type="file" class="form-control" name="logo"> <br>
                          <button class="btn btn-success btn-block">upload</button>


                          @if($errors->has('logo'))
                              <div class="text-danger" >
                                  {{$errors->first('logo')}}
                              </div>
                          @endif
                      </div>
                  </form>
              </div>

          </div>
          <div class="col-md-5">
              <div class="card">
                  <div class="card-header">Update company information</div>

                  <div class="card-body">
                      <form action="{{Route('company.store')}}" method="post">
                          @csrf
                          <div class="form-group">
                              <label for="Address">Address</label>
                              <textarea name="address" id="" cols="30" rows="3" class="form-control">
                                  {{Auth::user()->company->address}}
                              </textarea>
                          </div>
                          @if($errors->has('address'))
                              <div class="text-danger" >
                                  {{$errors->first('address')}}
                              </div>
                          @endif

                          <div class="form-group">
                              <label for="phone">Phone Number</label>
                              <input type="number" class="form-control" name="phone" value="{{auth()->user()->company->phone}}">
                          </div>
                          @if($errors->has('phone'))
                              <div class="text-danger" >
                                  {{$errors->first('phone')}}
                              </div>
                          @endif

                          <div class="form-group">
                              <label for="website">Website</label>
                              <input type="text" class="form-control" name="website" value="{{auth()->user()->company->website}}">
                          </div>
                          @if($errors->has('website'))
                              <div class="text-danger" >
                                  {{$errors->first('website')}}
                              </div>
                          @endif
                          <div class="form-group">
                              <label for="phone">Slogan</label>
                              <input type="text" class="form-control" name="slogan" value="{{auth()->user()->company->slogan}}">
                          </div>
                          @if($errors->has('slogan'))
                              <div class="text-danger" >
                                  {{$errors->first('slogan')}}
                              </div>
                          @endif


                          <div class="form-group">
                              <label for="description">Description</label>
                              <textarea name="description" id="" cols="30" rows="3" class="form-control">
                                  {{Auth::user()->company->description}}
                              </textarea>
                          </div>
                          @if($errors->has('description'))
                              <div class="text-danger" >
                                  {{$errors->first('description')}}
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
                  <div class="card-header">Comapny Description</div>
                  <div class="card-body">
                      <p><b>Company Name :</b>{{Auth::user()->company->cname}}</p>
                      <p><b>Email :</b>{{Auth::user()->email}}</p>
                      <p><b>Company Type :</b>{{Auth::user()->user_type}}</p>
                      <p><b>Address :</b>{{Auth::user()->company->address}}</p>
                      <p><b>Company Page :</b><a href="{{Auth::user()->company->id}}/{{Auth::user()->company->slug}}">View</a></p>
                      <p><b>Phone Number :</b>{{Auth::user()->company->phone}}</p>
                      <p><b>Website :</b>{{Auth::user()->company->website}}</p>
                      <p><b>Slogan :</b>{{Auth::user()->company->slogan}}</p>
                      <p><b>Description :</b>{{Auth::user()->company->description}}</p>

                      <p><b>Member Since :</b>{{Auth::user()->created_at->diffForHumans()}}</p>

{{--                     @if(!empty(Auth::user()->profile->cover_letter))--}}
{{--                         <p>Cover Letter :--}}
{{--                             <a href="{{Storage::url(Auth::user()->profile->cover_letter)}}">Download cover letter</a>--}}
{{--                         </p>--}}
{{--                      @else--}}
{{--                         <p>Please upload your cover letter </p>--}}
{{--                      @endif--}}

{{--                       @if(!empty(Auth::user()->profile->resume))--}}
{{--                         <p>Resume :--}}
{{--                             <a href="{{Storage::url(Auth::user()->profile->resume)}}">Download resume</a>--}}
{{--                         </p>--}}
{{--                      @else--}}
{{--                         <p>Please upload your resume </p>--}}
{{--                      @endif--}}



                  </div>
              </div>
              <div class="card">
                  <form action="{{Route('company.coverphoto')}}" method="post" enctype="multipart/form-data">
                      @csrf
                      <div class="card-header">Update your cover photo</div>
                      <div class="card-body">
                          <input type="file" class="form-control" name="cover_photo"> <br>
                          <button class="btn btn-success btn-block">upload</button>
                      </div>
                  </form>
                  @if($errors->has('cover_photo'))
                      <div class="text-danger" >
                          {{$errors->first('cover_photo')}}
                      </div>
                  @endif
              </div>
          </div>
        </div>
    </div>
@endsection
