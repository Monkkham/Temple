<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class laryhub1 extends Model
{
    use HasFactory;
    protected $table = 'laryhub';
    protected $fillable = ['id','name','qty_price','curren_id','type_id','date','del','created_at','updated_at'];

    public function curren()
    {
        return $this->belongsTo('App\Models\Curren','curren_id','id');
    }
    public function type()
    {
        return $this->belongsTo('App\Models\Type','type_id','id');
    }
}
