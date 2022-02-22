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
        <h1 class="display-4">Tags</h1>
        <div>
            <a href="{{ route('tags.create')}}" class="btn btn-primary mt-2 mb-2">Adicionar Tag</a>
        </div>
        <table class="table table-striped table-responsive">
            <thead>
                <tr>
                    <th class="col-md-2">ID</th>
                    <th class="col-md-10">Nome</th>
                    <th class="col-md-2" colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                <tr>
                    <td>{{$tag->id}}</td>
                    <td>{{$tag->name}}</td>
                    <td>
                        <a href="{{ route('tags.edit',$tag->id)}}" class="btn btn-primary">Editar</a>
                    </td>
                    <td>
                        <form action="{{ route('tags.destroy', $tag->id)}}" method="post" onsubmit="return confirm('Deseja excluir {{ $tag->name }}?');">
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
