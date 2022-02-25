<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\ProductTag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('tags', compact('tags'));
    }

    public function store(Request $request)
    {
        // $validated = $request->validate(Tag::$rules);

        $fields = $request->only(array_keys(Tag::$rules));
        Tag::create($fields);

        return $this->index();
    }

    public function update(Request $request, Tag $tag)
    {
        $fields = $request->only(array_keys(Tag::$rules));
        $tag->update($fields);

        return $this->index();
    }

    public function purge(Tag $tag)
    {
        ProductTag::where(['tag_id' => $tag->id])->delete();
        $tag->delete();
        return $this->index();
    }
}
