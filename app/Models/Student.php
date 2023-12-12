<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'last_name',
        'address',
        'dni',
        'phone_number',
        'status',
        'observations',     
        'birthdate'                                     
    ];

    public function items():BelongsToMany{
        return $this->belongsToMany(Item::class);
    }

    public function tutors():BelongsToMany{
        return $this->belongsToMany(Tutor::class);
    }

    public function payments():HasMany{
        return $this->hasMany(Payment::class);
    }
    
}
