<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokumen extends Model
{
    //
    protected $fillable = ['uuid','namafile','publikasi', 'tahun', 'nama'];
    public function kat_dokumen()
    {
        return $this->belongsTo('App\Kat_dokumen');
    }
}
