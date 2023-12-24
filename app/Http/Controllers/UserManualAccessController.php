<?php

namespace App\Http\Controllers;

use App\Models\Dbsc;
use App\Models\UserManual;
use App\Models\UserManualAccess;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserManualAccessController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // if(isset($_GET['search_opt']) || isset($_GET['k_search']) || isset($_GET['f_user_type'])) {
        //     $search_opt = $request->input('search_opt');
        //     $k_search = $request->input('k_search');
        //     $usertype = $request->input('f_user_type');

        //     if($search_opt == 'mod_id') {
        //         $data = Dbsc::where('modid','LIKE',"%{$k_search}%")->orderBy('modid','ASC')->paginate(200);
        //     } elseif($search_opt == 'user_type') {
        //         $data = Dbsc::where('user_type_id',$usertype)->orderBy('modid','ASC')->paginate(200);
        //     } else {
        //         $data = Dbsc::orderBy('modid','ASC')->paginate(200); 
        //     }
        // } else {
            $data = UserManualAccess::orderBy('created_at','DESC')->paginate(200);
        // }
        
        $user_types = UserType::select(['user_type_id','user_type'])->get();
        // $list_active_user = Dbsc::select(['dbsc.id','modid','firstname','lastname'])
        //         ->join('users', 'dbsc.id', '=', 'users.id')
        //         ->where('users.status','=',1)
        //         ->get();
        $user_manuals = UserManual::select(['user_manual_id','manual_name'])->get();
        if($data){
            return view('user-manual-access.index',compact('data','user_types','user_manuals'))
                ->with('i', ($request->input('page', 1) - 1) * 200);
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
        return view('user-manual-access.create');
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
            'user_manual' => 'required',
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
        $user_types = UserType::select(['user_type_id','user_type'])->get();
        $user_manuals = UserManual::select(['user_manual_id','manual_name'])->get();
        $data = UserManualAccess::find($id);
        return view('user-manual-access.edit',compact('data','user_types','user_manuals'));
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
            'user_manual' => 'required',
        ]);
    
        $input = $request->all();

        $check = DB::table('user_manual_access')->where('user_type_id',$input['user_type'])->where('user_manual_id',$input['user_manual'])->count();
        if($check < 1) {
            $access = UserManualAccess::find($id);
            $access->user_type_id = $input['user_type'];
            $access->user_manual_id = $input['user_manual'];
            if($access->save()) {
                $show = 'success';
                $message = 'User manual access updated successfully.';
            } else {
                $show = 'error';
                $message = 'Failed to update user manual access.';
            }
        } else {
            $show = 'error';
            $message = 'No changes were made. User manual is already assigned to the selected user type.';
        }
        return redirect()->route('user-manual-access.index')->with($show,$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserType  $usertype
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = UserManualAccess::find($id)->delete();
        if($delete) {
            $show = 'success';
            $message = 'User manual access removed successfully.';
        } else {
            $show = 'error';
            $message = 'Failed to remove user manual access.';
        }
        return redirect()->route('user-manual-access.index')->with($show,$message);
    }

    public function assign_access()
    {
        $user_type = $_POST['user_type'] ?? null;
        $manuals = $_POST['user_manual'] ?? null;

        //if(count($_POST['profiles']) == 1) {
        //     $profiles = explode("",$profiles);
        // }
        
        if(!empty($manuals) && !empty($user_type)) {
            // if($_POST['manuals'] == 1) {
            //     foreach($manuals as $m) {
            //             $update = DB::table('dbsc')
            //             ->where('id', $m)
            //             ->update(['user_type_id' => (int) $user_type]);
    
            //             if($update) {
            //                 $pass = 1;
            //             } else {
            //                 $pass = 0;
            //             }
            //     }
            // } else {
            //     $id = (int) $profiles;
            //     $update = DB::table('dbsc')
            //             ->where('id', $id)
            //             ->update(['user_type_id' => (int) $user_type]);
                
            //     if($update) {
            //         $pass = 1;
            //     } else {
            //         $pass = 0;
            //     }
            // }

            foreach($manuals as $m) {

                $check = DB::table('user_manual_access')->where('user_type_id',$user_type)->where('user_manual_id',$m)->count();

                if($check > 0) {
                    continue;
                } else {
                    $access = new UserManualAccess();
                    $access->user_type_id = (int) $user_type;
                    $access->user_manual_id = $m;
                    if($access->save()) {
                        $pass = 1;
                    } else {
                        $pass = 0;
                    }
                }
            }

            if($pass == 1) {
                $response = true;
                $show = 'success';
                $message = 'Successfully assigned user manual access.';
            } else {
                $show = 'error';
                $response = false;
                $message = 'Action failed!';
            }
        } else {
            $response = false;
            $show = 'error';
            $message = 'User type and user manual are required!';
        }
        
        return json_encode(['response'=>$response,'show'=>$show,'message'=>$message]);
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
