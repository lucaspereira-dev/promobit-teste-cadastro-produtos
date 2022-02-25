<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];

    public static $rules = [
        'name' => 'required|max:255'
    ];

    protected $appends = ['tags'];

    public function getTagsAttribute()
    {
        $tags = ProductTag::where('product_id', $this->id)->get();
        $tagsIDResult = [];

        foreach ($tags as $tag) {
            if ($currentTag = Tag::find($tag->tag_id)) {
                $tagsIDResult[$currentTag->id] = $currentTag->name;
            }
        }

        return $tagsIDResult;
    }
}
