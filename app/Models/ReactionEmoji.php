<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReactionEmoji extends Model
{
    use HasFactory;

    protected $fillable = ['emoji_code'];

    public function reactions()
    {
        return $this->hasMany(Reaction::class);
    }
}
