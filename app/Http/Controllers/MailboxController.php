<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masterfile;
use App\Models\Dbsc;

class MailboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dbsc = Dbsc::find(auth()->user()->id);
        if($dbsc){
            $data = Masterfile::where('MOD_ID',$dbsc->modid)->orderBy('MERGED','DESC')->get();
            // return $data; exit;
            return view('apps-mailbox',compact('data'));
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dbsc = Dbsc::find(auth()->user()->id);
        $mail =  Masterfile::where('MERGED',$id)->first();
        return view('apps-mailview',compact('mail'),compact('dbsc'));
    }
}
