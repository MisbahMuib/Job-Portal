@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Job Post</div>
                    @if(Session::has('message'))
                        <div class="alert alert-success">
                             {{session::get('message')}}
                        </div>
                     @endif
                        <div class="card-body">
                             <form action="{{Route('jobs.store')}}" method="post">
                                     @csrf
                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                    @if($errors->has('title'))
                                         <div class="text-danger">
                                             {{$errors->first('title')}}
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label for="roles">Roles</label>
                                        <input type="text" name="roles" class="form-control">
                                    </div>
                                    @if($errors->has('roles'))
                                         <div class="text-danger">
                                             {{$errors->first('roles')}}
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <textarea name="description" id="" cols="30" rows="3" class="form-control"> </textarea>
                                    </div>
                                 @if($errors->has('description'))
                                     <div class="text-danger">
                                         {{$errors->first('description')}}
                                     </div>
                                 @endif

                                    <div class="form-group">
                                        <label for="position">Position</label>
                                        <input type="text" name="position" class="form-control">
                                    </div>

                                 @if($errors->has('position'))
                                     <div class="text-danger">
                                         {{$errors->first('position')}}
                                     </div>
                                 @endif

                                 <div class="form-group">
                                        <label for="category">Category</label>
                                     <option value=""> Select Category</option>
                                        <select name="category_id" id="" class="form-control">
                                            @foreach(App\Category::all() as $cat)
                                                <option value="{{$cat->id}}">{{$cat->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                 @if($errors->has('category_id'))
                                     <div class="text-danger">
                                         {{$errors->first('category_id')}}
                                     </div>
                                 @endif

                                 <div class="form-group">
                                         <label for="address">Address</label>
                                         <textarea name="address" id="" cols="30" rows="3" class="form-control"> </textarea>
                                    </div>
                                 @if($errors->has('address'))
                                     <div class="text-danger">
                                         {{$errors->first('address')}}
                                     </div>
                                 @endif

                                 <div class="form-group">
                                        <label for="type">Type</label>
                                        <select name="type" id="" class="form-control">
                                            <option value="">Select Type</option>
                                            <option value="Full Time">Full Time</option>
                                            <option value="Part Time">Part Time</option>
                                            <option value="Causal">Causal</option>
                                        </select>
                                    </div>
                                 @if($errors->has('type'))
                                     <div class="text-danger">
                                         {{$errors->first('type')}}
                                     </div>
                                 @endif

                                 <div class="form-group">
                                        <label for="status">Status</label>
                                        <select name="status" id="" class="form-control">
                                            <option value="">Select Status</option>
                                            <option value="live">Live</option>
                                            <option value="draft">Draft</option>
                                        </select>
                                    </div>
                                 @if($errors->has('status'))
                                     <div class="text-danger">
                                         {{$errors->first('status')}}
                                     </div>
                                 @endif

                                 <div class="form-group">
                                         <label for="last_date">Last Date</label>
                                         <input type="date" name="last_date" class="form-control">
                                     </div>
                                 @if($errors->has('last_date'))
                                     <div class="text-danger">
                                         {{$errors->first('last_date')}}
                                     </div>
                                 @endif

                                 <div class="form-group">
                                        <button class="btn btn-success btn-block" type="submit">Post</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
