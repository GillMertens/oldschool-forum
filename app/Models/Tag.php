<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function topic()
    {
        return $this->belongsToMany(Topic::class);
    }
}
