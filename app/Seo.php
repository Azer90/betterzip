<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
    protected $table = 'seo';

    public function nav()
    {
        return $this->belongsTo(Nav::class);
    }
}
