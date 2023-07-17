<?php

namespace App\Models;

use App\Models\nationality;
use App\Models\identity;
use App\Models\User;
use App\Models\type_users;
use App\Models\Qualification_study;
use App\Models\quran_episodes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher extends Model
{
    use HasFactory;
    protected $table ='teachers';
    protected $fillable =[
        'id',
        'name',
        'qualification',
        'work',
        'salary',
        'teaching_years',
        'center_they_work',
        'address',
        'identity_id',
        'number_identity',
        'gender',
        'nationality_id',
        'birth_date',
        'qualification_study_id',
        'users_id',

               ];

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
            public function  userss(){
                return $this->belongsTo(User::class,'users_id','id');
            }
            // public function  tybe_userss(){
            //     return $this->belongsTo(type_users::class,'type_users_id','id');
            // }
}
