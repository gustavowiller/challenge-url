<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    protected $table = "status";
    protected $fillable = [
        'url',
        'user_id',
        'status_code',
        'body_response'
    ];

    protected $appends = [
        'lastUpdate'
    ];

    public function getLastUpdateAttribute()
    {
        return $this->updated_at;
    }

    public function scopeUser($query, int $userId)
    {
        return $query->where("user_id", $userId);
    }
}
