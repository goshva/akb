<?php

namespace App\Http\Controllers;

use App\Models\Generation;
use Illuminate\Http\Request;

class GenerationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $g = Generation::all();
        return view('admin.generations.index')->with([
            'orders' => $g
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
        if ($request->method() == 'POST'){
            Generation::create($request->all());
            return redirect()->route('admin.generations')->with(['message' => 'Успешно создали поколение']);
        }
        return view('admin.generations.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Generation  $generation
     * @return \Illuminate\Http\Response
     */
    public function show(Generation $generation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Generation  $generation
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit(Generation $generation, Request $request, $id)
    {
    $o = $generation->find($id)->get();
        if($request->method() == 'POST'){
            $o[0]->name = $request->name;
            $o[0]->mark_id = $request->mark_id;
            $o[0]->model_id = $request->model_id;
            $o[0]->save();
            return redirect()->back()->with(['message' => 'Вы успешно обновили поколение']);
        }
        return view('admin.generations.edit')->with([
            'order' => $o[0]
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Generation  $generation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Generation $generation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Generation  $generation
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Generation $generation, $id)
    {
        $generation::destroy($id);
        return redirect()->route('admin.generations')->with(['message' => 'Успешно удалили поколение']);
    }
}
