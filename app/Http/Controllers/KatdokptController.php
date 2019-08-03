<?php

namespace App\Http\Controllers;

use App\Katdokpt;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class KatdokptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $katdokpts= Katdokpt::all(); 
        return view("admin.katdokpt.index",compact('katdokpts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
       return view("admin.katdokpt.tambah");
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
        
        $katdokpt = new Katdokpt();
        
        $katdokpt->nama = $request->nama;
        $katdokpt->deskripsi = $request->deskripsi;
        $katdokpt->slug_judul = Str::slug($request->nama);
        $katdokpt->save();
        return redirect()->route('katdokpt.index')->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Katdokpt  $katdokpt
     * @return \Illuminate\Http\Response
     */
    public function show(Katdokpt $katdokpt)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Katdokpt  $katdokpt
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $katdokpt = Katdokpt::find($id)->first();
        return view('admin.katdokpt.edit',compact('katdokpt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Katdokpt  $katdokpt
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $katdokpt = Katdokpt::find($id)->first();
        $katdokpt->update($request->all());
  
        return redirect()->route('katdokpt.index')
                        ->with('success','Data Berhasil Dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Katdokpt  $katdokpt
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $katdokpt = Katdokpt::find($id)->first();
        $katdokpt->delete();
  
        return redirect()->route('katdokpt.index')
                        ->with('success','Data Berhasil Dihapus');
    }
}
