<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('tags')->get();

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('products.create', compact('tags'));
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
            'name' => 'required|unique:product',
            'tags' => 'array',
            'tags.*' => 'exists:tag,id'
        ], [
            'name.required' => 'O campo NOME é obrigatório!',
            'name.unique' => 'Já existe um PRODUTO com esse nome!',
            'tags.*.exists' => 'TAG não encontrada!'
        ]);

        $product = new Product([
            'name' => $request->get('name')
        ]);
        $product->save();

        $product->tags()->sync($request->get('tags'));
        return redirect('/products')->with('success', 'Produto cadastrado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $tags = Tag::all();
        $productTags = $product->tags()->pluck('tag_id');
        return view('products.edit', compact('product', 'tags', 'productTags'));
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
        Validator::make($request->all(), [
            'name' => [
                'required',
                Rule::unique('product')->ignore($product->id),
            ],
            'tags' => 'array',
            'tags.*' => 'exists:tag,id'
        ], [
            'name.required' => 'O campo NOME é obrigatório!',
            'name.unique' => 'Já existe um PRODUTO com esse nome!',
            'tags.*.exists' => 'TAG não encontrada!'
        ])->validate();

        $product->name =  $request->get('name');
        $product->save();

        $product->tags()->sync($request->get('tags'));

        return redirect('/products')->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/products')->with('success', 'Produto excluído com sucesso!');
    }
}
