<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
class Post extends Model
{
    //
    public $table = 'posts';




    public function category()  {
        return $this->hasOne(Category::class, 'id', 'subcat_id');
    }

    public function userName() {
        return $this->belongsTo(User::class,'user_id', 'id');
}
}
