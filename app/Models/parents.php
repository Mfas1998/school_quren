<?php

namespace App\Models;

use App\Models\sex;
use App\Models\sexual;
use App\Models\identity;
use App\Models\student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class parents extends Model
{
    use HasFactory;
    protected $table ='parents';
    protected $fillable = [
'id',
        'Name_parents',
        'Phone',
        'identtity_id',
        'Number_identity',
        'sex_id',
        'sexual_id',
        'Job',
        'link_kinship',
        'Social_status',
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
    public function  student(){
        return $this->hasMany(student::class,'parents_id','id');
    }
}
