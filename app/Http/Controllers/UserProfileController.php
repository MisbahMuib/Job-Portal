<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public  function __construct()
    {
        $this->middleware('Seeker');
    }

    public  function  index(){
        return view('user.profile');
    }
    public  function store(Request $request){
        $this->validate($request,[
           'address' =>'required',
           'phone_number' =>'required|numeric',
           'experience' =>'required|min:20',
           'bio' =>'required|min:20',
        ]);

        $user_id = auth()->user()->id;
        Profile::where('user_id', $user_id)->update([
            'address' => request('address'),
            'phone_number' => request('phone_number'),
            'experience' => request('experience'),
            'bio' => request('bio'),
        ]);

        return redirect()->back()->with('message','Profile Updated Successfully!!');
    }

    public function  coverletter(Request $request){
        $this->validate($request, [
            'cover_letter' => 'required|mimes:doc,docx,pdf|max:5000'
        ]);
        $user_id = auth()->user()->id;
        $cover = $request->file('cover_letter')->store('public/files');
        Profile::where('user_id', $user_id)->update([
            'cover_letter' => $cover,
        ]);

        return redirect()->back()->with('message','Cover letter uploaded Successfully!!');
    }
    public function  resume(Request $request){
        $this->validate($request, [
            'resume' => 'required|mimes:doc,docx,pdf|max:5000'
        ]);
        $user_id = auth()->user()->id;
        $resume = $request->file('resume')->store('public/files');
        Profile::where('user_id', $user_id)->update([
            'resume' => $resume,
        ]);

        return redirect()->back()->with('message','Resume uploaded Successfully!!');
    }

    public function avatar(Request $request){
        $this->validate($request, [
            'avatar' => 'required|mimes:jpg,jpeg,png|max:5000'
        ]);
        $user_id = auth()->user()->id;
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            $text = $file->getClientOriginalExtension();
            $filename = time().'.'.$text;
            $file->move('Images/avatar',$filename);

            Profile::where('user_id', $user_id)->update([
                'avatar' => $filename,
            ]);

        }
        return redirect()->back()->with('message',' profile photo updated successfully!');
    }
}
