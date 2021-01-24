@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
         <div class="company-profile">
             @if(empty(auth()->user()->company->cover_photo))
                 <img src="{{asset('Images/coverPhoto.jpg')}}" alt="" width="100%" height="200px">
             @else
                 <img src="{{asset('Images/cover_photo')}}/{{auth()->user()->company->cover_photo}}" alt="" width="100%" height="200px">
             @endif
         </div>
            <br>
            <div class="company-desc">
                @if(empty(auth()->user()->company->logo))
                    <img src="{{asset('Images/logo.png')}}" alt="" width="100px" height="200px">
                @else
                    <img src="{{asset('Images/logo')}}/{{auth()->user()->company->logo}}" alt="" width="100px" height="200px">
                @endif

                <h1>{{$company->cname}}</h1>
                <p>{{$company->description}}</p>
                <p><b>Slogan :</b>{{$company->slogan}}</p>
                <p><b>Address :</b>{{$company->address}}</p>
                <p><b>Phone :</b>{{$company->phone}}</p>
                <p><b>Website :</b>{{$company->website}}</p>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                </thead>
                <tbody>
                @foreach($company->jobs as $job)
                    <tr>
                        <td><img src="{{asset('Images/logo.png')}}" alt="" class="img-fluid"> </td>
                        <td>Position : {{$job->position}} <br>
                            Job Type : <i class="fa fa-clock fa-2x"></i> &nbsp; {{$job->type}}
                        </td>
                        <td>Address : <i class="fa fa-map-marker fa-2x"> &nbsp;</i> {{$job->address}}</td>
                        <td> <i class="fa fa-calendar-check fa-2x"></i> Date : {{$job->created_at->diffForHumans()}}</td>
                        <td>
                            <a href="{{Route('jobs.show',[$job->id, $job->slug])}}">
                                <button class="btn btn-outline-success">Apply</button>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
