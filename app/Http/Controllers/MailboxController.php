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

        if(isset($_GET['from_date']) && isset($_GET['to_date']) && isset($_GET['filter_infra'])) {
            $from_date = $request->input('from_date');
            $to_date = $request->input('to_date');

            if(isset($_GET['from_date'])) {
                $date_from = !empty($from_date) ? date("Y-m-d", strtotime($from_date)) : date("Y-01-01");
            } else {
                $date_from = date("Y-01-01");
            }

            if(isset($_GET['to_date'])) {
                $date_to = !empty($to_date) ? date("Y-m-d", strtotime($to_date)) : date("Y-m-t");
            } else {
                $date_to = date("Y-m-t");
            }

            if(empty(trim($_GET['filter_infra']))) {
                $filter_infra = 3; //no selection
            } else {
                $filter_infra = (int) $request->input('filter_infra');
            }

            if($filter_infra == 0 || $filter_infra == 1) {
                if($filter_infra == 1) {
                    $data = Masterfile::where('MOD_ID',$dbsc->modid)
                        ->where('OVERALLSCORE','NOT LIKE','100%')
                        //->whereRaw("STR_TO_DATE(`Date`, '%d-%b-%y') >= '".trim($date_from)."'")
                        ->whereRaw("DATE_FORMAT(STR_TO_DATE(`Date`, '%m/%d/%Y'),'%Y-%m-%d') >= '".trim($date_from)."'")
                        //->whereRaw("STR_TO_DATE(`Date`, '%d-%b-%y') <= '".trim($date_to)."'")
                        ->whereRaw("DATE_FORMAT(STR_TO_DATE(`Date`, '%m/%d/%Y'),'%Y-%m-%d') <= '".trim($date_to)."'")
                        ->orderBy('MERGED','DESC')->get();
                } else {
                    $data = Masterfile::where('MOD_ID',$dbsc->modid)
                        ->where('OVERALLSCORE','LIKE','100%')
                        //->whereRaw("STR_TO_DATE(`Date`, '%d-%b-%y') >= '".trim($date_from)."'")
                        ->whereRaw("DATE_FORMAT(STR_TO_DATE(`Date`, '%m/%d/%Y'),'%Y-%m-%d') >= '".trim($date_from)."'")
                        //->whereRaw("STR_TO_DATE(`Date`, '%d-%b-%y') <= '".trim($date_to)."'")
                        ->whereRaw("DATE_FORMAT(STR_TO_DATE(`Date`, '%m/%d/%Y'),'%Y-%m-%d') <= '".trim($date_to)."'")
                        ->orderBy('MERGED','DESC')->get();
                } 
            } else {
                $data = Masterfile::where('MOD_ID',$dbsc->modid)
                    //->whereRaw("STR_TO_DATE(`Date`, '%d-%b-%y') >= '".trim($date_from)."'")
                    ->whereRaw("DATE_FORMAT(STR_TO_DATE(`Date`, '%m/%d/%Y'),'%Y-%m-%d') >= '".trim($date_from)."'")
                    //->whereRaw("STR_TO_DATE(`Date`, '%d-%b-%y') <= '".trim($date_to)."'")
                    ->whereRaw("DATE_FORMAT(STR_TO_DATE(`Date`, '%m/%d/%Y'),'%Y-%m-%d') <= '".trim($date_to)."'")
                    ->orderBy('MERGED','DESC')->get();
            }

            if($dbsc){
                return view('apps-mailbox',compact('data'));
            }
        } else {
            if($dbsc){
                $data = Masterfile::where('MOD_ID',$dbsc->modid)->orderBy('MERGED','DESC')->get();
                // return $data; exit;
                return view('apps-mailbox',compact('data'));
            }
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
