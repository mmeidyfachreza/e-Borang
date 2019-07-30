<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    //
    protected $table = 'guest';
    protected $fillable = ['no_identitas','nama','alamat','no_hp'];
}
