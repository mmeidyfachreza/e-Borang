<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File as Filee;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $files = File::all();
        return view('operator.dokumen.indexfile', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('operator.dokumen.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $file = $request->all();
        $file['uuid'] = (string)Uuid::generate();
        if ($request->hasFile('excel')) {
            $file['namafile']= time().$request->excel->getClientOriginalName();
            $file['publikasi'] = (!isset($request->publikasi)) ? "tidak" :"ya";
            $file['tahun'] = $request->tahun;
            $file['nama'] = $request->nama;
            $request->excel->storeAs('files', $file['namafile']);
        }
        File::create($file);
        return redirect()->route('files.indexfile');
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
    public function edit($uuid)
    {
        //
        $files = File::where('uuid', $uuid)->firstOrFail();
        return view('operator.dokumen.edit',compact('files'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        //
        $file = File::where('uuid', $uuid)->firstOrFail();
        
        $this->validate($request,[
            'nama' => 'required',
            'tahun' => 'required',
            
        ]);

        

        $file->uuid = (string)Uuid::generate();
        if ($request->hasFile('excel') && isset($request->excel)) {
            $pathToFile = storage_path('app/files/' . $file->namafile);
            Filee::delete($pathToFile);
            $file->namafile= time().$request->excel->getClientOriginalName();
            $request->excel->storeAs('files', $file->namafile);
        }
        $file->publikasi = (!isset($request->publikasi)) ? "tidak" :"ya";
        $file->tahun = $request->tahun;
        $file->nama = $request->nama;
        $file->update();

        return redirect()->route('files.indexfile');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        //
        $files = File::where('uuid', $uuid)->firstOrFail();
        $pathToFile = storage_path('app/files/' . $files->namafile);
       
        Filee::delete($pathToFile);
        $files->delete();
        return redirect()->route('files.indexfile');

    }

    public function download($uuid)
    {
        $files = File::where('uuid', $uuid)->firstOrFail();
        $pathToFile = storage_path('app/files/' . $files->namafile);
        return response()->download($pathToFile);
    }

    public function searching(Request $request)
    {
        # code...
        
    }
}
