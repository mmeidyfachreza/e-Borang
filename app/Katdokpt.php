<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Katdokpt extends Model
{
    //
    
    protected $fillable = ['nama','deskripsi','slug_judul'];
    public function dok_pt()
    {
        return $this->hasMany('App\Dok_pt');
    }

    public static function boot()
    {
    parent::boot();

    static::deleted(function($kategori)
    {
        $kategori->dok_pt()->delete();
    });
    }
}
