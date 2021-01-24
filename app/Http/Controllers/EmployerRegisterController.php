<?php

namespace App\Http\Controllers;

use App\Company;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployerRegisterController extends Controller
{

    public  function  store(){
        $user =  User::create([
            'email' => request('email'),
            'user_type' => 'Employer',
            'password' => Hash::make(request('password')),
        ]);

        Company::create([
            'user_id' => $user->id,
            'cname' => request('cname'),
            'slug' => str_slug(request('cname')),
        ]);
        return  redirect('login');
    }
}
