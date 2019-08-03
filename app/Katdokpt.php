<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Katdokpt extends Model
{
    //
    protected $fillable = ['nama','deskripsi','slug_judul'];
    public function dok_pt()
    {
        return $this->hasMany('App\Dok_pt');
    }
}
