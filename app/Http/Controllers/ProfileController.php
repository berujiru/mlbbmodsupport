<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dbsc;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:profile-list', ['only' => ['index']]);
        //  $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:profile-edit', ['only' => ['edit','update']]);
        //  $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

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
        $dbsc = Dbsc::find(auth()->user()->name);
        
    
        return view('pages-profile-settings',compact('dbsc'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dbsc = Dbsc::find($id);
        return view('pages-profile-settings',compact('dbsc'));
    }
}
