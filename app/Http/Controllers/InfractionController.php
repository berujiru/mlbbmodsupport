<?php

namespace App\Http\Controllers;

use App\Models\Infractions;
use Illuminate\Http\Request;

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
        $data = Infractions::orderBy('code','ASC')->paginate(50);
        return view('infraction.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 50);
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
        $delete = Infractions::find($id)->delete();
        //return response()->json(['success'=>'Infraction deleted successfully.']);
        if($delete) {
            $show = 'success';
            $message = 'Infraction deleted successfully.';
        } else {
            $show = 'error';
            $message = 'Failed to delete infraction.';
        }
        return redirect()->route('infraction.index')->with($show,$message);
    }
}
