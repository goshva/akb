<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'article' => random_int(10, 100000),
            'img' => 'https://main-cdn.goods.ru/big2/hlr-system/1696368414/100024048979b0.jpg',
            'purpose' => 'для легкого автомобиля',
            'type' => 'свинцово-кислотный ',
            'capacity' => random_int(10, 200),
            'vv' => random_int(10, 200),
            'amperes' => random_int(10, 200),
            'polarity' => 'обратная',
            'terminals' => 'test',
            'height' => random_int(10, 200),
            'width' => 200,
            'weight' => random_int(10, 20),
            'price' => random_int(5000, 29999),

        ];
    }
}
