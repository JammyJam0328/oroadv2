<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestDocument extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function request()
    {
        return $this->belongsTo(Request::class);
    }
    public function campusDocument()
    {
        return $this->belongsTo(CampusDocument::class);
    }
    
    public function isTOR()
    {
        return $this->campusDocument->document_id == 5;
    }
}