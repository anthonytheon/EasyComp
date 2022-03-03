<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Competition extends Model
{
    use HasFactory;

    protected $table = 'competitions';
    public $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'name', 'date', 'category'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
