<?php

namespace App\Http\Controllers;

use App\Models\UserManual;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\URL;

class UserManualController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = DB::table('user_manual')->paginate(50);
        if($data){
            return view('user-manual.index',compact('data'))
                ->with('i', ($request->input('page', 1) - 1) * 50);
        }

        return response()->view('errors.404');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user-manual.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$d_file)
    {
        //return view('user-manual.show');

        //return Response::make(file_get_contents('manual/DEPUTY_MANAGEMENT_USERS_MANUAL.pdf'), 200, [
        //     'content-type'=>'application/pdf',
        // ]);
        //$request = new Request();

        if($id > 0 && !empty($d_file)) {
            $file = UserManual::find($id);
            if($file) {
                $doc_root = public_path(); //$_SERVER['DOCUMENT_ROOT']
                //$path_check = $doc_root."/manual/";
                //$file_exist = $path_check.'DEPUTY_MANAGEMENT_USERS_MANUAL.pdf';
                $path_check = $doc_root."/manual/";
                $file_exist = $path_check.$file->file_name;
                //$path = $request->getHttpHost()."/manual/";

                if(file_exists($file_exist)) {
                    //if($file->file_type == 'application/pdf') {
                        return Response::make(file_get_contents($file_exist), 200, [
                            //'content-type'=>'application/pdf',
                            'Content-Type' => $file->file_type,
                            'Content-Disposition' => 'inline; filename='.$file->file_name,
                        ]);
                    //}
                } else {
                    $show = 'error';
                    $message = 'Can\'t locate file name';
                }
            } else {
                $show = 'error';
                $message = 'File can\'t be found';
            }
        } else {
            $show = 'error';
            $message = 'Invalid request!';
        }
        return redirect()->route('user-manual.index')->with($show,$message);
    }

    public function pdf() {
        // return Response::make(file_get_contents('manual/DEPUTY_MANAGEMENT_USERS_MANUAL.pdf'), 200, [
        //                'content-type'=>'application/pdf',
        //            ]);
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
            'manual_name' => 'required',
            'manual_description' => 'required',
            //'file_name' => 'required|mimes:pdf,doc,docx|max:20000',
            'file_name' => 'required|mimes:pdf|max:20000',
        ]);

        $input = $request->all();

        $file_path = 'manual/';
        if (request()->has('file_name')) {
            $d_file = request()->file('file_name');
            $filename = strtoupper(str_replace(" ","_",$input['manual_name'])).'_'.time().'.'.$d_file->getClientOriginalExtension();
            $file_ext = $d_file->getClientMimeType();

            $file_size = round(($d_file->getSize()/1024),2);
            $unit = " KB";
            if($file_size > 1000) { // MB
                $file_size = $file_size / 1024;
                $unit = " MB";
            }
            $d_file->move($file_path, $filename);
        } else {
            $filename = "";
            $file_size = "";
            $unit = "";
            $file_ext = "";
        }

        $manual = new UserManual();
        $manual->manual_name = $input['manual_name'];
        $manual->manual_description = $input['manual_description'];
        $manual->file_type = $file_ext;
        $manual->file_name = $filename;
        $manual->file_size = number_format($file_size,2).$unit;
        $manual->uploader_id = auth()->user()->id;
        $manual->date_attached = date("Y-m-d H:i:s");
        $manual->created_at = date("Y-m-d H:i:s");
        $manual->updated_at = date("Y-m-d H:i:s");
        if($manual->save()) {
            $show = 'success';
            $message = 'Manual successfully uploaded.';
        } else {
            unlink($file_path.$filename);
            $show = 'error';
            $message = 'Manual was not uploaded.';
        }
        return redirect()->route('user-manual.index')->with($show,$message);

        // $input = $request->all();
        // print_r($input);
    }
}