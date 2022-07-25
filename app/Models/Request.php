<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Request extends Model
{
    use Searchable;
    use HasFactory;
    protected $guarded = [];
    public function information()
    {
        return $this->user->information;
    }
    public function requestDocuments()
    {
        return $this->hasMany(RequestDocument::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    public function remarks()
    {
        return $this->hasMany(Remark::class);
    }

    public function ifDocumentsIsChecked()
    {
        return $this->has('requestDocuments', function ($query) {
            $query->where('docx_status', 'pending');
        })->exists();
    }
    public function isReadyToClaim()
    {
        return $this->status == 'ready-to-claim';
    }

    public function isClaimed()
    {
        return $this->status == 'claimed';
    }
    public function toSearchableArray()
    {
        return [
            'receiver_name'=>$this->receiver_name,
        ];
    }

    public function requestFromGraduatedStudent(){
        return $this->requestor_current_status=='graduated';
    }
}