<?php

namespace App\Http\Controllers;

use App\Katdokdiploma;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class KatdokdiplomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $katdokdiplomas= Katdokdiploma::all(); 
        return view("admin.katdokdiploma.index",compact('katdokdiplomas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
       return view("admin.katdokdiploma.tambah");
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
        $katdokdiploma = new Katdokdiploma();
        
        $katdokdiploma->nama = $request->nama;
        $katdokdiploma->deskripsi = $request->deskripsi;
        $katdokdiploma->slug_judul = Str::slug($request->nama);
        $katdokdiploma->save();
        return redirect()->route('katdokdiploma.index')->with('success','Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Katdokdiploma  $katdokdiploma
     * @return \Illuminate\Http\Response
     */
    public function show(Katdokdiploma $katdokdiploma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Katdokdiploma  $katdokdiploma
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $katdokdiploma = Katdokdiploma::find($id);
        return view('admin.katdokdiploma.edit',compact('katdokdiploma'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Katdokdiploma  $katdokdiploma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $katdokdiploma = Katdokdiploma::find($id);
        $rules = [
            'nama' => 'required|max:50|unique:katdokdiplomas,nama,'.$katdokdiploma->id,
            'deskripsi' => 'required|max:50',
        ];
        $customMessages = [
            'nama.max' => 'Nama maksimal 50 karakter',
            'nama.unique' => 'Nama kategori sudah ada',
            'deskripsi.max' => 'Alamat maksimal 50 karakter',
        ];
        $this->validate($request, $rules, $customMessages);
        $katdokdiploma->update($request->all());
  
        return redirect()->route('katdokdiploma.index')
                        ->with('success','Data Berhasil Dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Katdokdiploma  $katdokdiploma
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $katdokdiploma = Katdokdiploma::find($id);
        $katdokdiploma->delete();
  
        return redirect()->route('katdokdiploma.index')
                        ->with('success','Data Berhasil Dihapus');
    }
}
