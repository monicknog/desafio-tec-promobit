@extends('base')
@section('main')
<div class="row">
    <div class="col-12">
        <h1>Editar Tag</h1>
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
        <form method="post" action="{{ route('tags.update', $tag->id) }}">
            @method('PATCH')
            @csrf
            <div class="col-md-6 col-xs-12 mb-2">
                <div class="form-group">
                    <label for="name">Nome:</label>
                    <input type="text" class="form-control" name="name" value={{ $tag->name }} />
                </div>
            </div>
            <div class="col-md-6 col-xs-12">
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </form>
    </div>
</div>
@endsection
