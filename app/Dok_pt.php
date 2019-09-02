<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dok_pt extends Model
{
    //
    protected $fillable = ['uuid','namafile','publikasi', 'tahun', 'nama'];
    public function kat_dokumen()
    {
        return $this->belongsTo('App\Katdokpt','katdokpt_id');
    }

    public function scopeSearch1($query,$nama,$tahun)
    {
        $split = preg_split('/\s+/', $nama, -1, PREG_SPLIT_NO_EMPTY);
        
        return $query
        ->where(function ($q) use ($split) {
            foreach ($split as $value) {
              $q->orWhere('nama', 'like', "%{$value}%");
            }
        })
        ->where('tahun', $tahun)
        ->where('publikasi','ya')
        
        ->orWhere('tahun', $tahun)
        ->orWhere(function ($q) use ($split) {
            foreach ($split as $value) {
              $q->orWhere('nama', 'like', "%{$value}%");
            }
        })
        ->where('publikasi','ya');
    }

    public function scopeSearchbykatPT($query,$nama,$tahun,$kat_id)
    {
        $split = preg_split('/\s+/', $nama, -1, PREG_SPLIT_NO_EMPTY);
        
        return $query
        ->where(function ($q) use ($split) {
            foreach ($split as $value) {
              $q->orWhere('nama', 'like', "%{$value}%");
            }
        })
        ->where('tahun', $tahun)
        ->where('publikasi','ya')
        ->where('katdokpt_id',$kat_id)
        ->orWhere('tahun', $tahun)
        ->orWhere(function ($q) use ($split) {
            foreach ($split as $value) {
              $q->orWhere('nama', 'like', "%{$value}%");
            }
        })
        ->where('publikasi','ya')
        ->where('katdokpt_id',$kat_id);
    }
}
