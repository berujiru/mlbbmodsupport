<?php

namespace App\Http\Controllers;

use App\Models\Dbsc;
use App\Models\ModBirthdayPicture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModBirthdayPictureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = ModBirthdayPicture::orderBy('mod_id','ASC')->paginate(30);
        return view('birthday-picture.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 30);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $list_mods = Dbsc::all();
        return view('birthday-picture.create',compact('list_mods'));
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
            'mod_id' => 'required',
            'pic_filename' => 'required',
        ]);

        $input = $request->all();
        $modprof = Dbsc::all()->where('modid',$input['mod_id']);
        // $img = request()->file('pic_filename');

        // echo $img->getSize();
        // exit;
        // print_r($modprof[0]['firstname']);
        // exit;

        if($modprof) {
            if (request()->has('pic_filename')) {
                $img = request()->file('pic_filename');
                $img_filename = $input['mod_id'].'_'.time(). '.' . $img->getClientOriginalExtension();
                $img_file_ext = $img->getClientMimeType();

                $file_size = round(($img->getSize()/1024),2);
                $unit = " KB";
                if($file_size > 1000) { // MB
                    $file_size = $file_size / 1024;
                    $unit = " MB";
                }

                $img_path = 'img_birthday/';
                $img->move($img_path, $img_filename);
            } else {
                $img_filename = "";
                $file_size = "";
                $unit = "";
                $img_file_ext = "";
            }

            $bcard = new ModBirthdayPicture();
            $bcard->mod_id = $input['mod_id'];
            $bcard->pic_type = $img_file_ext;
            $bcard->pic_name = $input['mod_id']." - ".$modprof[0]['firstname']." ".$modprof[0]['lastname'];
            $bcard->pic_size = number_format($file_size,2).$unit;
            $bcard->pic_filename = $img_filename;
            $bcard->uploader_id = auth()->user()->id;
            $bcard->date_attached = date("Y-m-d H:i:s");
            $bcard->created_at = date("Y-m-d H:i:s");
            $bcard->updated_at = date("Y-m-d H:i:s");
            if($bcard->save()) {
                $show = 'success';
                $message = 'Birthday card successfully uploaded.';
            } else {
                $show = 'error';
                $message = 'Birthday card was not uploaded.';
            }
        } else {
            $show = 'error';
            $message = 'Profile not found.'; 
        }
        return redirect()->route('birthday-card.index')->with($show,$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
