
@extends('layouts.main')

@section('title', 'Informações assistida')

@section('content')    

@php
$tel = preg_replace("/(\d{0})(\d{2})(\d{5})(\d{4})/", "\$1(\$2)\$3-\$4", $assistida->tel);
@endphp

<h3 class="mt-3">Informações assistida</h3>

<p>
    <b>Nome:</b> {{$assistida->nome}}<br>
    <b>Cidade:</b> {{$cidades[$assistida->cidades_id-1]->RA}}<br>
    <b>Cadastrada em:</b> {{date('d/m/Y', strtotime($assistida->created_at))}}<br>
    <b>E-mail:</b> {{$assistida->email}}<br>
    <b>Telefone:</b> {{$tel}}<br>
    <a href="#"class="btn btn-warning btn my-5"> Editar </a>
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

            <b>servicos prestados:</b><br>
            <p>defensoria: @if($servico->defensoria==1) <ion-icon name="done-all"></ion-icon> @else <ion-icon name="close"></ion-icon> @endif </p>
            <p>Cras: @if($servico->cras==1) <ion-icon name="done-all"></ion-icon> @else <ion-icon name="close"></ion-icon> @endif </p>
            <p>Codhab: @if($servico->codhab==1) <ion-icon name="done-all"></ion-icon> @else <ion-icon name="close"></ion-icon> @endif </p>
            <p>Senac: @if($servico->senac==1) <ion-icon name="done-all"></ion-icon> @else <ion-icon name="close"></ion-icon> @endif </p>
            <p>Sesc_Consulta: @if($servico->sesc_consulta==1) <ion-icon name="done-all"></ion-icon> @else <ion-icon name="close"></ion-icon> @endif </p>
            <p>Sesc_Sens: @if($servico->sesc_sens==1) <ion-icon name="done-all"></ion-icon> @else <ion-icon name="close"></ion-icon> @endif </p>
            <p>Sesc_Odonto: @if($servico->sesc_odonto==1) <ion-icon name="done-all"></ion-icon> @else <ion-icon name="close"></ion-icon> @endif </p>
            <p>Sesc_insercao_diu: @if($servico->sesc_insercao_diu==1) <ion-icon name="done-all"></ion-icon> @else <ion-icon name="close"></ion-icon> @endif </p>
            <p>sesc_citopatologico: @if($servico->sesc_citopatologico==1) <ion-icon name="done-all"></ion-icon> @else <ion-icon name="close"></ion-icon> @endif </p>
            <p>sesc_enfermagem: @if($servico->sesc_enfermagem==1) <ion-icon name="done-all"></ion-icon> @else <ion-icon name="close"></ion-icon> @endif </p>
            <p>sesc_mamografia: @if($servico->sesc_mamografia==1) <ion-icon name="done-all"></ion-icon> @else <ion-icon name="close"></ion-icon> @endif </p>
            <p>sedet: @if($servico->sedet==1) <ion-icon name="done-all"></ion-icon> @else <ion-icon name="close"></ion-icon> @endif </p>
            <p>secretaria_da_mulher: @if($servico->secretaria_da_mulher==1) <ion-icon name="done-all"></ion-icon> @else <ion-icon name="close"></ion-icon> @endif </p>
            <p>sec_saude: @if($servico->sec_saude==1) <ion-icon name="done-all"></ion-icon> @else <ion-icon name="close"></ion-icon> @endif </p>
            <p>sejus_subav: @if($servico->sejus_subav==1) <ion-icon name="done-all"></ion-icon> @else <ion-icon name="close"></ion-icon> @endif </p>
            <p>sesc_enfermagem: @if($servico->sesc_enfermagem==1) <ion-icon name="done-all"></ion-icon> @else <ion-icon name="close"></ion-icon> @endif </p>
            <p>delegacia_da_mulher: @if($servico->delegacia_da_mulher==1) <ion-icon name="done-all"></ion-icon> @else <ion-icon name="close"></ion-icon> @endif </p>
            <p>fiocruz: @if($servico->fiocruz==1) <ion-icon name="done-all"></ion-icon> @else <ion-icon name="close"></ion-icon> @endif </p>
        </div>
      </div>
    </div>
        <br>
    @endforeach
@else
<p>Assistida sem agendamentos</p>
@endif

@endsection