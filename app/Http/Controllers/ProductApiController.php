<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Madel;
use App\Models\Mark;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductApiController extends Controller
{


    public function __construct()
    {
        $this->middleware('Admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('admin.product.index')->with([
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
//        $this->validate([
//            'title' => 'string:255',
//        ]);

        if($request->method() == 'POST'){
            $product_img = $request->file('img');
            $extension = $product_img->extension();
            if ($product_img->getMimeType() == 'image/png'
                || $product_img->getMimeType() == 'image/jpeg'
                || $product_img->getMimeType() == 'image/webp'
            ){
                $path = $product_img->storePubliclyAs('public/products', $request->name.'_'.$request->article.'.'.$extension);
                $product = Product::create([
                    'name' => $request->name,
                    'article' => $request->article,
                    'purpose' => $request->purpose,
                    'category_id' => $request->category_id ? $request->category_id : null,
                    'brand_id' => $request->brand_id ? $request->brand_id: null,
                    'img' => '/storage/'.$path = str_replace( 'public/', '', $path.'?v='.time()),
                    'type' => $request->type,
                    'capacity' => $request->capacity,
                    'price' => $request->price
                ]);
                return redirect()->back()->with(['message' => 'Вы успешно добавили продукт']);
            }
        }
        $categories = Category::all();
        $brands = Brand::all();
        return view('admin.product.create')->with([
           'categories' => $categories,
            'brands' => $brands
        ]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $product = Product::where('id', $id)->first();
        $marks = Mark::all();
        $models = Madel::all();
        if ($request->method() == 'POST'){
            $product->name = $request->name;
            $product->model_id = $request->model_id;
            $product->mark_id = $request->mark_id;
            $product->article = $request->article;
            $product->purpose = $request->purpose;
            $product->type = $request->type;
            $product->capacity = $request->capacity;
            $product->price = $request->price;
            $product_img = $request->file('img');
            if($product_img){
                $extension = $product_img->extension();
                if ($product_img->getMimeType() == 'image/png'
                    || $product_img->getMimeType() == 'image/jpeg'
                    || $product_img->getMimeType() == 'image/webp'
                ){
                    $path = $product_img->storePubliclyAs('public/products', $request->name.'_'.$request->article.'.'.$extension);
                    $product->img = '/storage/'.$path = str_replace( 'public/', '', $path.'?v='.time());
                }
            }
            $product->save();
            return redirect()->back()->with(['message' => 'Вы успешно обновили продукт']);
        }
        return view('admin.product.edit')->with([
            'product' => $product,
            'marks' => $marks,
            'models' => $models
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return redirect()->back()->with(['message' => 'Вы успешно удалили товар']);
    }
}
