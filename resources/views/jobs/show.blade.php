@extends('layouts.app')

@section('content')
    <div class="container">
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> <b>  {{$job->title}}</b></div>

                    <div class="card-body">
                      <p>
                          <h3>Description</h3>
                        {{$job->description}}
                      </p>
                  <p>
                          <h3>Responsibilities</h3>
                        {{$job->roles}}
                      </p>
                    </div>
                </div>
            </div>
         <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Short Info</div>
                    <div class="card-body">
                        <p>Company :
                            <a href="{{Route('company.index',[$job->company->id, $job->company->cname])}}">
                            {{$job->company->cname}}
                            </a>
                        </p>
                        <p>Position : {{$job->position}}</p>
                        <p>Address : {{$job->address}}</p>
                        <p>Type : {{$job->type}}</p>
                        <p>Last Date : {{$job->last_date}}</p>

                        @if(Auth::check() && auth()->user()->user_type == 'Seeker')
                            @if(!$job->jobApplication())
                            <form action="{{Route('jobs.apply',[$job->id])}}" method="post">
                                @csrf
                                <button class="btn btn-success btn-block" type="submit">Apply</button>
                            </form>
                            @else
                                <button class="btn btn-outline-danger btn-block disabled" type="submit" >Already Applied</button>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
