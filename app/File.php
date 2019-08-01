<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    protected $fillable = ['uuid','namafile','publikasi', 'tahun', 'nama'];

    public function scopeSearch($query,$nama,$tahun)
    {
        return $query->where('nama', $nama)->where('tahun', $tahun)->orWhere('tahun', $tahun)->orWhere('nama', $nama)->where('publikasi','ya');
   
        //return $query->where('tahun', $tahun);
    }
}
