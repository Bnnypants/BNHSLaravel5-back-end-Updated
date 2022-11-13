<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sections extends Model
{
    use HasFactory;
           protected $fillable = [
            'section_number',
            'upper_gwa',
            'lower_gwa',
            'grade',
            'strand',
            'admission_limit',
            'admission_status'   
           ];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }


}
