<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class, 'category');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id');
    }
}