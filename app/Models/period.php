<?php

namespace App\Models;
use App\Models\period;
use App\Models\quran_episades;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class period extends Model
{
    use HasFactory;
    protected $table ='periods';
    protected $fillable = [
        // 'id',
        'type_period',];
        public function quran_episades(){
            return $this ->hasMany(quran_episades::class,  'Id_period','id');
        }
}
