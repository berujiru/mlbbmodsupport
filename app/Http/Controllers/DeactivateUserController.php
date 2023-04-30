<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Hash;
use Illuminate\Support\Arr;

class DeactivateUserController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if((isset($_GET['search_opt']) && isset($_GET['k_search']))) {
            $search_opt = $request->input('search_opt');
            $word_search = $request->input('k_search');

            if(isset($_GET['f_status'])) {
                $filter_status = (int) $request->input('f_status');
                $status = $filter_status > 0 ? 1 : 100;
                if(!empty($search_opt) && $search_opt === 'uname') {
                    $data = User::select('*')
                        ->where('name','LIKE',"%{$word_search}%")
                        ->where('status','=',$status)
                        ->orderBy('id','DESC')->paginate(20);
                } elseif (!empty($search_opt) && $search_opt === 'email') {
                    $data = User::select('*')
                        ->where('email','LIKE',"%{$word_search}%")
                        ->where('status','=',$status)
                        ->orderBy('id','DESC')->paginate(20);
                } elseif (!empty($search_opt) && $search_opt === 'mod_id') {
                    $data = User::select('*')
                        ->join('dbsc', 'dbsc.id', '=', 'users.id')
                        ->where('modid','LIKE',"%{$word_search}%")
                        ->where('users.status','=',$status)
                        ->orderBy('users.id','DESC')->paginate(20);
                } else {
                    $data = User::select('*')
                        ->where('status','=',$status)
                        ->orderBy('id','DESC')->paginate(20);
                }
            } else {
                if(!empty($search_opt) && $search_opt === 'uname') {
                    $data = User::select('*')
                        ->where('name','LIKE',"%{$word_search}%")
                        ->orderBy('id','DESC')->paginate(20);
                } elseif (!empty($search_opt) && $search_opt === 'email') {
                    $data = User::select('*')
                        ->where('email','LIKE',"%{$word_search}%")
                        ->orderBy('id','DESC')->paginate(20);
                } elseif (!empty($search_opt) && $search_opt === 'mod_id') {
                    $data = User::select('*')
                        ->join('dbsc', 'dbsc.id', '=', 'users.id')
                        ->where('modid','LIKE',"%{$word_search}%")
                        ->orderBy('id','DESC')->paginate(20);
                } else {
                    $data = User::orderBy('id','DESC')->paginate(20);
                }
            }
        } else {
            $data = User::orderBy('id','DESC')->paginate(20);
        }

        //$data = User::orderBy('id','DESC')->paginate(1000);

        $list_active_user = User::select(['id','email','name'])->where('status','=',1)->get();

        return view('users.index2',compact('data','list_active_user'))
            //->with('i', ($request->input('page', 1) - 1) * 1000);
            ->with('i', ($request->input('page', 1) - 1) * 20);
    }

    public function remove($id)
    {
        $id = (int) $id;

        $check = DB::table('users')
            ->where('id','=',$id)
            ->where('status','=',1)
            ->count();

        if($check < 1) {
            $show = 'error';
            $message = "You can't delete an already deleted account.";
        } else {
            $user = User::find($id);
            $old_name = $user->name;
            $old_email = $user->email;
            $user->name = 'DELETED'.$old_name;
            $user->email = 'DELETED'.$old_email;
            $user->status = 100;
            if($user->save()) {
                $show = 'success';
                $message = 'Account deleted and successfully removed access.';
            } else {
                $show = 'error';
                $message = 'Failed to remove account.';
            }
        }

        return redirect()->route('deactivate-user.index')->with($show,$message);
    }

    public function restore($id)
    {
        $id = (int) $id;

        $check = DB::table('users')
            ->where('id','=',$id)
            ->where('status','=',100)
            ->count();

        if($check < 1) {
            $show = 'error';
            $message = "You can't restore an already active account.";
        } else {
            $user = User::find($id);
            $old_name = $user->name;
            $old_email = $user->email;
            $user->name = str_replace("DELETED","",$old_name);
            $user->email = str_replace("DELETED","",$old_email);
            $user->status = 1;
            if($user->save()) {
                $show = 'success';
                $message = 'Account successfully restored.';
            } else {
                $show = 'error';
                $message = 'Failed to restore account.';
            }
        }

        return redirect()->route('deactivate-user.index')->with($show,$message);
    }

    public function removemultiple()
    {
        $ids = $_POST['email_add'];
        if(!empty($ids)) {
            //$users = explode(",",$ids);
            foreach($ids as $id) {
                $check = DB::table('users')
                ->where('id','=',$id)
                ->where('status','=',1)
                ->count();

                $pass = 0;

                if($check < 1) {
                    continue;
                } else {
                    $user = User::find($id);
                    $old_name = $user->name;
                    $old_email = $user->email;
                    $user->name = 'DELETED'.$old_name;
                    $user->email = 'DELETED'.$old_email;
                    $user->status = 100;
                    if($user->save()) {
                        //$show = 'success';
                        //$message = 'Account deleted and successfully removed access.';
                        $pass = 1;
                    } else {
                        // $show = 'error';
                        // $message = 'Failed to remove account.';
                        $pass = 0;
                    }
                }
            }

            if($pass == 1) {
                $response = true;
                $show = 'error';
                $message = 'Accounts deleted and successfully removed access.';
            } else {
                $show = 'error';
                $response = false;
                $message = 'Action failed!';  
            }
            //return redirect()->route('deactivate-user.index')->with($show,$message);
            return json_encode(['response'=>$response,'show'=>$show,'message'=>$message]);
        }
    }
}