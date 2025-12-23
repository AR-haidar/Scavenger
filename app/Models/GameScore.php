<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'score',
        'correct_answers',
        'wrong_answers'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}