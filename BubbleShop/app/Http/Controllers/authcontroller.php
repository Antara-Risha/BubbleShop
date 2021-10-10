<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class authcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sp=new User();
        $sp->name = $request->name;
        $sp->email = $request->email;
        $sp->phonenumber = $request->phonenumber;
        $sp->address = $request->address;
        $sp->password = Hash::make($request->password);
        $query=$sp->save();
        if($query){
            return redirect('login');
        }
    }
        function check(Request $request)
        {
            $request->validate([
                'email'=>'required|email',
                'password'=>'required|min:5|max:12'
            ]);
            $user = users::where('email','=',$request->email)->first();
            if($user)
            {
                if(Hash::check($request->password,$user->password))
        {
               $request->session()->put('loggeduser',$user->id);
               return redirect('signup');
        }
        else{
        return back() ->with('fail','invalid password');
            }
        }
        else {
        return back() ->with('fail','no account');
            }
    }

//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function create()
//     {
//         //
//     }

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//         //
//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  \App\serviceproviderregister  $serviceproviderregister
//      * @return \Illuminate\Http\Response
//      */
//     public function show(serviceproviderregister $serviceproviderregister)
//     {
//         //
//     }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  \App\serviceproviderregister  $serviceproviderregister
//      * @return \Illuminate\Http\Response
//      */
//     public function edit(serviceproviderregister $serviceproviderregister)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\serviceproviderregister  $serviceproviderregister
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, serviceproviderregister $serviceproviderregister)
//     {
//         //
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\serviceproviderregister  $serviceproviderregister
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy(serviceproviderregister $serviceproviderregister)
//     {
//         //
//     }
 

}