<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Modinfraction;
use App\Models\Infractions;
use App\Models\Dbsc;

class ModinfractionController extends Controller
{
    /** 
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Modinfraction::orderBy('id','DESC')->paginate(50);
        $infractions = Infractions::select(['id','code','detail'])->where('status',1)->get();
        $mods = Dbsc::select(['id','modid','firstname','lastname'])->get();

        return view('evaluation.index',compact('data'),compact(['infractions','mods']))
            ->with('i', ($request->input('page', 1) - 1) * 50);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'date' => 'required',
            'mod_id' => 'required',
            'infractions' => 'required'
        ],[
            'required'=> ':attribute is requried'
        ]);

        // return $request->infractions;
        foreach($request->infractions as $infraction){

            //infraction in within same day cant be added
            $checkerofinfra = Modinfraction::where('date',$request->date)->where('infraction_id',$infraction)->where('mod_id',$request->mod_id)->get();
            if(count($checkerofinfra)==0){
                $newmodinfra = new Modinfraction;
                $newmodinfra->date = $request->date;
                $newmodinfra->mod_id = $request->mod_id;
                $newmodinfra->infraction_id = $infraction;
                //get related infraction code
                $specific_infraction = Infractions::find( $infraction);
                $newmodinfra->infraction_code =$specific_infraction->code.'- '.$specific_infraction->detail;
                $newmodinfra->save();
            }
        }  
        return redirect()->route('modeval')->with('success','Infraction Added!');
    }

    public function destroy($id)
    {
        $delete = Modinfraction::find($id)->delete();
        return redirect()->route('modeval')->with('success','Infraction deleted successfully');
    }
}
