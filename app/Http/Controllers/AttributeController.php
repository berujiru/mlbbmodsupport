<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttributeController extends Controller
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
    
    public function index(Request $request)
    {
        if(isset($_GET['keyword'])) {
            $word_search = $request->input('keyword');
            if(!empty($word_search)) {
                $data = Attribute::select('*')
                    ->where('attribute_name','LIKE',"%{$word_search}%")
                    ->orderBy('attribute_name','ASC')->paginate(30);
            } else {
                $data = Attribute::orderBy('attribute_name','ASC')->paginate(30);
            }
        } else {
            $data = Attribute::orderBy('attribute_name','ASC')->paginate(30);
        }
        
        return view('attribute.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 30);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('attribute.create');
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
            'attribute_name' => 'required',
        ]);

        $input = $request->all();
        $attrib = new Attribute();
        $attrib->attribute_name = $input['attribute_name'];
        $attrib->created_by = auth()->user()->id;
        $attrib->created_at = date("Y-m-d H:i:s");
        if($attrib->save()) {
            $show = 'success';
            $message = 'Attribute created successfully.';
        } else {
            $show = 'error';
            $message = 'Attribute was not created.';
        }
        return redirect()->route('attribute.index')->with($show,$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attrib = Attribute::find($id);
        return view('attribute.show',compact('attrib'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attrib = Attribute::find($id);
        return view('attribute.edit',compact('attrib'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'attribute_name' => 'required',
        ]);
    
        $input = $request->all();
        $attrib = Attribute::find($id);
        $attrib->attribute_name = $input['attribute_name'];
        $attrib->updated_by = auth()->user()->id;
        $attrib->updated_at = date("Y-m-d H:i:s");
        if($attrib->save()) {
            $show = 'success';
            $message = 'Attribute updated successfully.';
        } else {
            $show = 'error';
            $message = 'Failed to update attribute.';
        }
        return redirect()->route('attribute.index')->with($show,$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $check_attrib = DB::table('attribute_infraction')->join('attribute', 'attribute.attribute_id', '=', 'attribute_infraction.attribute_id')->where('attribute.attribute_id',$id)->count();

        if($check_attrib > 0) {
            $show = 'error';
            $message = "Can't delete attribute due to existing related records.";
        } else {
            $delete = Attribute::find($id)->delete();
            if($delete) {
                $show = 'success';
                $message = 'Attribute deleted successfully.';
            } else {
                $show = 'error';
                $message = 'Failed to delete attribute.';
            }
        }

        return redirect()->route('attribute.index')->with($show,$message);
    }
}
