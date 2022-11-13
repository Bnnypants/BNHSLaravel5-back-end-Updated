<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomPasswordResetEmail;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Role;
use App\Models\Appeals;
use App\Models\Modality;
use App\Models\Sections;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [

        'name',
        'middlename',
        'lastname',
        'extensionname',
        'email',
        'password',
          'lastgradelevelcompleted',
          'strandtoenrolin',
          'semester',
          'studenttype',
          'indegenouscommunity',
          'indegency',
          'currentzipcode',
          'currentstreet',
          'currentcountry',
          'currenthousenumber',
          'currentbaranggay',
          'currentmunicipality',
          'currentprovince',
          'permanentzipcode',
          'permanentstreet',
          'permanentcountry',
          'permanenthousenumber',
          'permanentbaranggay' ,
          'permanentmunicipality',
          'permanentprovince', 
          'phonenumber', 
          'birthday', 
          'age' ,
          'sex' ,
          'mothertongue',
          'religion', 
          'generalaverage' ,
          'lrnnumber' ,
          'psastatus' ,
          'psanumber' ,
          'fatherfirstname' ,
          'fathermiddlename' ,
          'fatherlastname' ,
          'fatherphonenumber' ,
          'motherfirstname' ,
          'mothermiddlename' ,
          'motherlastname' ,
          'motherphonenumber',
          'guardianfirstname' ,
          'guardianmiddlename' ,
          'guardianlastname' ,
          'guardianphonenumber' ,
          'gradeleveltoenrolin' ,
          'lastschoolyearattended' ,
          'lastschoolattended' ,
          'schoolid',
          'birthcertificate', 
          'birthplace', 
          'reportcard'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

   // public function setPasswordAttribute($password)
    //{
      //  $this->attributes['password'] =  Hash::make($password);
    //}

     public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function appeals()
    {
        return $this->belongsToMany(Appeal::class);
    }

    public function modalities()
    {
        return $this->belongsToMany(Modality::class);
    }


     public function sections()
    {
        return $this->belongsToMany(Sections::class);
    }


    //check if user has roles 

    public function hasAnyRole(string $role)
    {
        return null !== $this->roles()->where('name',$role)->first();
    }

     public function hasAnyRoles(array $role)
    {
        return null !== $this->roles()->whereIn('name',$role)->first();
    }
       public function sendPasswordResetNotification($token)
    {
        $this->notify(new CustomPasswordResetEmail($token));
    }

}
