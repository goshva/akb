<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function dashboard(Request $request, Product $products){
        $productss = $products::all();
        $requests = $request->all();
        isset($requests['priceTo']) ? $priceTo = $requests['priceTo'] : "";
        isset($requests['priceFrom']) ? $priceFrom = $requests['priceFrom'] : "";

        if (isset($requests['sort'])){
            if ($requests['sort'] == 'desc'){
                $items = $productss->sortBy([
                    ['amperes', 'desc']
                ]);

            }
            if ($requests['sort'] == 'asc'){
                $items = $productss->sortBy([
                    ['amperes', 'asc']
                ]);
            }
            $items = Product::paginate($items)->appends(request()->query());
            return view('dashboard')->with([
                'products' => $items,
                'requests' => $requests,
                'min' => Product::min('price'),
                'max' => Product::max('price'),
            ]);
        }

        if (isset($priceFrom) && isset($priceTo)){

            $items = Product::where([
                ['price', '>=', $priceFrom],
                ['price', '<=', $priceTo],
            ]);
            if (isset($requests['brands'])){

                $brands = json_decode($requests['brands']);
                $items = Product::where([
                    ['price', '>=', $priceFrom],
                    ['price', '<=', $priceTo],
                ])->whereIn('brand_id', $brands);
            }

            if (isset($requests['polarity'])){
                $polarity = json_decode($requests['polarity']);
                $items = $items->whereIn('polarity', $polarity);
            }
            if (isset($requests['amperes'])){
                $amperes = $requests['amperes'];
                $items = $items->where('amperes', $amperes);
            }
            if (isset($requests['brands']) && isset($requests['height'])){
                $items = $items->where('height', '=', $requests['height'])->whereIn('brand_id', $brands);
            }
            if (!isset($requests['brands']) && isset($requests['height'])){
                $items = Product::where([
                    ['price', '>=', $priceFrom],
                    ['price', '<=', $priceTo],
                    ['height', '=', $requests['height']]
                ]);
            }
            if (!isset($requests['brands']) && isset($requests['height']) && isset($requests['width'])){
                $items = Product::where([
                    ['price', '>=', $priceFrom],
                    ['price', '<=', $priceTo],
                    ['height', '=', $requests['height']],
                    ['width', '=', $requests['width']]
                ]);
            }
            if (!isset($requests['brands']) && isset($requests['height']) && isset($requests['width']) && isset($requests['depth'])){
                $items = Product::where([
                    ['price', '>=', $priceFrom],
                    ['price', '<=', $priceTo],
                    ['height', '=', $requests['height']],
                    ['width', '=', $requests['width']],
                    ['depth', '=', $requests['depth']]
                ]);
            }

            if (isset($requests['brands']) && isset($requests['height']) && isset($requests['width'])){
                $brands = json_decode($requests['brands']);
                $items = Product::where([
                    ['price', '>=', $priceFrom],
                    ['price', '<=', $priceTo],
                    ['height', '=', $requests['height']],
                    ['width', '=', $requests['width']],
                ])->whereIn('brand_id', $brands);
            }
            if (isset($requests['brands']) && isset($requests['height']) && isset($requests['width']) && isset($requests['depth'])){
                $brands = json_decode($requests['brands']);
                $items = Product::where([
                    ['price', '>=', $priceFrom],
                    ['price', '<=', $priceTo],
                    ['height', '=', $requests['height']],
                    ['width', '=', $requests['width']],
                    ['depth', '=', $requests['depth']]
                ])->whereIn('brand_id', $brands);
            }

            session()->flashInput($requests);
            if (isset($requests['sort'])){
                if ($requests['sort'] == 'desc'){
                    $items = $items->sortBy([
                        ['amperes', 'desc']
                    ]);
                }
                if ($requests['sort'] == 'asc'){
                    $items = $items->sortBy([
                        ['amperes', 'asc']
                    ]);
                }
            }
            return view('dashboard')->with([
                'products' => Product::paginate($items->get())->appends(request()->query()),
                'requests' => $requests,
                'min' => Product::min('price'),
                'max' => Product::max('price')
            ]);
        } else {
            if(isset($requests['mark_id']) && isset($requests['model_id']) && isset($requests['generation_id']) && isset($requests['engine_id'])){

                $articles = \App\Models\Article::where('mark_id', $requests['mark_id'])->where('engine_id', $requests['engine_id'])->get()->first();
               if ($articles){
                   $list = $articles->list;
                   $items = explode(',', $list);
                   $items = Product::whereIn('article', $items)->get();
                   $items = Product::paginate($items)->appends(request()->query());
               } else {
                   $items = Product::paginate(Product::all())->appends(request()->query());
                   return view('dashboard')->with([
                       'products' => $items,
                       'requests' => $requests,
                       'min' => Product::min('price'),
                       'max' => Product::max('price')
                   ]);
               }
            } else {
                $items = $productss->sortBy([
                    ['amperes', 'asc']
                ]);
                $items = Product::paginate($items)->appends(request()->query());
            }
            return view('dashboard')->with([
                'products' => $items,
                'requests' => $requests,
                'min' => Product::min('price'),
                'max' => Product::max('price')
            ]);

        }

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $prod = Product::findOrFail($id);
        return view('product.index')->with([
            'prod' => $prod
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * Поисковые данные
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function show(Product $product, Request $request)
    {
        $search_value = $request->search_value;
        $find = $product::where('name', 'like', "%".$search_value."%")->get();
        $find = $product::paginate($find)->appends(request()->query());
        $requests = $request->all();
        return view('dashboard')->with([
            'products' => $find,
            'requests' => $requests,
            'max' => $product::max('price'),
            'min' => $product::min('price'),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }


    public function search($key, Product $product){
            $products = $product->where('name', 'like', "%".$key."%")->get();
//            $products = collect([]);
            return response($products);
    }
}
