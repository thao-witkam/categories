<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';
    protected $fillable = ['categoryId', 'title', 'content'];

    public function category()
    {
        return $this->belongsTo('App\Category', 'categoryId');
    }
}
