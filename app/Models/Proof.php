<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proof extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment_id',
        'file_id',
    ];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}