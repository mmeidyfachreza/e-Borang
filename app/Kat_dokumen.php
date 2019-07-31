<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kat_dokumen extends Model
{
    //
    protected $fillable = ['nama','deskripsi'];
    public function dokumen()
    {
        return $this->hasOne('App\Dokumen');
    }
}
