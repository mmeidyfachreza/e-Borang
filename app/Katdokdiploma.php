<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Katdokdiploma extends Model
{
    //
    protected $fillable = ['nama','deskripsi','slug_judul'];
    public function dok_diploma()
    {
        return $this->hasMany('App\Dok_diploma');
    }
}
