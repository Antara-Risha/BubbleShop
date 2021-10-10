<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

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
        $sp->password = $request->password;
        $query=$sp->save();
        if($query){
            return redirect('login');
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

