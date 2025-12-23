<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AiClassifications extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'input_type',
        'input_text',
        'input_image_path',
        'waste_name',
        'slug',
        'category',
        'description',
        'composition',
        'handling',
        'recycling',
        'impact',
        'raw_ai_response',
        'status',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Helper: cek apakah input berupa gambar
     */
    public function isImage(): bool
    {
        return $this->input_type === 'image';
    }

    /**
     * Helper: cek apakah input berupa teks
     */
    public function isText(): bool
    {
        return $this->input_type === 'text';
    }
}
