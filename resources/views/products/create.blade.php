@extends('base')
@section('main')
<div class="row">
    <div class="col-sm-12">
        <h1>Cadastro de Produto</h1>
        <div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br/>
            @endif
        </div>
    </div>
    <div class="col-sm-12">
      <form method="post" action="{{ route('products.store') }}">
        @csrf
        <div class="col-md-6 col-xs-12 mb-2">
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" name="name"/>
            </div>
        </div>
        <div class="col-md-6 col-xs-12 mb-2">
            <div class="form-group">
                <label for="name">Tags:</label>
                <select name="tags[]" class="selectpicker" multiple data-width="100%" @if(count($tags) > 0) data-none-selected-text="Selecione uma ou mais" @else data-none-selected-text="Não há tags cadastradas" disabled @endif data-style="btn-default" data-style-base="form-control">
                    @foreach ( $tags as $tag )
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-6 col-xs-12">
          <button type="submit" class="btn btn-primary">Adicionar</button>
        </div>
      </form>
  </div>
</div>
</div>
@endsection
