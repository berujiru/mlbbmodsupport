<?php

namespace App\Http\Controllers;

use App\Models\Dbsc;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserTypeController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = UserType::orderBy('user_type','ASC')->paginate(10);
        if($data){
            return view('user-type.index',compact('data'))
                ->with('i', ($request->input('page', 1) - 1) * 50);
        }

        return response()->view('errors.404');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_type' => 'required',
        ]);

        $input = $request->all();
        $usertype = new UserType();
        $usertype->user_type = $input['user_type'];
        if($usertype->save()) {
            $show = 'success';
            $message = 'User type added successfully.';
        } else {
            $show = 'error';
            $message = 'User type was not created.';
        }
        return redirect()->route('user-type.index')->with($show,$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserType  $usertype
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $data = Dbsc::orderBy('modid','ASC')->paginate(200);
        $user_types = UserType::select(['user_type_id','user_type'])->get();
        $list_active_user = Dbsc::select(['dbsc.id','modid','firstname','lastname'])
                ->join('users', 'dbsc.id', '=', 'users.id')
                ->where('users.status','=',1)
                ->get();
        if($data){
            return view('user-type.mods',compact('data','user_types','list_active_user'))
                ->with('i', ($request->input('page', 1) - 1) * 200);
        }

        return response()->view('errors.404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserType  $usertype
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usertype = UserType::find($id);
        return view('user-type.edit',compact('usertype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserType  $usertype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'user_type' => 'required',
        ]);
    
        $input = $request->all();
        $usertype = UserType::find($id);
        $usertype->user_type = $input['user_type'];
        if($usertype->save()) {
            $show = 'success';
            $message = 'User type updated successfully.';
        } else {
            $show = 'error';
            $message = 'Failed to update user type.';
        }
        return redirect()->route('user-type.index')->with($show,$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserType  $usertype
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check_profile = DB::table('dbsc')->join('user_type', 'user_type.user_type_id', '=', 'dbsc.user_type_id')->where('dbsc.user_type_id',$id)->count();
        $check_manual_access = DB::table('user_manual_access')->join('user_type', 'user_type.user_type_id', '=', 'user_manual_access.user_type_id')->where('user_manual_access.user_type_id',$id)->count();

        if($check_profile > 0 || $check_manual_access > 0) {
            $show = 'error';
            $message = "Can't delete user type due to existing related records.";
        } else {
            $delete = UserType::find($id)->delete();
            if($delete) {
                $show = 'success';
                $message = 'User type deleted successfully.';
            } else {
                $show = 'error';
                $message = 'Failed to delete user type.';
            }
        }
        return redirect()->route('user-type.index')->with($show,$message);
    }

    public function remove($id)
    {
        // $id = (int) $id;

        // $check = DB::table('dbsc')
        //     ->where('id','=',$id)
        //     ->where('status','=',1)
        //     ->count();

        // if($check < 1) {
        //     $show = 'error';
        //     $message = "You can't delete an already deleted account.";
        // } else {
        //     $user = User::find($id);
        //     $old_name = $user->name;
        //     $old_email = $user->email;
        //     $user->name = 'DELETED'.$old_name;
        //     $user->email = 'DELETED'.$old_email;
        //     $user->status = 100;
        //     if($user->save()) {
        //         $show = 'success';
        //         $message = 'Account deleted and successfully removed access.';
        //     } else {
        //         $show = 'error';
        //         $message = 'Failed to remove account.';
        //     }
        // }

        // return redirect()->route('deactivate-user.index')->with($show,$message);
    }
}
