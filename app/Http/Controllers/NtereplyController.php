<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nte;
use App\Models\Ntereply;
use App\Models\Dbsc;
use App\Models\Infractions;
use Illuminate\Support\Facades\DB;

class NtereplyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        //$this->middleware('permission:ntereply-list', ['only' => ['index']]);
    }
    
    public function index(Request $request)
    {
        if(isset($_GET['mod_id']) || isset($_GET['nte_code'])) {
            $mod_id = (int) $request->input('mod_id');
            $nte_code = $request->input('nte_code');
            if($mod_id > 0 && !empty($nte_code)) {
                $data = Nte::select('nte.*','ntereply.content as content','ntereply.id as replyid')->leftJoin('ntereply', 'nte.UniqueID', '=', 'ntereply.ntecode')
                    ->where('nte.UniqueID','LIKE',"%{$nte_code}%")->where('nte.MODID',$mod_id)
                    ->groupBy('nte.UniqueID')
                    ->orderBy('nte.id','DESC')->paginate(20);
            } elseif($mod_id > 0 && empty(trim($nte_code))) {
                $data = Nte::select('nte.*','ntereply.content as content','ntereply.id as replyid')->leftJoin('ntereply', 'nte.UniqueID', '=', 'ntereply.ntecode')
                    ->where('nte.MODID',$mod_id)
                    ->groupBy('nte.UniqueID')
                    ->orderBy('nte.id','DESC')->paginate(20);
            } elseif($mod_id < 1 && !empty(trim($nte_code))) {
                $data = Nte::select('nte.*','ntereply.content as content','ntereply.id as replyid')->leftJoin('ntereply', 'nte.UniqueID', '=', 'ntereply.ntecode')
                    ->where('nte.UniqueID','LIKE',"%{$nte_code}%")
                    ->groupBy('nte.UniqueID')
                    ->orderBy('nte.id','DESC')->paginate(20);
            } else {
                $data = Nte::select('nte.*','ntereply.content as content','ntereply.id as replyid')->leftJoin('ntereply', 'nte.UniqueID', '=', 'ntereply.ntecode')->groupBy('nte.UniqueID')->orderBy('nte.id','DESC')->paginate(20);
            }
        } else {
           $data = Nte::select('nte.*','ntereply.content as content','ntereply.id as replyid')->leftJoin('ntereply', 'nte.UniqueID', '=', 'ntereply.ntecode')->groupBy('nte.UniqueID')->orderBy('nte.id','DESC')->paginate(20);
        }

        //$data = Ntereply::orderBy('ntereply.ntecode','ASC')->get();
        $infractions = Infractions::select(['id','code','detail'])->where('status',1)->get();
        $mods = Dbsc::select(['id','modid','firstname','lastname'])->get();
    
        //return view('nte-reply',compact('data'),compact(['infractions','mods']))
        //    ->with('i', ($request->input('page', 1) - 1) * 50);
        return view('nte-reply',compact(['data','infractions','mods']))
            ->with('i', ($request->input('page', 1) - 1) * 50);
        
    }

    public function show($id)
    {
        $netreply = Ntereply::find($id);
        return view('nte-reply-show',compact('netreply'));
    }

    public function searchreply(Request $request)
    {
        if(isset($_GET['mod_id']) || isset($_GET['nte_code'])) {
            // $data = Ntereply::select('ntereply.*')->join('nte', 'ntereply.id', '=', 'nte.id')->where('nte.MODID',703);
            //$data = Ntereply::select('ntereply.*')->join('nte', 'ntereply.id', '=', 'nte.id');

            $mod_id = (int) $request->input('mod_id');
            $nte_code = $request->input('nte_code');

            // $data = Ntereply::select('ntereply.*')->join('nte', 'ntereply.id', '=', 'nte.id')
            //         ->where('ntereply.ntecode','LIKE',"%{$nte_code}%")->where('nte.MODID',$mod_id)
            //         ->orderBy('ntereply.ntecode','ASC')->get();

            // if($mod_id > 0) {
            //     $data = Ntereply::select('ntereply.*')->join('nte', 'ntereply.id', '=', 'nte.id')
            //         ->where('nte.MODID',$mod_id)
            //         ->orderBy('ntereply.ntecode','ASC')->get();
            // } else
            if($mod_id > 0 && !empty($nte_code)) {
                $data = Ntereply::select('ntereply.*')->join('nte', 'ntereply.id', '=', 'nte.id')
                    ->where('ntereply.ntecode','LIKE',"%{$nte_code}%")->where('nte.MODID',$mod_id)
                    ->orderBy('ntereply.ntecode','ASC')->get();
            } elseif($mod_id > 0 && empty(trim($nte_code))) {
                $data = Ntereply::select('ntereply.*')->join('nte', 'ntereply.id', '=', 'nte.id')
                    ->orWhere('ntereply.ntecode','LIKE',"%{$nte_code}%")
                    ->orderBy('ntereply.ntecode','ASC')->get();
            } elseif($mod_id < 1 && !empty(trim($nte_code))) {
                $data = Ntereply::select('ntereply.*')->join('nte', 'ntereply.id', '=', 'nte.id')
                    ->where('ntereply.ntecode','LIKE',"%{$nte_code}%")
                    ->orderBy('ntereply.ntecode','ASC')->get();
            } else {
                $data = Ntereply::orderBy('ntereply.ntecode','ASC')->get();
            }
            echo $mod_id;
        } else {
           $data = Ntereply::orderBy('ntereply.ntecode','ASC')->get();
        }
        $infractions = Infractions::select(['id','code','detail'])->where('status',1)->get();
        $mods = Dbsc::select(['id','modid','firstname','lastname'])->get();
    
        return view('nte-reply',compact('data'),compact(['infractions','mods']))
            ->with('i', ($request->input('page', 1) - 1) * 50);
    }
}
