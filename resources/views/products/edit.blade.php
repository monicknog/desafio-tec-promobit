@extends('base')
@section('main')
<div class="row">
    <div class="col-12">
        <h1>Editar Produto</h1>
    </div>
    <div class="col-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <br/>
        @endif
    </div>
    <div class="col-12">
        <form method="post" action="{{ route('products.update', $product->id) }}">
            @method('PATCH')
            @csrf
            <div class="col-md-6 col-xs-12 mb-2">
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" class="form-control" name="name" value={{ $product->name }} />
                </div>
            </div>
            @php
                $productTags = $product->tags->pluck('id')->toArray();
            @endphp

            <div class="col-md-6 col-xs-12 mb-2">
                <div class="form-group">
                    <label for="name">Tags:</label>
                    <select name="tags[]" class="selectpicker" multiple data-width="100%" data-none-selected-text="Selecione uma ou mais" data-style="btn-default" data-style-base="form-control">
                        @foreach ( $tags as $tag )
                            @if(in_array($tag->id, $productTags))
                                <option selected value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @else
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endif

                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6 col-xs-12">
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </form>
    </div>
</div>
@endsection
