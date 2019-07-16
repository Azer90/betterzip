<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class Article extends Model
{
    use Searchable;
    protected $table = 'article';
    public $asYouType = true;

    public function classify()
    {
        return $this->belongsTo(Classify::class);
    }


    public function getTagsAttribute($value)
    {
        return explode(',', $value);
    }

    public function setTagsAttribute($value)
    {
        $this->attributes['tags'] = implode(',', $value);
    }
    /**
     * 索引的字段
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array=$this->only('id','title', 'keywords', 'description','content');
        $array['content']=strip_tags($array['content']);

        return $array;
    }
}
