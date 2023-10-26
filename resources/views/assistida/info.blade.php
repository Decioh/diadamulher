
@extends('layouts.main')

@section('title', 'Informações assistida')

@section('content')    

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
    <!--a href="#"class="btn btn-warning btn my-5"> Editar </a-->
    <a class="btn btn-warning btn my-5" data-bs-toggle="modal" data-bs-target="#ModalEdit">
      Editar
    </a>
</p>


<h2>Atendimentos </h2>

@if(count($servicos)>0)    
    @foreach( $servicos as $servico )
    <div class="card mx-auto mb-5" style="width: 40rem;">
        <div class="row d-flex justify-content-center">
        <div class="card-body">
          <h5 class="card-title">{{date('d/m/y', strtotime($servico->created_at))}}</h5>
          <h6 class="card-subtitle mb-2 text-muted">{{date('H:i', strtotime($servico->created_at))}}</h6>
          <p class="card-text">Informações do agendamento:<br> </p>
          @php $i=$loop->index @endphp
            <b>Servicos prestados:</b><br>
            @foreach($services as $service)
              @if(isset($service[$i]))
                <p>{{$service[$i]}}</p>
              @endif
            @endforeach
        </div>
      </div>
    </div>
        <br>
    @endforeach
@else
<p>Assistida sem agendamentos</p>

@endif

@include('assistida.modal.edit');

@endsection
