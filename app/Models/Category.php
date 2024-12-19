<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Category extends Model
{
    public $timestamps = false;
    public $table = 'categories';

public function parent()  {
    return $this->hasOne(Category::class, 'id', 'parent_id');
}
}

