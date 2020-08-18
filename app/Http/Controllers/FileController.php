<?php

namespace App\Http\Controllers;

use Response;
use Redirect;
use Storage;
use App\File;
use App\Helpers\PdfService;
use Illuminate\Http\Request;
use Illuminate\Http\File as HttpFile;


class FileController extends Controller
{
    protected $pdfService;

    function __construct()
    {
        $this->pdfService= new PdfService();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'file'=>'required | mimes:pdf'
        ]);

       // Logic to check the word in file
        if(!$this->pdfService->searchFor($request->file,"Proposal") && false){
            if($request->ajax()) return response()->json(['file' => 'File Content not found'], 422);
            else return Redirect::back()->withErrors(['file' => 'File Content not found']);
        }

        $upload_file =$request->file;
        $disk='local';
        $file_upload_path ='files/';
        $size = $upload_file->getSize();
        if ($upload_file instanceof HttpFile) {
            $extension = '.' . $upload_file->getExtension();
            $name = $upload_file->getFileName();
            $type = $upload_file->getMimeType();
        } else {
            $extension='.'.$upload_file->extension();
            $name = str_replace($extension,"", $upload_file->getClientOriginalName());
            $type = $upload_file->getClientMimeType();
        }
        $fileName=$name.$extension;

        $fileCheck=File::where('file_name',$fileName)->where('size',$size)->first();
        if($fileCheck){
            Storage::disk($disk)->delete($file_upload_path.$fileName);
        }

        $exists = Storage::disk($disk)->exists($file_upload_path.$fileName);
        
        if($exists){
            $name=$name.uniqid();
            $fileName=$name.$extension;
        }

        $storagePath = Storage::disk($disk)->putFileAs($file_upload_path, $upload_file, $fileName);
        $data=[
            'disk' => $disk,
            'file_path' => $file_upload_path. $name,
            'file_extension' => $extension,
            'size' => $size,
            'file_name' => $name
        ];
        if($fileCheck){
            $fileCheck->update($data);
        }else{
            File::create($data);
        }
        
        if($request->ajax()) return response()->json(['result'=>true,'message' => 'File Successfully Upload'], 200);

        else return Redirect::back()->with(['result'=>true,'message' => 'File Successfully Upload']);


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        //
    }
}
