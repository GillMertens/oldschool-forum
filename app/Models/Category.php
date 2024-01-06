<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'topic_id',
        'image_url'
    ];

    public function topic()
    {
        return $this->hasMany(Topic::class);
    }
}
