<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductTag;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $tags = Tag::all();

        return view('products', array(
            'products' => $products,
            'tags'     => $tags
        ));
    }

    public function store(Request $request)
    {

        $fields = $request->only(array_keys(Product::$rules));
        if ($newProduct = Product::create($fields)) {

            $tags = $request->only('tags');
            if (isset($tags['tags']) && is_countable($tags['tags']) && count($tags['tags']) > 0) {
                foreach ($tags['tags'] as $key => $tag) {
                    ProductTag::create([
                        'product_id' => $newProduct->id,
                        'tag_id'     => $tag
                    ]);
                }
            }
        }

        return redirect()->route('products');
    }

    public function update(Request $request, Product $product)
    {
        $fields = $request->only(array_keys(Product::$rules));
        $product->update($fields);

        $tags = $request->only('tags');
        if (isset($tags['tags']) && is_countable($tags['tags']) && count($tags['tags']) > 0) {

            ProductTag::where(['product_id' => $product->id])->delete();

            foreach ($tags['tags'] as $key => $tag) {
                ProductTag::create([
                    'product_id' => $product->id,
                    'tag_id'     => $tag
                ]);
            }
        }

        return redirect()->route('products');
    }

    public function purge(Product $product)
    {
        ProductTag::where(['product_id' => $product->id])->delete();
        $product->delete();
        return redirect()->route('products');
    }
}
