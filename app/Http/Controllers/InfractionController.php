<?php

namespace App\Http\Controllers;

use App\Models\Infractions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InfractionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:role-list|role-create|role-edit|role-delete', ['only' => ['index','store']]);
         $this->middleware('permission:role-create', ['only' => ['create','store']]);
         $this->middleware('permission:role-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:role-delete', ['only' => ['destroy']]);
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($_GET['search_opt']) && isset($_GET['k_search'])) {
            $search_opt = $request->input('search_opt');
            $word_search = $request->input('k_search');
            if(!empty($search_opt) && $search_opt === 'code') {
                $data = Infractions::select('*')
                    ->where('code','LIKE',"%{$word_search}%")
                    ->orderBy('code','ASC')->paginate(10);
            } elseif (!empty($search_opt) && $search_opt === 'detail') {
                $data = Infractions::select('*')
                    ->where('detail','LIKE',"%{$word_search}%")
                    ->orderBy('code','ASC')->paginate(10);
            } else {
                $data = Infractions::orderBy('code','ASC')->paginate(10);
            }
        } else {
            $data = Infractions::orderBy('code','ASC')->paginate(10);
        }
        
        //$data = Infractions::orderBy('code','ASC')->paginate(50);
        return view('infraction.index',compact('data'))
            //->with('i', ($request->input('page', 1) - 1) * 50);
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('infraction.create');
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
            'code' => 'required',
            'detail' => 'required',
        ]);

        $input = $request->all();
        $infraction = new Infractions();
        $infraction->code = $input['code'];
        $infraction->detail = $input['detail'];
        $infraction->created_by = auth()->user()->id;
        $infraction->created_at = date("Y-m-d H:i:s");
        //$infraction = Infractions::create($input);
        if($infraction->save()) {
            $show = 'success';
            $message = 'Infraction created successfully.';
        } else {
            $show = 'error';
            $message = 'Infraction was not created.';
        }
        return redirect()->route('infraction.index')->with($show,$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Infractions  $infractions
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $infraction = Infractions::find($id);
        return view('infraction.show',compact('infraction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Infractions  $infractions
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $infraction = Infractions::find($id);
        return view('infraction.edit',compact('infraction'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Infractions  $infractions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //$infractions = Infractions::find($id);
        //return response()->json($infractions);

        $this->validate($request, [
            'code' => 'required',
            'detail' => 'required',
        ]);
    
        $input = $request->all();
        $infraction = Infractions::find($id);
        $infraction->code = $input['code'];
        $infraction->detail = $input['detail'];
        $infraction->updated_by = auth()->user()->id;
        $infraction->updated_at = date("Y-m-d H:i:s");
        //$infraction = Infractions::create($input);
        if($infraction->save()) {
            $show = 'success';
            $message = 'Infraction updated successfully.';
        } else {
            $show = 'error';
            $message = 'Failed to update infraction.';
        }
        return redirect()->route('infraction.index')->with($show,$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Infractions  $infractions
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check_infra = DB::table('mod_infraction')->join('infractions', 'infractions.id', '=', 'mod_infraction.infraction_id')->where('infractions.id',$id)->count();

        if($check_infra > 0) {
            $show = 'error';
            $message = "Can't delete infraction due to existing related records.";
        } else {
            $delete = Infractions::find($id)->delete();
            if($delete) {
                $show = 'success';
                $message = 'Infraction deleted successfully.';
            } else {
                $show = 'error';
                $message = 'Failed to delete infraction.';
            }
        }

        return redirect()->route('infraction.index')->with($show,$message);
    }
}
