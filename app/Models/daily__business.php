<?php

namespace App\Models;
use App\Models\atendance;
use App\Models\student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class daily__business extends Model
{
    use HasFactory;
   protected $table ='daily__businesses';
   protected $fillable =
        [
        'id_student',
        'id_atendances',
        'from_surah',
        'from_ayah',
        'to_surah',
        'to_ayah',
        'seve_or_ver',];


public function  student(){
    return $this->belongsTo(student::class,'id_student','id');
}
public function  atendance(){
    return $this->belongsTo(atendance::class,'id_atendances','id');
}
}
