<?php

namespace App\Http\Controllers;

use App\Katdoksarjana;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class KatdoksarjanaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $katdoksarjanas= Katdoksarjana::all(); 
        return view("admin.katdoksarjana.index",compact('katdoksarjanas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
       return view("admin.katdoksarjana.tambah");
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
            'nama' => 'required|max:50|unique:katdokpts,nama,',
            'deskripsi' => 'required|max:50',
        ];
        $customMessages = [
            'nama.max' => 'Nama maksimal 50 karakter',
            'nama.unique' => 'Nama kategori sudah ada',
            'deskripsi.max' => 'Alamat maksimal 50 karakter',
        ];
        $this->validate($request, $rules, $customMessages);
        $katdoksarjana = new Katdoksarjana();
        
        $katdoksarjana->nama = $request->nama;
        $katdoksarjana->deskripsi = $request->deskripsi;
        $katdoksarjana->slug_judul = Str::slug($request->nama);
        $katdoksarjana->save();
        return redirect()->route('katdoksarjana.index')->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Katdoksarjana  $katdoksarjana
     * @return \Illuminate\Http\Response
     */
    public function show(Katdoksarjana $katdoksarjana)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Katdoksarjana  $katdoksarjana
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $katdoksarjana = Katdoksarjana::find($id);
        return view('admin.katdoksarjana.edit',compact('katdoksarjana'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Katdoksarjana  $katdoksarjana
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $katdoksarjana = Katdoksarjana::find($id);
        $rules = [
            'nama' => 'required|max:50|unique:katdoksarjanas,nama,'.$katdoksarjana->id,
            'deskripsi' => 'required|max:50',
        ];
        $customMessages = [
            'nama.max' => 'Nama maksimal 50 karakter',
            'nama.unique' => 'Nama kategori sudah ada',
            'deskripsi.max' => 'Alamat maksimal 50 karakter',
        ];
        $this->validate($request, $rules, $customMessages);
        $katdoksarjana->update($request->all());
  
        return redirect()->route('katdoksarjana.index')
                        ->with('success','Data Berhasil Dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Katdoksarjana  $katdoksarjana
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $katdoksarjana = Katdoksarjana::find($id);
        $katdoksarjana->delete();
  
        return redirect()->route('katdoksarjana.index')
                        ->with('success','Data Berhasil Dihapus');
    }
}
