<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Pet extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'type',
        'breed',
        'age',
        'personality',
        'avatar', // store just filename e.g., "poodle1.png"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Returns full URL for avatar
    public function getAvatarUrlAttribute()
    {
        if ($this->avatar) {
            return asset('template_default-images/'.$this->avatar);
        }

        return asset('template_default/images/mojo-img1.png'); // fallback
    }
}
