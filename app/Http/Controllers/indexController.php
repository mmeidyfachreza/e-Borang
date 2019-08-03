<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Katdokpt;
use App\Katdoksarjana;
use App\Dok_pt;
use App\Dok_sarjana;
use Illuminate\Support\Facades\DB;

class indexController extends Controller
{
    //
    public function index()
    {
        $dok_sarjana = Dok_sarjana::where('publikasi', "ya")->get();
        $dok_pt = Dok_pt::where('publikasi', "ya")->get();
        $submenus1= Katdokpt::all();
        $submenus2= Katdoksarjana::all();
        //$files = DB::table('files')->where('publikasi','ya')->first();
        //dd($files);
        return view('guest.welcome',compact('dok_sarjana','dok_pt','submenus1','submenus2'));
    }

    public function showSarjana($slug)
    {
        $submenus1= Katdokpt::all();
        $submenus2= Katdoksarjana::all();
        $dok = Katdoksarjana::where('slug_judul',$slug);
        return view('guest.listdok',compact('dok','submenus1','submenus2'));
    }

    public function showPerguruanTinggi($slug)
    {
        $submenus1= Katdokpt::all();
        $submenus2= Katdoksarjana::all();
        $kat = Katdokpt::where('slug_judul',$slug)->firstOrFail();
        $dok = Dok_pt::where('katdokpt_id',$kat->id)->get();
        $title = "Sarjana/".$kat->nama;
        return view('guest.listdok',compact('dok','submenus1','submenus2','title'));
    }

    public function search1(Request $request)
    {
        # code...
        $dok_pt = Dok_pt::search1($request->namaS,$request->tahunS)->get();
        $dok_sarjana = Dok_sarjana::where('publikasi', "ya")->get();
        return view('guest.welcome',compact('dok_sarjana','dok_pt'));
    }

    public function search2(Request $request)
    {
        # code...
        $dok_sarjana = Dok_sarjana::search2($request->nama,$request->tahun)->get();
        $dok_pt = Dok_pt::where('publikasi', "ya")->get();
        return view('guest.welcome',compact('dok_sarjana','dok_pt'));
    }
}
