<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    use HasFactory;

    protected $fillable = [
        'student_id',
        'date',
        'invoice_number',
    ];

    public function items():BelongsToMany{
        return $this->belongsToMany(Item::class, "item_payments");
    }

    public function students():BelongsTo{
        return $this->belongsTo(Student::class, "payments");
    }

}
