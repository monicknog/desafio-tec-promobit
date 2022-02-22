@extends('base')
@section('main')
<div class="row">
 <div class="col-sm-12">
    <h1 class="display-4">Cadastro de Tag</h1>
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
      <form method="post" action="{{ route('tags.store') }}">
        @csrf
        <div class="col-12 mb-2">
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" class="form-control" name="name"/>
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
