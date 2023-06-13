<?php

namespace App\Models;

use App\Models\student;
use App\Models\teacher;
use App\Models\period;
use App\Models\sex;
use App\Models\system_episodes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class quran_episades extends Model
{
    use HasFactory;
    protected $_FILES =[
                  'id' ,
                 'Id_teacher'       ,
                  'name_episodes',
                   'Id_period',
                   'number_student',
                   'sex_id',
                   'Id_system',
    ];
    public function  teacher(){
        return $this->belongsTo(teacher::class,'Id_teacher','id');
    }
    public function  period(){
        return $this->belongsTo(period::class,'Id_period','id');
    }
       public function  sex(){
        return $this->belongsTo(sex::class,'sex_id','id');
    }
      public function system_episodes(){
        return $this ->belongsTo(system_episodes::class, 'Id_system','id');
    }
    public function  student(){
        return $this->hasMany(student::class,'quran_episodes_id','id');
    }
}
