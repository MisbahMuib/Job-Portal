@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach($applicants as $applicant)
                <div class="card-header">{{$applicant->title}}</div>

                    <div class="card-body">
                        <table class="table table-hover table-striped table-bordered">
                            <thead>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Resume</th>
                                <th>Cover Letter</th>
                            </thead>

                            <tbody>
                            @foreach($applicant->users as $user)
                                <tr>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->profile->address}}</td>
                                    <td>{{$user->profile->phone_number}}</td>
                                    <td>
                                        <a href="{{Storage::url($user->profile->resume)}}">Resure</a>
                                    </td>
                                    <td>
                                        <a href="{{Storage::url($user->profile->cover_letter)}}">Cover Letter</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
