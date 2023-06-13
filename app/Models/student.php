<?php

namespace App\Models;
use App\Models\identity;
use App\Models\sex;
use App\Models\sexual;
use App\Models\parents;
use App\Models\quran_episades;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    protected $fillable = [
       ' id',
       'Name_student',
        'Date_birth	',
'Address',
'Chapret',
'School',
'identtity_id',
'Number_identity',
'sex_id',
'sexual_id',
'parents_id',
'Previous_save',
'Current_save',
'Date_Join_Episode',
'quran_episodes_id',
       ];
    // public function sex(){
    //     return $this->belongsTo('App\models\sex','ID_sex');
    // }
    public function  identity(){
        return $this->belongsTo(identity::class,'identtity_id','id');
    }
    public function  sex(){
        return $this->belongsTo(sex::class,'sex_id','id');
    }
    public function  sexual(){
        return $this->belongsTo(sexual::class,'sexual_id','id');
    }
    public function  parents(){
        return $this->belongsTo(parents::class,'parents_id','id');
    }
    public function  quran_episades(){
        return $this->belongsTo(quran_episades::class,'quran_episodes_id','id');
    }

    // public function sexone(){
    //     return $this->hasOne('App\models\sex','id');
    // }
    //     public function sexto(){
    //             return $this->belongsTo('App\models\sex','id');
    //         }

}
