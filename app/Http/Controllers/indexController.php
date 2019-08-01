<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use Illuminate\Support\Facades\DB;

class indexController extends Controller
{
    //
    public function index()
    {
        $files = File::where('publikasi', "ya")->get();
        //$files = DB::table('files')->where('publikasi','ya')->first();
        //dd($files);
        return view('guest.welcome',compact('files'));
    }

    public function search(Request $request)
    {
        # code...
        $files = File::search($request->nama,$request->tahun)->get();
        return view('guest.welcome',compact('files'));
    }
}
