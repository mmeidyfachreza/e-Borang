<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Katdokpt;
use App\Katdoksarjana;
use App\Dok_pt;
use App\Dok_sarjana;
use Illuminate\Support\Str;
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
        $kat = Katdoksarjana::where('slug_judul',$slug)->firstOrFail();
        $dok = Dok_sarjana::where('katdoksarjana_id',$kat->id)->get();
        $title = $kat->nama;
        return view('guest.listdokS',compact('dok','submenus1','submenus2','title'));
    }

    public function showPerguruanTinggi($slug)
    {
        $submenus1= Katdokpt::all();
        $submenus2= Katdoksarjana::all();
        $kat = Katdokpt::where('slug_judul',$slug)->firstOrFail();
        $dok = Dok_pt::where('katdokpt_id',$kat->id)->get();
        $title = $kat->nama;
        return view('guest.listdokPT',compact('dok','submenus1','submenus2','title'));
    }

    public function search1(Request $request)
    {
        # code...
        $submenus1= Katdokpt::all();
        $submenus2= Katdoksarjana::all();
        $dok_pt = Dok_pt::search1($request->namaS,$request->tahunS)->get();
        $dok_sarjana = Dok_sarjana::where('publikasi', "ya")->get();
        return view('guest.welcome',compact('dok_sarjana','dok_pt','submenus1','submenus2'));
    }

    public function search2(Request $request)
    {
        # code...
        $submenus1= Katdokpt::all();
        $submenus2= Katdoksarjana::all();
        $dok_sarjana = Dok_sarjana::search2($request->nama,$request->tahun)->get();
        $dok_pt = Dok_pt::where('publikasi', "ya")->get();
        return view('guest.welcome',compact('dok_sarjana','dok_pt','submenus1','submenus2'));
    }

    public function searchbykat1(Request $request,$title)
    {
        # code...
        $submenus1= Katdokpt::all();
        $submenus2= Katdoksarjana::all();
        $slug = Str::slug($title);
        $slug = Katdoksarjana::where('slug_judul',$slug)->firstOrFail();
        $title= $slug->nama;
        $dok = Dok_sarjana::searchbykatS($request->nama,$request->tahun,$slug->id)->get();
        
        return view('guest.listdokS',compact('dok','title','submenus1','submenus2'));
    }

    public function searchbykat2(Request $request,$title)
    {
        # code...
        $submenus1= Katdokpt::all();
        $submenus2= Katdoksarjana::all();
        $slug = Str::slug($title);
        $slug = Katdokpt::where('slug_judul',$slug)->firstOrFail();
        $title= $slug->nama;
        $dok = Dok_pt::searchbykatPT($request->nama,$request->tahun,$slug->id)->get();
        
        return view('guest.listdokPT',compact('dok','title','submenus1','submenus2'));
    }
    
}
