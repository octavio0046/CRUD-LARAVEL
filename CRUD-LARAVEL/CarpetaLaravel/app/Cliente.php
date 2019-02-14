<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable=['id','nit','nombre'];
    protected $table ='clientes';
}
