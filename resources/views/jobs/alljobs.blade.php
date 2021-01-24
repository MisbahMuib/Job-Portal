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
                @foreach($alljobs as $job)
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
            {{$alljobs->links()}}
        </div>
       </div>
@endsection
