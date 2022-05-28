<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dbsc;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //      $this->middleware('permission:profile-list', ['only' => ['index']]);
    //     $this->middleware('permission:role-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:profile-edit', ['only' => ['edit','update']]);
    //     $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dbsc = Dbsc::find(auth()->user()->id);
        return view('pages-profile',compact('dbsc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $dbsc = Dbsc::find(auth()->user()->id);
        
        return view('pages-profile-settings',compact('dbsc'));
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $this->validate($request, [
            'modid'=> 'required',
            'firstname'=> 'required',
            'middlename'=> 'required|max:1',
            'lastname'=> 'required',
            'contactno'=> 'required',
            'email'=> 'required|email',
            'fblink'=> 'required',
            'team'=> 'required',
            'designation'=> 'required',
            'birthday'=> 'required',
            'age'=> 'required|numeric',
            'sex'=> 'required',
            'location'=> 'required',
            'igname'=> 'required',
            'ignid'=> 'required',
            'igserver'=> 'required',
            'description'=> 'required',
        ],[
            'required'=>':attribute is required',
            'max'=>'max character is 1',
        ]);

        Dbsc::updateOrCreate(
            ['id'=>auth()->user()->id],
            [
                'id' => auth()->user()->id,
                'modid' => $request->modid,
                'firstname' => $request->firstname,
                'middlename' =>$request->middlename,
                'lastname' => $request->lastname,
                'contactno' => $request->contactno,
                'email' => $request->email,
                'fblink' => $request->fblink,
                'team' => $request->team,
                'designation' => $request->designation,
                'birthday' => $request->birthday,
                'age' => $request->age,
                'sex' => $request->sex,
                'location' => $request->location,
                'igname' => $request->igname,
                'ignid' => $request->ignid,
                'igserver' => $request->igserver,
                'description'=> $request->description,
        ]
        );

        return redirect()->route('profile')->with('success','Account updated successfully');
    }

    
}
