<?php

namespace App\Http\Controllers;

use App\User;
use App\Role;
use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users= User::all();
        return view('admin.user.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $jabatan = Role::all();
        return view('admin.user.tambah',compact('jabatan'));
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
            'nama' => 'required|max:25',
            'no_id' => 'required|digits_between:6,8',
            'alamat' => 'required|max:50',
            'tgl_lahir' => 'required|date',
            'no_hp' => 'required|digits_between:10,12',
            'email' => 'required|max:30|email|unique:users',
            'jabatan' => 'required|numeric',
            'password' => 'required',
        ];
        $customMessages = [
            'nama.max' => 'Nama maksimal 25 karakter',
            'no_id.digits_between' => 'No identitas harus angka, minimal 5 dan maksimal 8 digit',
            'alamat.max' => 'Alamat maksimal 50 karakter',
            'tgl_lahir.date' => 'Format tanggal salah',
            'no_hp.digits_between' => 'nomor handphone harus angka, minimal 10 dan maksimal 12 digit',
            'email.max' => 'email maksimal 30 karakter',
            'jabatan.numeric' => 'Jabatan harus dipilih',
        ];
        $this->validate($request, $rules, $customMessages);
        $user = new User();
        $user->name = $request->nama;
        $user->no_hp = $request->no_hp;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->no_identitas = $request->no_id;
        $user->alamat = $request->alamat;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();
        $role = Role::find($request->jabatan);
        $user->roles()->attach($role);
        return redirect()->route('user.index')->with('success','Berhasil menambahkan User');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user= User::where('id', $id)->firstOrFail();
        return view('admin.user.lihat',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $jabatan = Role::all();
        $user= User::where('id', $id)->firstOrFail();
        return view('admin.user.edit',compact('jabatan','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $rules = [
            'nama' => 'required|max:25',
            'no_id' => 'required|digits_between:5,8',
            'alamat' => 'required|max:50',
            'tgl_lahir' => 'required|date',
            'no_hp' => 'required|digits_between:10,12',
            'email' => 'required|max:30|email|unique:users,email,'.$user->id,
            'jabatan' => 'required|numeric',
        ];
        $customMessages = [
            'nama.max' => 'Nama maksimal 25 karakter',
            'no_id.digits_between' => 'No identitas harus angka, minimal 5 dan maksimal 8 digit',
            'alamat.max' => 'Alamat maksimal 50 karakter',
            'tgl_lahir.date' => 'Format tanggal salah',
            'no_hp.digits_between' => 'nomor handphone harus angka, minimal 10 dan maksimal 12 digit',
            'email.max' => 'email maksimal 30 karakter',
            'email.unique' => 'email sudah pernah didaftarkan',
            'jabatan.numeric' => 'Jabatan harus dipilih',
        ];
        $this->validate($request, $rules, $customMessages);
        $user->name = $request->nama;
        $user->tgl_lahir = $request->tgl_lahir;
        $user->no_hp = $request->no_hp;
        $user->no_identitas = $request->no_id;
        $user->alamat = $request->alamat;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        
        $role = Role::find($request->jabatan);
        
        $user->roles()->sync($role->id);
        
        $user->update();
        return redirect()->route('user.index')->with('success','Berhasil merubah User');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::find($id);
        $user->roles()->detach();
        $user->delete();
        return redirect()->route('user.index')->with('success','Berhasil menghapus User');
    }

    public function search(Request $request)
    {
        # code...
        $users = User::search($request->nama,$request->email,$request->no_hp)->get();
        return view('admin.user.index',compact('users'));
    }
}
