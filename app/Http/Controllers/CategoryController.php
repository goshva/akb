<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category)
    {
        $c = $category::all();
        return view('admin.category.index')->with([
           'categories' => $c
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Category $category)
    {
       if ($request->method() == 'POST'){
           $category::create($request->all());
           return redirect()->back()->with(['message' => 'Вы успешно добавили категорию']);
       }
       return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Товары определенной категории
     * Ебаный род этого казино нахуй
     * Фильтруем нахуй
     * @param \App\Models\Category $category
     * @param Product $product
     * @param $name
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show(Category $category, Product $product, $name, Request $request)
    {
        $products = $product::paginate($product::all()->where('purpose', '=', $name));
        $requests = $request->all();
        isset($requests['priceTo']) ? $priceTo = $requests['priceTo'] : null;
        isset($requests['priceFrom']) ? $priceFrom = $requests['priceFrom'] : null;
        isset($requests['brands']) ? $brands = json_decode($requests['brands']) : null;
        $all_sort_prices = $product::all()->where('purpose', '=', $name);
        if (isset($requests['sort']) && $requests['sort']  == 'desc'){

            $all_prices = $all_sort_prices->sortBy([
                ['amperes', 'desc'],
            ]);
            return view('dashboard')->with([
                'products' => $product::paginate($all_prices),
                'requests' => $requests,
                'min' => Product::min('price'),
                'max' => Product::max('price')
            ]);
        }
        if (isset($requests['sort']) && $requests['sort']  == 'asc'){
            $all_prices = $all_sort_prices->sortBy([
                ['amperes', 'asc'],
            ]);
            return view('dashboard')->with([
                'products' => $product::paginate($all_prices),
                'requests' => $requests,
                'min' => Product::min('price'),
                'max' => Product::max('price')
            ]);
        }
        if (isset($priceFrom) && isset($priceTo) && isset($brands)){
            $all_prices = $product::all();
            $all_prices = $all_prices->where('price', '<=', trim($priceTo));
            $all_prices = $all_prices->where('price', '>=', trim($priceFrom));
            $all_prices = $all_prices->where('category_id', '=', $name);
            foreach($brands as $brand){
                $all_prices = $all_prices->where('brand_id', '=', $brand);
            }
            return view('dashboard')->with([
                'products' => $product::paginate($all_prices),
                'requests' => $requests,
                'min' => Product::min('price'),
                'max' => Product::max('price')
            ]);
        }
        if (isset($priceFrom) && isset($priceTo)){
            $all_prices = $product::all();
            $all_prices = $all_prices->where('price', '<=', trim($priceTo));
            $all_prices = $all_prices->where('price', '>=', trim($priceFrom));
            $all_prices = $all_prices->where('category_id', '=', $name);
//            if(isset($requests['brands'])){
//                $all_prices = $all_prices->where('brand_id', '=', $requests['brands'][0]);
//            }
            if (isset($requests['sort']) && $requests['sort']  == 'desc'){
                $all_prices = $all_prices->sortBy([
                    ['price', 'desc'],
                ]);
            }
            if (isset($requests['sort']) && $requests['sort']  == 'asc'){
                $all_prices = $all_prices->sortBy([
                    ['price', 'asc'],
                ]);
            }
            return view('dashboard')->with([
                'products' => $product::paginate($all_prices),
                'requests' => $requests,
                'min' => Product::min('price'),
                'max' => Product::max('price')
            ]);
        }
        else {

            return view('dashboard')->with([
                'min' => Product::min('price'),
                'max' => Product::max('price'),
                'products' => $products,
                'requests' => $requests
            ]);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, $id, Request $request)
    {
        $c = $category->find($id)->first();
        if($request->method() == 'POST'){
            $c->name = $request->name;
            $c->save();
            return redirect()->back()->with(['message' => 'Вы успешно обновили категорию']);
        }
        return view('admin.category.edit')->with([
            'category' => $c
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, $id)
    {
        $category->destroy($id);
        return redirect()->back()->with(['message' => 'Вы успешно удалили категорию']);
    }
}
