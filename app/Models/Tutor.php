<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tutor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'phone_number',
        'dni',                                           
    ];
    
        // public function students(): BelongsToMany
        // {
        //     return $this->belongsToMany(Tutor::class,"student_tutors");
        // }

    public function students():BelongsToMany { 
        return $this->belongsToMany(Student::class);
    }
}

