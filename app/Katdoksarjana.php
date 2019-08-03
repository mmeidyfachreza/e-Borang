<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Katdoksarjana extends Model
{
    //
    protected $fillable = ['nama','deskripsi','slug_judul'];
    public function dok_sarjana()
    {
        return $this->hasMany('App\Dok_sarjana');
    }
}
