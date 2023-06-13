<?php

namespace App\Models;
use App\Models\sex;
use App\Models\sexual;
use App\Models\identity;
use App\Models\Qualification_study;
use App\Models\quran_episades;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use HasFactory;
    // protected $table ='trachers';
    protected $fillable =[
        'id',
        'Name_tracher',
        'Date_birth',
        'Qualification',
        'Work',
        'Salary',
        'phone',
        'Email',
        'Teaching_years',
        'Center_they_work',
        'Address',
        'identtity_id',
        'Number_identity',
        'sex_id',
        'sexual_id',
        'qualification_study_id',
               ];

               public function  identity(){
                return $this->belongsTo(identity::class,'identtity_id','id');
            }
            public function  sex(){
                return $this->belongsTo(sex::class,'sex_id','id');
            }
            public function  sexual(){
                return $this->belongsTo(sexual::class,'sexual_id','id');
            }

            public function Qualification_study(){
                return $this ->belongsTo(Qualification_study::class, 'qualification_study_id','id');
            }
            public function quran_episades(){
                return $this ->hasMany(quran_episades::class,  'Id_teacher','id');
            }
}
