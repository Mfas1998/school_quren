<?php

namespace App\Models;


// use App\Models\sexual;
// use App\Models\identity;
use App\Models\student;
use App\Models\User;
// use App\Models\type_users;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guardian extends Model
{
    use HasFactory;
    protected $table ='guardian';
    protected $fillable = [
        'name',
        'gender',
        // 'Phone',
        'job',
   
        'social_status',
        'users_id',

    ];

    public function  student(){
        return $this->hasMany(student::class,'guardian_id','id');
    }
    public function  userss(){
        return $this->belongsTo(User::class,'users_id','id');
    }

}
