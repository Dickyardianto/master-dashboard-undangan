<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tema extends Model
{
    protected $fillable = ['id', 'nama_client', 'status', 'created_at', 'updated_at'];
}
