<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phrase extends Model
{
    protected $guarded = [];

    protected $keyType = 'string';

    public $incrementing = false;

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
