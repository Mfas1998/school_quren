<?php

namespace App\Models;

use App\Models\Job;
use App\Models\gender;
use App\Models\identity;
use App\Models\nationality;
use App\Models\quran_episodes;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Qualification_study;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Teacher extends Authenticatable implements JWTSubject
{

    use HasFactory,HasApiTokens, Notifiable;
    public function getJWTIdentifier() {
        return $this->getKey();
    }
    public function getJWTCustomClaims() {
        return [];
    }
    // protected $table ='teachers';
    protected $fillable =[
        'id',
        'name',
        'work',
        'salary',
        'teaching_years',
        'center_they_work',
        'address',
        'identity_id',
        'number_identity',
        'gender_id',
        'nationality_id',
        'birth_date',
        'qualification_study_id',
        'email',
        'phone',
        'password',
        'job_id', ];

            public function  identity(){
                return $this->belongsTo(identity::class,'identity_id','id');
            }

            public function  nationality(){
                return $this->belongsTo(nationality::class,'nationality_id','id');
            }

            public function Qualification_study(){
                return $this ->belongsTo(Qualification_study::class, 'qualification_study_id','id');
            }
            public function quran_episades(){
                return $this ->hasMany(quran_episodes::class,'teacher_id','id');
            }
            public function  job(){
                return $this->belongsTo(Job::class,'job_id','id');
            }
            public function  gender(){
                return $this->belongsTo(gender::class,'gender_id','id');
            }


}
