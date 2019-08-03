<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dok_sarjana extends Model
{
    //
    protected $fillable = ['uuid','namafile','publikasi', 'tahun', 'nama'];
    public function kat_dokumen()
    {
        return $this->belongsTo('App\Katdoksarjana','katdoksarjana_id');
    }

    public function scopeSearch2($query,$nama,$tahun)
    {
        return $query->where('nama', $nama)->where('tahun', $tahun)->orWhere('tahun', $tahun)->orWhere('nama', $nama)->where('publikasi','ya');
   
        //return $query->where('tahun', $tahun);
    }
}
