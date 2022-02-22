@extends('base')
@section('main')
<div class="row">
    <div class="col-12">
        <h1 class="display-4">Desafio Técnico - Promobit</h1>
        <span> Projeto desenvolvido para o processo seletivo para vaga Pessoa Desenvolvedora Backend Junior (Vaga Remota)</span>
    </div>
    <div class="col-sm-12">
        <div class="py-5">
            <h2 class="pb-2 border-bottom">Requisitos</h2>
            <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
            <div class="col">
                <h4>Tags</h4>
                <span>Listar, Criar, Editar e Remover</span>
                <br>
                <a href="{{ route('tags.index')}}" class="btn btn-primary mt-2">
                Ir para página
                </a>
            </div>
            <div class="col">
                <div class="bg-primary bg-gradient">
                </div>
                <h4 class="">Produtos</h4>
                <span>Listar, Criar, Editar e Remover</span>
                <br>
                <a href="{{ route('products.index')}}" class="btn btn-primary mt-2">
                    Ir para página
                </a>
            </div>

            <div class="col">
                <h4>Relatório</h4>
                <span>Relatório de relevância de produtos</span>
                <br>
                <a href="{{ route('reports.index')}}" class="btn btn-primary mt-2">
                Ir para página
                </a>
            </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="col-sm-12">
        <span>Desafio realizado por Monick Nogueira, disponível em: <a href="https://github.com/monicknog/desafio-tec-promobit"> Repositório GitHub</a></span>
    </div>
</div>
@endsection
