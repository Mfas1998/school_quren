<?php

namespace App\Models;
use App\Models\system_episodes;
use App\Models\quran_episades;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class system_episodes extends Model
{
    use HasFactory;
    protected $table ='system_episodes';
    protected $fillable = [
        // 'id',
        'name',];
        public function quran_episades(){
            return $this ->hasMany(quran_episades::class,  'Id_system','id');
        }

}
