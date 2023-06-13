<?php

namespace App\Models;
use App\Models\parents;
use App\Models\student;
use App\Models\teacher;
use App\Models\quran_episades;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sex extends Model
{

    use HasFactory;

    protected $table ='sexes';
    protected $fillable = [
        // 'id',
        'type',];
        public function  parents(){
            return $this->hasMany(parents::class,'sex_id','id');
        }
 public function  student(){
            return $this->hasMany(student::class,'sex_id','id');
        }
        public function  teacher(){
            return $this->hasMany(teacher::class,'sex_id','id');
        }
        public function quran_episades(){
            return $this ->hasMany(quran_episades::class,'sex_id','id');
        }
// public function usss(){
//     return $this ->hasMany(user::class, foreignKey: 'typeuser_id', localKey:'id');
// }


}
