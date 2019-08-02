<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kat_dokumen extends Model
{
    //
    protected $fillable = ['nama','deskripsi','slug_judul'];
    public function dok_sarjana()
    {
        return $this->hasMany('App\Dok_sarjana');
    }

    public function dok_pt()
    {
        return $this->hasMany('App\Dok_pt');
    }
}
