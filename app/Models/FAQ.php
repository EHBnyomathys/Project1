<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $table = 'faqs';
    protected $fillable = ['category_id', 'question', 'answer'];

    public function category()
    {
        return $this->belongsTo(FAQCategory::class, 'category_id');
    }
}
