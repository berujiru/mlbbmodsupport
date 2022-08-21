<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dbsc;
use App\Models\Team;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use Illuminate\Support\Facades\Hash;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function moderator($moderator_email)
    {
        $dbsc = Dbsc::find($moderator_email);
        return view('pages-profile-visit',compact('dbsc'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $users = Dbsc::select(DB::raw("CONCAT(firstname,' ',lastname) as full_name"),'users.avatar as avatar','users.id as username')->leftJoin('users', 'users.id', '=', 'dbsc.id')->where('firstname', 'LIKE', '%'.$request->matchvalue.'%')->orwhere('lastname', 'LIKE', '%'.$request->matchvalue.'%')->get();

        $list="";

        if($users){
            foreach($users as $user){
                $list .= '<a href="/profile/'.$user->username.'" class="d-flex dropdown-item notify-item py-2"><img src="'.'images/'.$user->avatar.'" class="me-3 rounded-circle avatar-xs"
                alt="user-pic"><div class="flex-1">
                <h6 class="m-0">'.$user->full_name.'</h6><span class="fs-11 mb-0 text-muted">Manager</span></div></a>';
            }
        }else{
            $list .= 'Not Found';
        }
        
        return($list);
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
        $team = Team::get();
        $team=$team->pluck('team_name','team_id');
        return view('pages-profile-settings',compact(['dbsc','team']));
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
            'team_id'=> 'required',
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
                'team_id' => $request->team_id,
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

    /**
     * Show the form for editing the profile.
     *
     * @return \Illuminate\View\View
     */
    public function loginedit()
    {
        return view('profile.edit');
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginupdate(ProfileRequest $request)
    {
        auth()->user()->update($request->all());

        return back()->withStatus(__('Profile successfully updated.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withStatusPassword(__('Password successfully updated.'));
    }
    
}
