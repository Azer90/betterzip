<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classify extends Model
{
    protected $table = 'classify';

    public function article()
    {
        return $this->hasOne(Article::class);
    }
}
