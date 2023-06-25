<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Response;

class UserManualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = DB::table('user_manual')->paginate(50);
        if($data){
            return view('user-manual.index',compact('data'))
                ->with('i', ($request->input('page', 1) - 1) * 50);
        }

        return response()->view('errors.404');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //return view('user-manual.show');

        return Response::make(file_get_contents('manual/DEPUTY_MANAGEMENT_USERS_MANUAL.pdf'), 200, [
            'content-type'=>'application/pdf',
        ]);
    }

    public function pdf() {
        // return Response::make(file_get_contents('manual/DEPUTY_MANAGEMENT_USERS_MANUAL.pdf'), 200, [
        //                'content-type'=>'application/pdf',
        //            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }
}
