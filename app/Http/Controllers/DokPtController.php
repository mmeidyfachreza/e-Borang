<?php

namespace App\Http\Controllers;

use App\Dok_pt;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\File;

class DokPtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dok_pt = Dok_pt::all();
        return view('operator.dok_pt.indexfile', compact('dok_pt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('operator.dok_pt.tambah');
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
        
        $dok_pt = $request->all();
        $dok_pt['uuid'] = (string)Uuid::generate();
        if ($request->hasFile('excel')) {
            $dok_pt['namafile']= time().$request->excel->getClientOriginalName();
            $dok_pt['publikasi'] = (!isset($request->publikasi)) ? "tidak" :"ya";
            $dok_pt['tahun'] = $request->tahun;
            $dok_pt['nama'] = $request->nama;
            $request->excel->storeAs('dok_pt', $dok_pt['namafile']);
        }
        Dok_pt::create($dok_pt);
        return redirect()->route('dok_pt.index');
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
        $dok_pt = Dok_pt::where('uuid', $uuid)->firstOrFail();
        return view('operator.dok_pt.edit',compact('dok_pt'));
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
        $dok_pt = Dok_pt::where('uuid', $uuid)->firstOrFail();
        
        $this->validate($request,[
            'nama' => 'required',
            'tahun' => 'required',
            
        ]);

        

        $dok_pt->uuid = (string)Uuid::generate();
        if ($request->hasFile('excel') && isset($request->excel)) {
            $pathToFile = storage_path('app/dok_pt/' . $dok_pt->namafile);
            File::delete($pathToFile);
            $dok_pt->namafile= time().$request->excel->getClientOriginalName();
            $request->excel->storeAs('dok_pt', $dok_pt->namafile);
        }
        $dok_pt->publikasi = (!isset($request->publikasi)) ? "tidak" :"ya";
        $dok_pt->tahun = $request->tahun;
        $dok_pt->nama = $request->nama;
        $dok_pt->update();

        return redirect()->route('dok_pt.index');

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
        $dok_pt = Dok_pt::where('uuid', $uuid)->firstOrFail();
        $pathToFile = storage_path('app/dok_pt/' . $dok_pt->namafile);
       
        File::delete($pathToFile);
        $dok_pt->delete();
        return redirect()->route('dok_pt.index');

    }

    public function download($uuid)
    {
        $dok_pt = Dok_pt::where('uuid', $uuid)->firstOrFail();
        $pathToFile = storage_path('app/dok_pt/' .$dok_pt->namafile);
        return response()->download($pathToFile);
    }

    public function searching(Request $request)
    {
        # code...
        
    }
}
