<?php

namespace App\Http\Controllers;

use App\Dok_diploma;
use App\Katdokdiploma;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\File;

class DokDiplomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dok_diploma = Dok_diploma::all();
        return view('operator.dok_diploma.indexfile', compact('dok_diploma'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kat_dok=Katdokdiploma::all();
        return view('operator.dok_diploma.tambah',compact('kat_dok'));
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
        $rules = [
            
            'tahun' => 'required|date_format:Y',
            
        ];
        $customMessages = [
            
            'tahun.date_format' => 'Format tahun salah',
            
        ];
        $this->validate($request, $rules, $customMessages);

        $kat_dok=Katdokdiploma::find($request->kategori_id);
        $dok_diploma = new Dok_diploma();
        $dok_diploma->uuid = (string)Uuid::generate();
        if ($request->hasFile('excel')) {
            $dok_diploma->namafile= time().$request->excel->getClientOriginalName();
            $dok_diploma->publikasi = (!isset($request->publikasi)) ? "tidak" :"ya";
            $dok_diploma->tahun = $request->tahun;
            $dok_diploma->nama = $request->nama;
            $request->excel->storeAs('dok_diploma', $dok_diploma->namafile);
        }
        $kat_dok->dok_diploma()->save($dok_diploma);
        return redirect()->route('dok_diploma.index');
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
        $dok_diploma = Dok_diploma::where('uuid', $uuid)->firstOrFail();
        $katdok_diploma=Katdokdiploma::all();
        return view('operator.dok_diploma.edit',compact('dok_diploma','katdok_diploma'));
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
        $dok_diploma = Dok_diploma::where('uuid', $uuid)->firstOrFail();
        
        $rules = [
            
            'tahun' => 'required|date_format:Y',
            
        ];
        $customMessages = [
            
            'tahun.date_format' => 'Format tahun salah',
            
        ];
        $this->validate($request, $rules, $customMessages);

        $dok_diploma = Dok_diploma::where('uuid', $uuid)->firstOrFail();
        $kat_dok=Katdokdiploma::find($request->kategori_id);
        $dok_diploma->uuid = (string)Uuid::generate();
        if ($request->hasFile('excel') && isset($request->excel)) {
            $pathToFile = storage_path('app/dok_diploma/' . $dok_diploma->namafile);
            File::delete($pathToFile);
            $dok_diploma->namafile= time().$request->excel->getClientOriginalName();
            $request->excel->storeAs('dok_diploma', $dok_diploma->namafile);
        }
        $dok_diploma->publikasi = (!isset($request->publikasi)) ? "tidak" :"ya";
        $dok_diploma->tahun = $request->tahun;
        $dok_diploma->nama = $request->nama;
        $kat_dok->dok_diploma()->save($dok_diploma);
        return redirect()->route('dok_diploma.index');

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
        $dok_diploma = Dok_diploma::where('uuid', $uuid)->firstOrFail();
        $pathToFile = storage_path('app/dok_diploma/' . $dok_diploma->namafile);
       
        File::delete($pathToFile);
        $dok_diploma->delete();
        return redirect()->route('dok_diploma.index');

    }

    public function download($uuid)
    {
        $dok_diploma = Dok_diploma::where('uuid', $uuid)->firstOrFail();
        $pathToFile = storage_path('app/dok_diploma/' .$dok_diploma->namafile);
        return response()->download($pathToFile);
    }

    public function searching(Request $request)
    {
        # code...
        
    }
}
