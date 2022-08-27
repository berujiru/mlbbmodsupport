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
        if(isset($_GET['mod_id'])) {
            $mod_id = (int) $request->input('mod_id');
            if($mod_id > 0) {
                $data = ModBirthdayPicture::select('*')
                    ->where('mod_id',$mod_id)
                    ->orderBy('mod_id','ASC')->paginate(30);
            } else {
                $data = ModBirthdayPicture::orderBy('mod_id','ASC')->paginate(30);
            }
        } else {
            $data = ModBirthdayPicture::orderBy('mod_id','ASC')->paginate(30);
        }
        $mods = Dbsc::select(['id','modid','firstname','lastname'])->get();
        //$data = ModBirthdayPicture::orderBy('mod_id','ASC')->paginate(30);

        return view('birthday-picture.index',compact('data','mods'))
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
            'pic_filename' => 'required|image|mimes:jpeg,png,jpg|max:6144',
        ]);

        $input = $request->all();
        //$modprof = Dbsc::all()->where('modid',$input['mod_id']);
        $modprof = DB::table('dbsc')->where('modid',$input['mod_id'])->get();
        $check = DB::table('mod_birthday_pic')->where('mod_id',$input['mod_id'])->count();
        // $img = request()->file('pic_filename');

        // echo $img->getSize();
        // exit;
        // print_r($modprof[0]['firstname']);
        // exit;

        if($modprof && $check == 0) {
            $img_path = 'img_birthday/';
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
                $img->move($img_path, $img_filename);
            } else {
                $img_filename = "";
                $file_size = "";
                $unit = "";
                $img_file_ext = "";
            }
            
            // echo "<pre>";
            // print_r($modprof);
            // echo "</pre>";
            // exit;

            $bcard = new ModBirthdayPicture();
            $bcard->mod_id = $input['mod_id'];
            $bcard->pic_type = $img_file_ext;
            $bcard->pic_name = $input['mod_id']." - ".$modprof[0]->firstname." ".$modprof[0]->lastname;
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
                unlink($img_path.$img_filename);
                $show = 'error';
                $message = 'Birthday card was not uploaded.';
            }
        } else {
            if($check > 0) {
                $show = 'error';
                $message = "Moderator's birthday card already existing."; 
            } else {
                $show = 'error';
                $message = 'Profile not found.'; 
            }
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
        $bdpic = ModBirthdayPicture::find($id);
        return view('birthday-picture.show',compact('bdpic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bdpic = ModBirthdayPicture::find($id);
        $list_mods = Dbsc::all();
        return view('birthday-picture.edit',compact('bdpic','list_mods'));
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
            'mod_id' => 'required',
            'pic_filename' => 'required|image|mimes:jpeg,png,jpg|max:6144',
        ]);

        $input = $request->all();
        //$modprof = Dbsc::all()->where('modid',$input['mod_id']);
        $modprof = DB::table('dbsc')->where('modid',$input['mod_id'])->get();

        if($modprof) {
            $bcard = ModBirthdayPicture::find($id);
            $img_path = 'img_birthday/';
            $old_file_name = $bcard->pic_filename;
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

                if(unlink($img_path.$old_file_name)) {
                    $img->move($img_path, $img_filename);
                }
            } else {
                $img_filename = "";
                $file_size = "";
                $unit = "";
                $img_file_ext = "";
            }

            $bcard->mod_id = $input['mod_id'];
            $bcard->pic_type = $img_file_ext;
            $bcard->pic_name = $input['mod_id']." - ".$modprof[0]->firstname." ".$modprof[0]->lastname;
            $bcard->pic_size = number_format($file_size,2).$unit;
            $bcard->pic_filename = $img_filename;
            $bcard->re_attached_by = auth()->user()->id;
            $bcard->date_reattached = date("Y-m-d H:i:s");
            $bcard->updated_at = date("Y-m-d H:i:s");
            if($bcard->save()) {
                $show = 'success';
                $message = 'Birthday card successfully updated.';
            } else {
                unlink($img_path.$img_filename);
                $show = 'error';
                $message = 'Birthday card was not updated.';
            }
        } else {
            $show = 'error';
            $message = 'Profile not found.'; 
        }
        return redirect()->route('birthday-card.index')->with($show,$message);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bcard = ModBirthdayPicture::find($id);
        $img_path = 'img_birthday/';
        $old_file_name = $bcard->pic_filename;

        if(unlink($img_path.$old_file_name)) {
            $delete = ModBirthdayPicture::find($id)->delete();
            if($delete) {
                $show = 'success';
                $message = 'Birthday card successfully removed.';
            } else {
                $show = 'error';
                $message = 'Failed to remove birthday card.';
            }  
        } else {
            $show = 'error';
            $message = 'Failed to remove birthday card.';
        }
        return redirect()->route('birthday-card.index')->with($show,$message);
    }
}
