<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{

    protected $guarded = ['id'];

    protected $visible = ['id', 'name', 'details', 'phrases'];

    public function phrases()
    {
        return $this->hasMany(Phrase::class);
    }
}
