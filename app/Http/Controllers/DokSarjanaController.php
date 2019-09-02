<?php

namespace App\Http\Controllers;

use App\Dok_sarjana;
use App\Katdoksarjana;
use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;
use Illuminate\Support\Facades\File;

class DokSarjanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dok_sarjana = Dok_sarjana::all();
        return view('operator.dok_sarjana.indexfile', compact('dok_sarjana'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kat_dok=Katdoksarjana::all();
        return view('operator.dok_sarjana.tambah',compact('kat_dok'));
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

        $kat_dok=Katdoksarjana::find($request->kategori_id);
        $dok_sarjana = new Dok_sarjana();
        $dok_sarjana->uuid = (string)Uuid::generate();
        if ($request->hasFile('excel')) {
            $dok_sarjana->namafile= time().$request->excel->getClientOriginalName();
            $dok_sarjana->publikasi = (!isset($request->publikasi)) ? "tidak" :"ya";
            $dok_sarjana->tahun = $request->tahun;
            $dok_sarjana->nama = $request->nama;
            $request->excel->storeAs('dok_sarjana', $dok_sarjana->namafile);
        }
        $kat_dok->dok_sarjana()->save($dok_sarjana);
        return redirect()->route('dok_sarjana.index');
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
        $dok_sarjana = Dok_sarjana::where('uuid', $uuid)->firstOrFail();
        $katdok_sarjana=Katdoksarjana::all();
        return view('operator.dok_sarjana.edit',compact('dok_sarjana','katdok_sarjana'));
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
        $dok_sarjana = Dok_sarjana::where('uuid', $uuid)->firstOrFail();
        
        $rules = [
            
            'tahun' => 'required|date_format:Y',
            
        ];
        $customMessages = [
            
            'tahun.date_format' => 'Format tahun salah',
            
        ];
        $this->validate($request, $rules, $customMessages);

        $dok_sarjana = Dok_sarjana::where('uuid', $uuid)->firstOrFail();
        $kat_dok=Katdoksarjana::find($request->kategori_id);
        $dok_sarjana->uuid = (string)Uuid::generate();
        if ($request->hasFile('excel') && isset($request->excel)) {
            $pathToFile = storage_path('app/dok_sarjana/' . $dok_sarjana->namafile);
            File::delete($pathToFile);
            $dok_sarjana->namafile= time().$request->excel->getClientOriginalName();
            $request->excel->storeAs('dok_sarjana', $dok_sarjana->namafile);
        }
        $dok_sarjana->publikasi = (!isset($request->publikasi)) ? "tidak" :"ya";
        $dok_sarjana->tahun = $request->tahun;
        $dok_sarjana->nama = $request->nama;
        $kat_dok->dok_sarjana()->save($dok_sarjana);
        return redirect()->route('dok_sarjana.index');

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
        $dok_sarjana = Dok_sarjana::where('uuid', $uuid)->firstOrFail();
        $pathToFile = storage_path('app/dok_sarjana/' . $dok_sarjana->namafile);
       
        File::delete($pathToFile);
        $dok_sarjana->delete();
        return redirect()->route('dok_sarjana.index');

    }

    public function download($uuid)
    {
        $dok_sarjana = Dok_sarjana::where('uuid', $uuid)->firstOrFail();
        $pathToFile = storage_path('app/dok_sarjana/' .$dok_sarjana->namafile);
        return response()->download($pathToFile);
    }

    public function searching(Request $request)
    {
        # code...
        
    }
}
