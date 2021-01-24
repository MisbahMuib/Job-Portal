@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <table class="table table-striped table-hover">
                <thead>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                </thead>
                <tbody>
                @foreach($jobs as $job)
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
        <div class="pagination justify-content-center">
            {{$jobs->links()}}
        </div>
        <div>
            <a href="{{Route('jobs.alljobs')}}">
            <button class="btn btn-success btn-block" type="submit">
                show all jobs
            </button>
            </a>
        </div>
        <br> <br>
        <h2 class="font-weight-bold"><u>Feature Companies</u></h2>
        <br>
        <div class="row">
            @foreach($companies as $company)
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">{{$company->cname}}</h5>
                        <p class="card-text">{{str_limit($company->description,10)}}</p>
                        <a href="{{Route('company.index',[$company->id, $company->cname])}}">
                            <button class="btn btn-block btn-success">Company Details</button>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection
