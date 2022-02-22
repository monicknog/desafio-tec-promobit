<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();

        return view('tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:tag'
        ], [
            'name.required' => 'O campo NOME é obrigatório!',
            'name.unique' => 'TAG com esse NOME já existe!',
        ]);

        $tag = new Tag([
            'name' => $request->get('name')
        ]);

        $tag->save();

        return redirect('/tags')->with('success', 'Tag cadastrada com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        return $tag->load('products');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        Validator::make($request->all(), [
            'name' => [
                'required',
                Rule::unique('tag')->ignore($tag->id),
            ],
        ], [
            'name.required' => 'O campo NOME é obrigatório!',
            'name.unique' => 'Já existe uma TAG com esse nome!',
        ])->validate();

        // $request->validate([
        //     'name' => 'required',
        //     Rule::unique('tag')->ignore($tag->id, 'id')
        // ]);

        $tag->name =  $request->get('name');
        $tag->save();

        return redirect('/tags')->with('success', 'Tag atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect('/tags')->with('success', 'Tag excluída com sucesso!');
    }
}
