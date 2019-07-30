<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    protected $fillable = ['uuid','namafile','publikasi', 'tahun', 'nama'];
}
