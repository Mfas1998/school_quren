<?php

namespace App\Models;
use App\Models\Daily_Business;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class atendance extends Model
{
    use HasFactory;
    protected $table ='atendances';
    protected $fillable = [
        'id',
    'name'];

    public function  Daily_Business(){
        return $this->hasMany(Daily_Business::class,'id_atendances','id');
    }
}
