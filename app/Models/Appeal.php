<?php

namespace App\Models;

use App\Models\Competition;
use App\Models\User;
use App\Models\Appeal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appeal extends Model
{
    use HasFactory;

    // dont forget SoftDeletes

    protected $fillable = [
        'user_id', 'appeal_status', 'user_name'
    ];

    public function competition()
    {
        return $this->belongsTo(Competition::class, 'user_name', 'appeal_status', 'user_id');
    }
}
