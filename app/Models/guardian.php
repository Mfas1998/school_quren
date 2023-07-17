<?php

namespace App\Models;
use App\Models\gender;
use App\Models\student;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class guardian extends Model
{
   // use HasFactory;
    protected $table ='Guardians';
    protected $fillable = [
        'id',
        'name',
        'gender_id',
        'job',
        'social_status',
        'email',
        'phone',
        'password',
    ];

    public function  gender(){
        return $this->belongsTo(gender::class,'gender_id','id');
    }
    public function  student(){
        return $this->hasMany(student::class,'guardian_id','id');
    }
}
