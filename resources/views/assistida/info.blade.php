
@extends('layouts.main')

@section('title', 'Informações assistida')

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
@php
$tel = preg_replace("/(\d{0})(\d{2})(\d{5})(\d{4})/", "\$1(\$2)\$3-\$4", $assistida->tel);
$i=0;
@endphp

<h3 class="mt-3">Informações assistida</h3>

<p>
    <b>Nome:</b> {{$assistida->nome}}<br>
    <b>Cidade:</b> {{$cidades[$assistida->cidades_id-1]->RA}}<br>
    <b>Cadastrada em:</b> {{date('d/m/Y', strtotime($assistida->created_at))}}<br>
    <b>E-mail:</b> {{$assistida->email}}<br>
    <b>Telefone:</b> {{$tel}}<br>
    <a class="btn btn-warning btn my-5" data-bs-toggle="modal" data-bs-target="#ModalEdit">
      Editar
    </a>
    <a class="btn btn-danger btn my-5" data-bs-toggle="modal" data-bs-target="#ModalDelete">
      Deletar
    </a>
</p>
@php $continue=0 @endphp
<h2>Atendimentos </h2>
@if(count($servicos)>0)    
    @foreach( $servicos as $servico )
      <div class="card mx-auto mb-5" style="width: 40rem;">
        <div class="row d-flex justify-content-center">
          <div class="card-body">
            <h5 class="card-title">{{date('d/m/y', strtotime($servico->created_at))}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{date('H:i', strtotime($servico->created_at))}}</h6>
            <p class="card-text">Informações do agendamento:<br> </p>
              <b>Servicos prestados:</b><br>
              @foreach($services as $service)
              @if($service=='fim'){{--Fim é o separador de serviços e indica que estamos em um dia diferente--}}
                @php array_shift($services); @endphp {{--Retira primeiro item da lista, para não repetir nas proxiams interações--}}
                @break
              @endif
                <p>{{ $service }}</p>
                @php array_shift($services); @endphp
              @endforeach
              <p><b>Demanda não atendida:</b><br></p>
              @if($servico->qual)<p>{{$servico->qual}}</p><p>@else - </p>@endif
              @if($loop->first)
            <a href="{{route('servico.show', $assistida->id)}}"class="float-end btn btn-warning btn-sm"> Editar </a>
        @endif
          </div>
        </div>
      </div>
      <br>
    @endforeach
@else
<p>Assistida sem agendamentos</p>

@endif

@include('assistida.modal.edit');
@include('assistida.modal.delete');
@endsection
