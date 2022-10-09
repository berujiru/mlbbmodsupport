<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nte;
use App\Models\Ntereply;
use App\Models\Dbsc;
use App\Models\Nteseen;

class NteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dbsc = Dbsc::find(auth()->user()->id);
        if($dbsc){
            $data = Nte::where('MODID',$dbsc->modid)->orderBy('id','DESC')->get();
            return view('apps-nte',compact('data'));
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
        $mail =  Nte::where('id',$id)->first();

        $nte_up = Nte::find($id);
        $nte_up->is_seen = 1;
        $nte_up->date_seen = date("Y-m-d H:i:s");
        $nte_up->save();

        $nte_seen = new Nteseen();
        $nte_seen->id_nte = $id;
        $nte_seen->mod_id = $dbsc->modid;
        $nte_seen->nte_code = $mail->UniqueID;
        $nte_seen->is_seen = 1; //default seen
        $nte_seen->date_seen = date("Y-m-d H:i:s");
        $nte_seen->seen_by = auth()->user()->id;
        $nte_seen->created_at = date("Y-m-d H:i:s");
        $nte_seen->save();

        //check if the mod id matches
        if($mail['MODID']==$dbsc->modid){
            $mailreply = Ntereply::where('ntecode',$mail->UniqueID)->get();
            return view('apps-nteview',compact('mail'),compact(['dbsc','mailreply']));
        }
        return response()->view('errors.404');

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
            'content' => 'required',
        ]);

        $input = $request->all();
        $nte = new Ntereply();
        $nte->ntecode = $input['ntecode'];
        $nte->content = $input['content'];
        if($nte->save()) {
            $show = 'success';
            $message = 'Replied successfully.';
        } else {
            $show = 'error';
            $message = 'Reply failed.';
        }
        return redirect()->route('nteview',$input['nteid'])->with($show,$message);
    }
}
