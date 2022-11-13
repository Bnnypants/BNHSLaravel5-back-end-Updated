<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Subjects;

class Teachers extends Model
{
    use HasFactory;


       protected $table = 'teachers';

       protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'email',
        'status',
        'phonenumber'
    ];

     public function subjects()
    {
        return $this->belongsToMany(Subjects::class);
    }
            public function subjectteacher()
    {
        return $this->belongsToMany(SubjectTeacher::class);
    }

}
