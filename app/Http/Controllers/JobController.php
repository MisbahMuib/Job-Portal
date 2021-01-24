<?php

namespace App\Http\Controllers;

use App\Company;
use App\job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\jobPostRequest;

class JobController extends Controller
{

    public function __construct()
    {
        $this->middleware('Employer', ['except' => array('index',)]);
    }

    public  function  index(){
        $jobs = job::paginate(5);
        //$jobs = job::all()->take(5);
        $companies = Company::all()->take(12);
//        $jobs = job::all();
        return view('welcome',compact('jobs','companies'));
    }

//    public  function  show($id, job $job){   // $job = Job::findOrFail($id);
//
//        return view('jobs.show', compact('job'));
//    }
    public  function  show($id){
       $job = job::findOrFail($id);

        return view('jobs.show', compact('job'));
    }

    public  function create(){
        return view('jobs.create');
    }

    public  function  store(jobPostRequest $request){
        $user_id = Auth::user()->id;
        $company = Company::where('user_id', $user_id)->first();
        $company_id = $company->id;
        job::create([
            'user_id' => $user_id,
            'company_id' => $company_id,
            'title' => request('title'),
            'slug' => str_slug(request('title')),
            'roles' => request('roles'),
            'description' => request('description'),
            'category_id' => request('category_id'),
            'position' => request('position'),
            'address' => request('address'),
            'type' => request('type'),
            'last_date' => request('last_date'),
        ]);

        return redirect()->back()->with('message','Job Posted successfully');
    }

    public function myjobs(){
        $jobs = job::where('user_id',Auth::user()->id)->get();
        return view('jobs.myjobs',compact('jobs'));
    }

    public function apply(Request $request, $id){
        $jobId = job::find($id);
        $jobId->users()->attach(auth()->user()->id);
        return redirect()->back()->with('message','Job applied successfully!');
    }

    public  function  applicants(){
        $applicants = job::has('users')->where('user_id', auth()->user()->id)->get(); /// users is a function that store data  in job model

        return view('jobs.applicants',compact('applicants'));
    }
    public function alljobs(){
        $alljobs = job::paginate(8);
//        $alljobs = job::all();
        return view('jobs.alljobs',compact('alljobs'));
    }
}
