<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function campus_documents()
    {
        return $this->hasMany(CampusDocument::class);
    }
    public function programs()
    {
        return $this->hasMany(Program::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}