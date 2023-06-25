<?php
namespace App\Models;
use App\Models\identity;
use App\Models\nationality;
use App\Models\guardian;
use App\Models\quran_episod;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class student extends Model
{
    use HasFactory;

    protected $fillable = [
       ' id',
       'name',
        'address	',
        'school',
        'identity_id',
        'number_identity',
        'gender',
        'nationality_id',
        'guardian_id',
        'previous_save',
        'date_Join',
        'quran_episodes_id',
        'users_id',
        'image',
        'birth_date',
           ];

    public function  identity(){
        return $this->belongsTo(identity::class,'identity_id','id');
    }

    public function  nationality(){
        return $this->belongsTo(nationality::class,'nationality_id','id');
    }
    public function  parents(){
        return $this->belongsTo(guardian::class,'guardian_id','id');
    }
    public function  quran_episod(){
        return $this->belongsTo(quran_episod::class,'quran_episodes_id','id');
    }
    public function  userss(){
        return $this->belongsTo(User::class,'users_id','id');
    }

    // public function sexone(){
    //     return $this->hasOne('App\models\sex','id');
    // }
    //     public function sexto(){
    //             return $this->belongsTo('App\models\sex','id');
    //         }

     /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier() {
        return $this->getKey();
    }
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims() {
        return [];
    }
    public function gitImageUrlAttribute(){
                return Storage::disk('imagesfp')->url($this->image);

                }

}
