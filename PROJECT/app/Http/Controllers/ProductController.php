<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // query params
        $limit = $request->limit ?? 10;
        $category = $request->category;
        $search = $request->search;

        // product category
        $productCategories = ProductCategory::all();
        if (!$category && count($productCategories) > 0) {
            $category = $productCategories[0]->id;
        }

        // product query
        $products = Product::where('category', $category)
            ->when($search, function ($q) use ($search) {
                return $q->where('product_name', 'LIKE', "%${search}%");
            })
            ->paginate($limit);

        // add product category to each product data
        foreach ($products as $k => $product) {
            for ($i = 0; $i < count($productCategories); $i++) {
                if ($product->category == $productCategories[$i]->id) {
                    $products[$k]['category_name'] = $productCategories[$i]->name;
                    continue;
                }
            }
        }

        return view('products.index')->with([
            'categories' => $productCategories,
            'datas' => $products,
        ]);
    }
}
