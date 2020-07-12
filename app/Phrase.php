<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phrase extends Model
{
    protected $guarded = [];

    // UUIDなのでStringを指定
    protected $keyType = 'string';

    // 今回はUUIDを使用しているので、incrementing機能は使用しない
    public $incrementing = false;

    // モデルから変換する配列やJSONに含めるべき属性を定義
    protected $visible = ['id', 'content', 'author'];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }
}
