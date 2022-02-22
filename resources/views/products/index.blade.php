@extends('base')
@section('main')
<div class="row">
    <div class="col-sm-12">
        @if(session()->get('success'))
          <div class="alert alert-success">
            {{ session()->get('success') }}
          </div>
        @endif
    </div>
    <div class="col-sm-12">
        <h1 class="display-4">Produtos</h1>
        <div>
            <a href="{{ route('products.create')}}" class="btn btn-primary mt-2 mb-2">Adicionar Produto</a>
        </div>
        <table class="table table-striped table-responsive">
            <thead>
                <tr>
                    <th class="col-md-2">ID</th>
                    <th class="col-md-6">Nome</th>
                    <th class="col-md-4">Tags</th>
                    <th class="col-md-2" colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>{{$product->name}}</td>
                    <td>@foreach ($product->tags as $tag )
                        <span class="badge badge-pill badge-dark">{{ $tag->name }}</span>
                    @endforeach</td>
                    <td>
                        <a href="{{ route('products.edit',$product->id)}}" class="btn btn-primary">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('products.destroy', $product->id)}}" method="post" onsubmit="return confirm('Deseja excluir {{ $product->name }}?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    <div>
</div>
@endsection
