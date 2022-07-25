<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampusDocument extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function campus()
    {
        return $this->belongsTo(Campus::class);
    }

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function requestDocuments()
    {
        return $this->hasMany(RequestDocument::class);
    }
}