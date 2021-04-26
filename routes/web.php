<?php

use App\Models\Engine;
use App\Models\Generation;
use App\Models\Madel;
use App\Models\Article;
use App\Models\Mark;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/about/', function (){
    return view('about');
})->name('about');
Route::get('/pay', function (){
    return view('pay');
})->name('pay');
Route::get('/guarantee', function (){
    return view('guarantee');
})->name('guarantee');

Route::get('/services/charging', function (){
    return view('services.charging');
})->name('charging');
Route::get('/services/installing', function (){
    return view('services.installing');
})->name('installing');
Route::get('/services/check', function (){
    return view('services.check');
})->name('check');
Route::get('/services/podmena', function (){
    return view('services.podmena');
})->name('podmena');


Route::prefix('/info')->group(function (){
    Route::get('/promotions', function (){
        return view('info.promotions');
    })->name('info.promotions');
    Route::get('/capacity', function (){
        return view('info.capacity');
    })->name('info.capacity');
    Route::get('/check_date', function (){
        return view('info.check_date');
    })->name('info.check_date');
    Route::get('/news', function (){
        return view('info.news');
    })->name('info.news');
    Route::get('/reviews', function (){
        return view('info.reviews');
    })->name('info.reviews');
    Route::get('/policy', function (){
        return view('info.policy');
    })->name('info.policy');
    Route::get('/replacement', function (){
        return view('info.replacement');
    })->name('info.replacement');
});

Route::get('/recommendation/{id}', function ($id){
    return view('rec.' .$id);
});
Route::get('/recommendation', function (){
    return  view('recommendation');
})->name('recommendation');


Route::get('/', [\App\Http\Controllers\ProductController::class, 'dashboard'])->name('dashboard');

//TODO: deprecated Route::post('/baza', [\App\Http\Controllers\BazaController::class, 'getinfo'])->name('order.create');

Route::post('/order/create', [\App\Http\Controllers\OrderController::class, 'create'])->name('order.create');

Route::middleware(['Admin'])->prefix('admin')->group(function (){
    Route::get('/', function (){
        return view('admin.dashboard');
    })->name('admin.dashboard');
});


//Хуярим данные после пирсинга Миши
Route::get('/parsing/amonlox', function (){
    $data = json_decode(file_get_contents('finally.json'));
    foreach ($data as $d){
        \App\Models\Product::create([
            'name' => $d->name,
            'brand_id' => $d->brand_id,
            'category_id' => 'для легкового автомобиля',
            'article' => $d->article,
            'purpose' => 'для легкового автомобиля',
            'img' => $d->img,
            'capacity' => $d->capacity,
            'vv' => $d->vv,
            'amperes'  => @$d->amperes ? $d->amperes : 'не указано',
            'polarity' => $d->polarity,
            'terminals' => 'стандартные',
            'height' => $d->height,
            'width' => $d->width,
            'depth' => $d->depth,
            'weight' => 0,
            'trade_price' => $d->trade_price ,
            'price' => $d->price
        ]);
    }
});


Route::get('/csv', function () {
    if (($handle = fopen("list.csv", "r")) !== FALSE) {
        $csvs = [];
        while (!feof($handle)) {
            $csvs[] = fgetcsv($handle);
        }
        $datas = [];
        $column_names = [];
        foreach ($csvs[0] as $single_csv) {
            $column_names[] = $single_csv;
        }
        foreach ($csvs as $key => $csv) {
            if ($key === 0) {
                continue;
            }
            foreach ($column_names as $column_key => $column_name) {
                $datas[$key - 1][$column_name] = $csv[$column_key];
            }
        }
        fclose($handle);
        return response($datas);
    };
});

Route::any('/marka/{id}', function ($id){
    $models = Madel::where('mark_id', '=', $id)->get();
    return response($models);
});

Route::get('/marka/get/{id}', function ($id){
    $articles = Article::where('mark_id', $id)->get('model_id');
    $models = Madel::whereIn('id', $articles)->get();
    return response($models);
});

Route::any('/models/{id}', function ($id){
    $models = Generation::where('model_id', '=', $id)->get();
    return response($models);
});
Route::any('/engine/{id}', function ($id){
    $models = Engine::where('generation_id', '=', $id)->get();
    return response($models);
});

Route::get('/engine/get/{id}', function ($id){
    $articles = Article::where('generation_id', '=', $id)->get('engine_id');
    $engine = Engine::whereIn('id', $articles)->get();
    return response($engine);
});


Route::get('/add', function (){
    if (($handle = fopen("list.csv", "r")) !== FALSE) {
        $csvs = [];
        while (!feof($handle)) {
            $csvs[] = fgetcsv($handle);
        }
        $datas = [];
        $column_names = [];
        foreach ($csvs[0] as $single_csv) {
            $column_names[] = $single_csv;
        }
        foreach ($csvs as $key => $csv) {
            if ($key === 0) {
                continue;
            }
            foreach ($column_names as $column_key => $column_name) {
                $datas[$key - 1][$column_name] = $csv[$column_key];
            }
        }
        fclose($handle);
    };
    $data = $datas;
    foreach ($data as $item){

        if (count(Mark::where('name', '=', $item['Марка'])->get()) > 0){
            $mark = Mark::where('name', '=', $item['Марка'])->first();
        } else {
            $mark = Mark::create([
                'name' => $item['Марка']
            ]);

        }
        if (count(Madel::where('name', '=', $item['Модель'])->get()) > 0){
            $model = Madel::where('name', '=', $item['Модель'])->first();
        } else {
            $model = Madel::create([
                'name' => $item['Модель'],
                'mark_id' => $mark->id
            ]);

        }
        if (count(Generation::where('name', '=', $item['Поколение'])->get()) > 0) {
            $generation = Generation::where('name', '=', $item['Поколение'])->first();
        } else {
            $generation = Generation::create([
                'name' => $item['Поколение'],
                'mark_id' => $mark->id,
                'model_id' => $model->id
            ]);

        }
        if (count(Engine::where('name', '=', $item['Двигатель'])->get()) > 0){
            $engine = Engine::where('name', '=', $item['Двигатель'])->first();
        } else {
            $engine = Engine::create([
                'name' => $item['Двигатель'],
                'mark_id' => $mark->id,
                'model_id' => $model->id,
                'generation_id' => $generation->id
            ]);
        }
        $article = Article::create([
            'mark_id' => $mark->id,
            'model_id' => $model->id,
            'engine_id' => $engine->id,
            'generation_id' => $generation->id,
            'list' => $item['Артикул']
        ]);
    }
    dd(Article::all());
});


Route::get('/parsing/all_models', function (){
    $data = json_decode(file_get_contents('all_models.json'));
    foreach($data as $m){
        $marks = \App\Models\Mark::create([
            'name' => $m->mark
        ]);
        foreach($m->model as $model){
           $mm = \App\Models\Madel::create([
               'mark_id' => $marks->id,
               'name' => $model
           ]);
        }
    }
    return count(\App\Models\Mark::all());
});



Route::get('/product/{id}', [\App\Http\Controllers\ProductController::class, 'index'])->name('page.product');

Route::get('/category/{id}', [\App\Http\Controllers\CategoryController::class, 'show'])->name('category');


Route::get('/search/', [\App\Http\Controllers\ProductController::class, 'show'])->name('search');


Route::get('/search/{key}', [\App\Http\Controllers\ProductController::class, 'search'])->name('search.key');

Route::get('/brand/{name}', function ($name){
    $p = \App\Models\Product::where('brand_id', '=', $name)->get();
    return view('dashboard')->with([
        'products' => \App\Models\Product::paginate($p),
        'max' => \App\Models\Product::max('price'),
        'min' => \App\Models\Product::min('price'),
        ]);
})->name('brand_get');

Route::middleware(['Admin'])->prefix('admins')->group(function (){
    Route::get('/', [\App\Http\Controllers\AdminApiController::class, 'index'])->name('admin');
    Route::get('/products', [\App\Http\Controllers\ProductApiController::class, 'index'])->name('admin.products');
    Route::prefix('product')->group(function(){
        Route::any('/create', [\App\Http\Controllers\ProductApiController::class, 'create'])->name('admin.add.product');
        Route::any('/{id}/edit', [\App\Http\Controllers\ProductApiController::class, 'edit'])->name('admin.edit.product');
        Route::get('/{id}/destroy', [\App\Http\Controllers\ProductApiController::class, 'destroy'])->name('admin.product.destroy');
    });

    Route::get('/brands', [\App\Http\Controllers\BrandController::class, 'index'])->name('admin.brands');
    Route::prefix('brand')->group(function (){
        Route::any('/create', [\App\Http\Controllers\BrandController::class, 'create'])->name('admin.add.brand');
        Route::any('/{id}/edit', [\App\Http\Controllers\BrandController::class, 'edit'])->name('admin.edit.brand');
        Route::get('/{id}/destroy', [\App\Http\Controllers\BrandController::class, 'destroy'])->name('admin.brand.destroy');
    });
    Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index'])->name('admin.categories');
    Route::prefix('category')->group(function (){
        Route::any('/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('admin.add.category');
        Route::any('/{id}/edit', [\App\Http\Controllers\CategoryController::class, 'edit'])->name('admin.edit.category');
        Route::get('/{id}/destroy', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('admin.category.destroy');
    });
    Route::prefix('settings')->group(function (){
        Route::get('/', [\App\Http\Controllers\SettingsController::class, 'index'])->name('admin.settings');
        Route::post('/update/', [\App\Http\Controllers\SettingsController::class, 'update'])->name('admin.add.settings');
    });

    Route::get('/marks', [\App\Http\Controllers\MarkController::class, 'index'])->name('admin.marks');
    Route::prefix('mark')->group(function (){
        Route::any('/create', [\App\Http\Controllers\MarkController::class, 'store'])->name('admin.mark.add');
        Route::any('/{id}/edit', [\App\Http\Controllers\MarkController::class, 'edit'])->name('admin.mark.edit');
        Route::get('/{id}/destroy', [\App\Http\Controllers\MarkController::class, 'destroy'])->name('admin.mark.destroy');
    });


    Route::get('/models', [\App\Http\Controllers\MadelController::class, 'index'])->name('admin.models');
    Route::prefix('model')->group(function (){
        Route::any('/create', [\App\Http\Controllers\MadelController::class, 'store'])->name('admin.model.add');
//        Route::any('/{id}/edit', [\App\Http\Controllers\MadelController::class, 'edit'])->name('admin.model.edit');
        Route::get('/{id}/destroy', [\App\Http\Controllers\MadelController::class, 'destroy'])->name('admin.model.destroy');
    });


    Route::get('/orders', [\App\Http\Controllers\OrderController::class, 'index'])->name('admin.orders');
    Route::prefix('order')->group(function (){
        Route::any('/{id}/edit', [\App\Http\Controllers\OrderController::class, 'edit'])->name('admin.order.edit');
        Route::get('/update/{id}', [\App\Http\Controllers\OrderController::class, 'update'])->name('admin.order.update');
        Route::get('/{id}/destroy', [\App\Http\Controllers\OrderController::class, 'destroy'])->name('admin.order.destroy');
    });

    Route::get('/articles', [\App\Http\Controllers\ArticleController::class, 'index'])->name('admin.articles');
    Route::prefix('article')->group(function (){
        Route::any('/create', [\App\Http\Controllers\ArticleController::class, 'store'])->name('admin.article.add');
        Route::any('/{id}/edit', [\App\Http\Controllers\ArticleController::class, 'edit'])->name('admin.article.edit');
        Route::get('/{id}/destroy', [\App\Http\Controllers\ArticleController::class, 'destroy'])->name('admin.article.destroy');
    });

    Route::get('/generations', [\App\Http\Controllers\GenerationController::class, 'index'])->name('admin.generations');
    Route::prefix('generation')->group(function (){
        Route::any('/create', [\App\Http\Controllers\GenerationController::class, 'store'])->name('admin.generation.add');
        Route::any('/{id}/edit', [\App\Http\Controllers\GenerationController::class, 'edit'])->name('admin.generation.edit');
        Route::get('/{id}/destroy', [\App\Http\Controllers\GenerationController::class, 'destroy'])->name('admin.generation.destroy');
    });

    Route::get('/engines', [\App\Http\Controllers\EngineController::class, 'index'])->name('admin.engines');
    Route::prefix('engine')->group(function (){
        Route::any('/create', [\App\Http\Controllers\EngineController::class, 'store'])->name('admin.engine.add');
        Route::any('/{id}/edit', [\App\Http\Controllers\EngineController::class, 'edit'])->name('admin.engine.edit');
        Route::get('/{id}/destroy', [\App\Http\Controllers\EngineController::class, 'destroy'])->name('admin.engine.destroy');
    });
});
