<?php

namespace App\Http\Controllers;

use App\Kat_dokumen;
use Illuminate\Http\Request;
//use App\Http\Requests\KatDokumenStoreRequest as modReq;

class KatDokumenController extends Controller
{
    
    /**
     * memberikan hak akses kepada user tertentu
     * yang ingin mengakses controller
     * 
     * mau middleware via controller atau route
     * terserah saja
     * 
     * untuk saat ini saya middleware via route
     * Author @meidyfachreza
     */
    // public function __construct()
    // {
    //     $this->middleware('Khusus:admin');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $kat_dokumens= Kat_dokumen::all(); 
        return view("admin.kat_dokumen.index",compact('kat_dokumens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
       return view("admin.kat_dokumen.tambah");
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
        
        $kat_dokumen = new Kat_dokumen();
        
        $kat_dokumen->nama = $request->nama;
        $kat_dokumen->deskripsi = $request->deskripsi;
        $kat_dokumen->save();
        return redirect()->route('kategori-dokumen.index')->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kat_dokumen  $kat_dokumen
     * @return \Illuminate\Http\Response
     */
    public function show(Kat_dokumen $kat_dokumen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kat_dokumen  $kat_dokumen
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $kat_dokumen = Kat_dokumen::find($id)->first();
        return view('admin.kat_dokumen.edit',compact('kat_dokumen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kat_dokumen  $kat_dokumen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $kat_dokumen = Kat_dokumen::find($id)->first();
        $kat_dokumen->update($request->all());
  
        return redirect()->route('kategori-dokumen.index')
                        ->with('success','Data Berhasil Dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kat_dokumen  $kat_dokumen
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $kat_dokumen = Kat_dokumen::find($id)->first();
        $kat_dokumen->delete();
  
        return redirect()->route('kategori-dokumen.index')
                        ->with('success','Data Berhasil Dihapus');
    }
}
