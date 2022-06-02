<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Present extends Model
{
    use HasFactory;

    protected $fillable = [
        'murid_id',
        'status',
        'present_at',
    ];

    public function murid(){
        return $this->belongsTo(Murid::class,'murid_id','id');
    }


}
