<?php

namespace App\Http\Controllers;

use App\Models\Mark;
use Illuminate\Http\Request;

class MarkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marks = Mark::all();
        return view('admin.marks.index')->with([
            'orders' => $marks
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->method() == 'POST'){
            Mark::create($request->all());
            return redirect()->route('admin.marks')->with(['message' => 'Успешно создали марку']);
        }
        return view('admin.marks.create');
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
    public function edit($id, Mark $mark, Request $request)
    {
        $o = $mark->find($id);
        if($request->method() == 'POST'){
            $o->name = $request->name;
            $o->save();
            return redirect()->back()->with(['message' => 'Вы успешно обновили марку']);
        }
        return view('admin.marks.edit')->with([
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Mark $mark)
    {
        $mark::destroy($id);
        return redirect()->route('admin.marks')->with(['message' => 'Успешно удалили марку']);
    }
}
