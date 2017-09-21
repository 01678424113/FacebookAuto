<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(CategoriesPage::class,'id_category','id');
    }
}
