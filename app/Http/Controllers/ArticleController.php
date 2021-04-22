<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Product;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('admin.articles.index')->with([
            'brands' => $articles
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
    public function store(Request $request, Article $article)
    {
        if ($request->method() == 'POST'){
            $o = $article::create([
                'mark_id' => $request->mark_id,
                'model_id' => $request->model_id,
                'generation_id' => $request->generation_id,
                'engine_id' => $request->engine_id,
                'list' => $request->articles
            ]);
            return redirect()->back()->with(['message' => 'Вы успешно создали артикл']);
        }
        return view('admin.articles.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Article $article)
    {
        $mark_id = $request->mark_id;
        $model_id = $request->model_id;
        $articles = $article::where('mark_id', $mark_id)->where('model_id', $model_id)->get()->first();
        $list = $articles->list;
        $items = explode(',', $list);
        $products = Product::whereIn('article', $items)->get();
        return response($products);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id, Article $article)
    {
        $o = $article->find($id);
        if($request->method() == 'POST'){
            $o->mark_id = $request->mark_id;
            $o->model_id = $request->model_id;
            $o->pokolenie = $request->pokolenie;
            $o->engine = $request->engine;
            $o->list = $request->articles;
            $o->save();
            return redirect()->back()->with(['message' => 'Вы успешно обновили артикл']);
        }
        return view('admin.articles.edit')->with([
            'order' => $o
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        Article::destroy($id);
        return redirect()->back()->with(['message' => 'Вы успешно удалили артикл']);
    }
}
