<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Masterfile;
use App\Models\Dbsc;
use App\Models\Markdowns;

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

        return response()->view('errors.404');
        
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
        $markdowns = Markdowns::where('MERGED',$id)->get();
        //check if the mod id matches
        
        if($mail['MOD_ID']==$dbsc->modid){
            return view('apps-mailview',compact('mail'),compact(['dbsc','markdowns']));
        }
        return response()->view('errors.404');

    }
}
