<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use App\Models\AttributeInfraction;
use App\Models\Infractions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttributeInfractionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(isset($_GET['search_opt']) && isset($_GET['keyword'])) {
            $search_opt = $request->input('search_opt');
            $word_search = $request->input('keyword');
            if(!empty($search_opt) && $search_opt === 'infra_code') {
                $data = AttributeInfraction::select('attribute_infraction.*',DB::raw('infractions.code AS infra_code'))
                    ->join('infractions', 'attribute_infraction.infraction_id', '=', 'infractions.id')
                    ->where('code','LIKE',"%{$word_search}%")
                    ->orderBy('attribute_infraction.attribute_id')
                    ->paginate(50);
            } elseif (!empty($search_opt) && $search_opt === 'infra_detail') {
                $data = AttributeInfraction::select('attribute_infraction.*',DB::raw('infractions.detail AS infra_detail'))
                    ->join('infractions', 'attribute_infraction.infraction_id', '=', 'infractions.id')
                    ->where('detail','LIKE',"%{$word_search}%")
                    ->orderBy('attribute_infraction.attribute_id')
                    ->paginate(50);
            } else {
                $data = AttributeInfraction::orderBy('attribute_id','ASC')->paginate(50);
            }
        } else {
            $data = AttributeInfraction::orderBy('attribute_id','ASC')->paginate(50);
        }

        return view('attribute-infraction.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 50);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_infra = Infractions::all();
        $list_attrib = Attribute::all();
        return view('attribute-infraction.create',compact('list_infra','list_attrib'));
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
            'attribute_id' => 'required',
            'infraction_id' => 'required',
        ]);

        $input = $request->all();
        $attribinfra = new AttributeInfraction();
        $attribinfra->attribute_id = $input['attribute_id'];
        $attribinfra->infraction_id = $input['infraction_id'];
        $attribinfra->created_by = auth()->user()->id;
        $attribinfra->created_at = date("Y-m-d H:i:s");
        if($attribinfra->save()) {
            $show = 'success';
            $message = 'Infraction was added to Attribute successfully.';
        } else {
            $show = 'error';
            $message = 'Infraction was not added to Attribute.';
        }
        return redirect()->route('attrib-infra.index')->with($show,$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attribinfra = AttributeInfraction::find($id);
        return view('attribute-infraction.show',compact('attribinfra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attribinfra = AttributeInfraction::find($id);
        $list_infra = Infractions::all();
        $list_attrib = Attribute::all();
        return view('attribute-infraction.edit',compact('attribinfra','list_infra','list_attrib'));
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
            'attribute_id' => 'required',
            'infraction_id' => 'required',
        ]);

        $input = $request->all();
        $attribinfra = AttributeInfraction::find($id);
        $attribinfra->attribute_id = $input['attribute_id'];
        $attribinfra->infraction_id = $input['infraction_id'];
        $attribinfra->updated_by = auth()->user()->id;
        $attribinfra->updated_at = date("Y-m-d H:i:s");
        if($attribinfra->save()) {
            $show = 'success';
            $message = 'Attribute-Infraction was successfully updated.';
        } else {
            $show = 'error';
            $message = 'Attribute-Infraction was not updated.';
        }
        return redirect()->route('attrib-infra.index')->with($show,$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        $attribinfra = AttributeInfraction::find($id);
        $old_attrib = $attribinfra->attribute_id;
        $old_infra = $attribinfra->infraction_id;
        
        if($attribinfra->delete()) {
            DB::commit();
            $show = 'success';
            $message = 'Attribute-Infraction deleted successfully.';
        } else {
            DB::rollBack();
            $show = 'error';
            $message = 'Failed to delete details.';
        }
        return redirect()->route('attrib-infra.index')->with($show,$message);
    }
}
