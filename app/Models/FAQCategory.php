<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQCategory extends Model
{
    protected $table = 'faq_categories';
    protected $fillable = ['name'];

    public function faqs()
    {
        return $this->hasMany(FAQ::class, 'category_id');
    }
}
