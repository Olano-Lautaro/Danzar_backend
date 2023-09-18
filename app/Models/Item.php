<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'amount',
        'category_id'
    ];

    public function students():BelongsToMany{
        return $this->belongsToMany(Student::class);
    }

    public function payments():BelongsToMany{
        return $this->belongsToMany(Payment::class);
    }

    public function categories():BelongsTo{
        return $this->belongsTo(Category::class);
    }

}
