<?php

namespace App\Http\Controllers;

use App\Dokumen;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\File;


class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dokumens = Dokumen::all();
        return view('dokumen.index', compact('dokumens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dokumen.tambah');
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
        
        $dokumen = $request->all();
        $dokumen['uuid'] = (string)Uuid::generate();
        if ($request->hasdokumen('dok')) {
            $dokumen['namafile']= time().$request->dok->getClientOriginalName();
            $dokumen['publikasi'] = (!isset($request->publikasi)) ? "tidak" :"ya";
            $dokumen['tahun'] = $request->tahun;
            $dokumen['nama'] = $request->nama;
            $request->dok->storeAs('dokumen', $dokumen['namafile']);
        }
        File::create($dokumen);
        return redirect()->route('dokumen.simpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dokumen  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dokumen  $file
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        //
        $dokumens = Dokumen::where('uuid', $uuid)->firstOrFail();
        return view('dokumen.ubah',compact('dokumens'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dokumen  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        //
        $dokumen = Dokumen::where('uuid', $uuid)->firstOrFail();
        
        $this->validate($request,[
            'nama' => 'required',
            'tahun' => 'required',
        ]);

        

        $dokumen->uuid = (string)Uuid::generate();
        if ($request->hasFile('dok') && isset($request->dok)) {
            $pathToFile = storage_path('app/dokumen/' . $dokumen->namafile);
            File::delete($pathToFile);
            $dokumen->namafile= time().$request->dok->getClientOriginalName();
            $request->dok->storeAs('dokumen', $file->namafile);
        }
        $dokumen->publikasi = (!isset($request->publikasi)) ? "tidak" :"ya";
        $dokumen->tahun = $request->tahun;
        $dokumen->nama = $request->nama;
        $dokumen->update();

        return redirect()->route('dokumen.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dokumen  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        //
        $dokumen = Dokumen::where('uuid', $uuid)->firstOrFail();
        $pathToFile = storage_path('app/dokumen/' . $dokumen->namafile);
        File::delete($pathToFile);
        $dokumen->delete();
        return redirect()->route('dokumen.index');
    }

    public function download($uuid)
    {
        $dokumen = Dokumen::where('uuid', $uuid)->firstOrFail();
        $pathToFile = storage_path('app/dokumen/' . $dokumen->namafile);
        return response()->download($pathToFile);
    }
}
