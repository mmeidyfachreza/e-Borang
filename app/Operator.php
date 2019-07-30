<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operator extends Model
{
    //
    protected $table = "operator";
    protected $fillable = ['no_identitas','nama','alamat','no_hp'];
     
}
