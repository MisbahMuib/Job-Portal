<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('Employer', ['except' => array('index')]);
    }





//    public  function  index($id, Company $company){
//
//        return view('company.index',compact('company'));
//    }
    public  function  index($id){
        $company = Company::findOrFail($id);
        return view('company.index',compact('company'));
    }

    public  function  create(){
        return view('company.create');
    }

    public  function store(Request $request){
        $this->validate($request,[
            'address' =>'required',
            'phone' =>'required|numeric',
            'website' =>'required',
            'slogan' =>'required',
            'description' =>'required|min:20',
        ]);

        $user_id = auth()->user()->id;
        Company::where('user_id', $user_id)->update([
            'address' => request('address'),
            'phone' => request('phone'),
            'website' => request('website'),
            'slogan' => request('slogan'),
            'description' => request('description'),
        ]);

        return redirect()->back()->with('message','Company Profile Updated Successfully!!');
    }

    public function  coverphoto(Request $request){
        $this->validate($request, [
            'cover_photo' => 'required|mimes:jpg,jpeg,png|max:5000'
        ]);
        $user_id = auth()->user()->id;
        if($request->hasFile('cover_photo')){
            $file = $request->file('cover_photo');
            $text = $file->getClientOriginalExtension();
            $filename = time().'.'.$text;
            $file->move('Images/cover_photo',$filename);


            Company::where('user_id', $user_id)->update([
                'cover_photo' => $filename,
            ]);
          }
        return redirect()->back()->with('message','Cover Photo uploaded Successfully!');
    }
    public function  logo(Request $request){
        $this->validate($request, [
            'logo' => 'required|mimes:jpg,jpeg,png|max:5000'
        ]);
        $user_id = auth()->user()->id;
        if($request->hasFile('logo')){
            $file = $request->file('logo');
            $text = $file->getClientOriginalExtension();
            $filename = time().'.'.$text;
            $file->move('Images/logo',$filename);


            Company::where('user_id', $user_id)->update([
                'logo' => $filename,
            ]);
          }
        return redirect()->back()->with('message','Logo uploaded Successfully!');
    }

}
