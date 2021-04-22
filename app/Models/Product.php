<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',  'article', 'purpose',
        'brand_id', 'category_id',
        'img', 'type', 'capacity', 'vv',
        'amperes', 'polarity', 'terminals', 'height',
        'width', 'depth', 'weight', 'price', 'popular', 'trade_price', 'model_id', 'mark_id'
    ];

    public function brand(){
        return $this->hasOne(Brand::class, 'id', 'brand_id');
    }

    public function category(){
        return $this->hasMany(Category::class, 'id', 'category_id');
    }

    public function marks(){
        return $this->hasOne(Mark::class, 'id', 'mark_id');
    }
    public function models(){
        return $this->hasOne(Madel::class, 'id', 'model_id');
    }

    public static function getFiltered($priceTo, $priceFrom, $brands = null, $height = 0, $width = 0, $depth = 0){
        $prod = Product::all();
        $prod = $prod->where('price', '<=', trim($priceTo));
        $prod = $prod->where('price', '>=', trim($priceFrom));


        if ($brands != null){
                $prod = $prod->where('brand_id', '=', $brands);
                return Product::paginate($prod->all());
        }

        return Product::paginate($prod->all());
    }

    /**
     * @param $items
     * @param int $perPage
     * @param null $page
     * @param array $options
     * @return LengthAwarePaginator
     */
    public static function paginate($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
