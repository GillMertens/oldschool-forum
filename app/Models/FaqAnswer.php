<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqAnswer extends Model
{
    use HasFactory;

    protected $fillable = ['answer', 'faq_id'];

    public function faq()
    {
        return $this->belongsTo(Faq::class);
    }
}
