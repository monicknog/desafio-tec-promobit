@extends('base')
@section('main')
<div class="row">
    <div class="col-sm-12">
        <h1 class="display-4 mb-5">Tags x Produtos</h1>
        <table class="table table-striped table-responsive">
            <thead>
                <tr>
                    <th class="col-md-2">ID</th>
                    <th class="col-md-6">Nome</th>
                    <th class="col-md-4">Nº de Produtos</th>
                    <th class="col-md-2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tags as $tag)
                <tr>
                    <td>{{$tag->id}}</td>
                    <td>{{$tag->name}}</td>
                    <td>{{ $tag->products_count }}
                    <td>
                        <a href="" class="btn btn-primary" id="products" data-toggle="modal" data-target='#productModal' data-id="{{ $tag->id }}">Ver Produtos</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="productModalLabel">Produtos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12" id="containerModal">
                        <ul id="listProducts">
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('script')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script>
    $(function($){
        $("[data-id]").click(function (e) {
            e.preventDefault();
            var type = "GET";
            var id = $(this).data('id');
            var ajaxurl = '/tags/'+id;
            $.ajax({
                type: type,
                url: '/tags/'+id,
                dataType: 'json',
                success: function (data) {
                    products = data.products;
                    if(products.length < 1){
                        $("#containerModal").append("<span>Não há produtos a serem listados</li>");
                    }
                    products.forEach(function(el) {
                        console.log(el);
                        $("#listProducts").append("<li class='h5'>" + el.name + "</li>");
                    });
                },
                error: function (data) {
                    console.log(data);
                }
            });
            $('#listProducts').empty();
        });
    });
</script>
@endpush
