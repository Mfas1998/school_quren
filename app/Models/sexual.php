<?php

namespace App\Models;
use App\Models\parents;
use App\Models\student;
use App\Models\teacher;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sexual extends Model
{
    use HasFactory;

    // public function  parents(){
    //     return $this->hasMany(parents::class,foreignKey:'Id_sexuals');
    // }
    protected $table ='sexuals';
    protected $fillable = [
        // 'id',
        'name_sexual'];
    public function  parents(){
        return $this->hasMany(parents::class,'sexual_id','id');
    }
public function  student(){
        return $this->hasMany(student::class,'sexual_id','id');
    }
    public function  pare(){
        return $this->hasMany(teacher::class,'sexual_id','id');
    }

}
