<?php

namespace App\Models;

use App\Http\Controllers\NisController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Murid extends Model
{
    use HasFactory;

    protected $fillable = [
        'nis_id',
        'kelas_id',
        'nama',
        'password',
        'foto',
    ];

    public function nis(){
        return $this->hasOne(Nis::class,'id','nis_id');
    }

    public function izin(){
        return $this->hasMany(Izin::class,'murid_id');
    }

    public function present(){
        return $this->hasMany(Present::class,'murid_id');
    }

     public function kelas(){
        return $this->hasOne(Kelas::class,'id','kelas_id');
    }
}
