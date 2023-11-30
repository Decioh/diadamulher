@extends('layouts.main')

@section('title', 'Agendar')

<script>
    setTimeout(function() {
     $('#flashmsg').remove();
    }, 3000); 
</script>
@section('content') 
@if (session('fail'))
    <div class="fail_msg" id="flashmsg">
        {{ session('fail') }}
    </div>
@elseif (session('success'))
    <div class="msg">
        {{ session('success') }}
    </div>
@endif

<div id="search-container" class="col-md-12 justify-content-center">
    <h2>Buscar assistido</h2>
    <form action="{{route('assistida.index')}}" method="GET">
        <input type="text" id="search" name="search" placeholder="Procure pelo Nome ou Tel"> <br>
        <button type="submit" class="btn btn-warning btn-sm mt-1">Pesquisar</button>
    </form>
</div>
<div class="listAssistidos mb-5">
<table class="table">
    <thead>
        <tr>
            <th scope="col">Nome</th>
            <th scope="col">Telefone</th>
            <th scope="col">E-mail</th>
            <th scope="col">Cidade</th>
            <th scope="col">Último atendimento</th>
            <th scope="col">Ação</th>
        </tr>
    </thead>
@foreach ($assistidas as $assistida)
        @php
            $tel = preg_replace("/(\d{0})(\d{2})(\d{5})(\d{4})/", "\$1(\$2)\$3-\$4", $assistida -> tel);
        @endphp
        <tbody>
            <tr>
                <td>{{$assistida->nome}}</td>
                <td>{{$tel}}</td>
                <td>{{$assistida->email}}</td>
                <td>{{$cidades[$assistida->cidades_id-1]->RA}}</td>
                <td>@if($assistida->created_at != null){{date('d/m/Y', strtotime($assistida -> updated_at))}} @else - @endif</td>
                <td>
                    <a href="{{route('servico.create', $assistida->id)}}"class="btn btn-success btn-sm mb-1"> Novo</a>
                    <a href="{{route('servico.show', $assistida->id)}}"class="btn btn-info btn-sm mb-1"> Último </a>
                    <a href="{{route('assistida.show', $assistida->id)}}"class="btn btn-secondary btn-sm mb-1"> Info </a>
                </td>
            </tr>
        </tbody>
@endforeach
@if(isset($search))
    @if((count($assistidas)==0))
        <p>Não foi encontrada uma assistida com o dado pesquisado: {{$search}}</p> 
    @endif
@endif
    <a href="{{route('assistida.create')}}"class="btn btn-success btn-sm"> Cadastrar </a>  
    </div>
    
    <div class="mt-3 mx-auto" style="width: 150px">
</div>
<div class="row">{{$assistidas->links('pagination::bootstrap-4')}}</div>

@endsection
