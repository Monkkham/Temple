<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curren extends Model
{

    use HasFactory;
    protected $table = 'curren';
    protected $fillable = ['id','name','del','created_at'];
}
