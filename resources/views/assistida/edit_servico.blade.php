@extends('layouts.main')

@section('title', 'Agendar')

@section('content') 

<p class="mt-5">Editando <b>{{$assistida->nome}}</b></p><br>
<form action="{{ route('servico.update', $servico->id) }}" method="POST">
    @csrf
<div class="mt-3">
    <label>Lanches <input type="text" name="lanche" value="{{$servico->lanche}}"></label>
</div>
<div class="mt-3">
    <label> Acompanhada <input type="checkbox" name="acompanhada" value="1" {{ $servico->acompanhada ? 'checked' : '' }}></label>
</div>
<div class="container p-5">
    <div class="mb-3 form-check col">
      <label class="mx-3"> Defensoria Pública <input type="checkbox" name="defensoria" value="1" {{ $servico->defensoria ? 'checked' : '' }}></label>
      <label class="mx-3"> CRAS <input  type="checkbox" name="cras" value="1" {{ $servico->cras ? 'checked' : '' }}></label>
      <label class="mx-3"> CODHAB <input  type="checkbox" name="codhab" value="1" {{ $servico->codhab ? 'checked' : '' }}></label>
      <label class="mx-3"> SENAC <input  type="checkbox" name="senac" value="1" {{ $servico->senac ? 'checked' : '' }}></label>
    </div>
    <div class="mb-3 form-check form-check-inline">
        <label class="mx-3"> SESC Consulta       <input type="checkbox" name="sesc_consulta" value="1" {{ $servico->sesc_consulta ? 'checked' : '' }}></label>
        <label class="mx-3"> SESC Sensibilização <input type="checkbox" name="sesc_sens" value="1" {{ $servico->sesc_sens ? 'checked' : '' }}></label>
        <label class="mx-3"> SESC Mamografia     <input type="checkbox" name="sesc_mamografia" value="1" {{ $servico->sesc_mamografia ? 'checked' : '' }}></label>
        <label class="mx-3"> SESC Odonto         <input type="checkbox" name="sesc_odonto" value=1 {{ $servico->sesc_odonto ? 'checked' : '' }}></label>
    </div>
    <div class="mb-3 form-check form-check-inline">
        <label class="mx-3"> SESC Inserção DIU   <input type="checkbox" name="sesc_insercao_diu" value=1 {{ $servico->sesc_insercao_diu ? 'checked' : '' }}></label>
        <label class="mx-3"> SESC Citopatológico <input type="checkbox" name="sesc_citopatologico" value=1 {{ $servico->sesc_citopatologico ? 'checked' : '' }}></label>
        <label class="mx-3"> SESC Enfermagem     <input type="checkbox" name="sesc_enfermagem" value="1" {{ $servico->sesc_enfermagem ? 'checked' : '' }}></label>
    </div><br>
    <div class="mb-3 form-check form-check-inline">
        <label class="mx-3"> SEDET               <input type="checkbox" name="sedet" value="1" {{ $servico->sedet ? 'checked' : '' }}></label>
        <label class="mx-3"> Secretaria da mulher <input type="checkbox" name="secretaria_da_mulher" value="1" {{ $servico->secretaria_da_mulher ? 'checked' : '' }}></label>
        <label class="mx-3"> Secretaria de Saúde <input type="checkbox" name="sec_saude" value="1" {{ $servico->sec_saude ? 'checked' : '' }}></label>
    </div><br>
    <div class="mb-3 form-check form-check-inline">
        <label class="mx-3"> Sejus Subav         <input type="checkbox" name="sejus_subav" value="1" {{ $servico->sejus_subav ? 'checked' : '' }}></label>
        <label class="mx-3"> Delegacia da mulher <input type="checkbox" name="delegacia_da_mulher" value="1" {{ $servico->delegacia_da_mulher ? 'checked' : '' }}></label>
        <label class="mx-3"> Fiocruz             <input type="checkbox" name="fiocruz" value="1" {{ $servico->fiocruz ? 'checked' : '' }}></label>
    </div>
</div>
<div class="mb-3 form-check form-check-inline">
    <label> Demanda não Atendida
        <input class="mx-2" type="checkbox" name="demanda_n_atendida" id="demanda_n_atendida" value="1" {{ $servico->demanda_n_atendida ? 'checked' : '' }} onclick="demanda_n_atendida()">
    </label>

    <label> QUAL? <input type="text" name="qual" id="qual" value="{{$servico->qual}}">
    </label>
</div>
<br>
<div class="form-group">
    <p>
        <input type="submit" class="btn btn-success" value="Confirmar alterações" >
        <a href="{{route('assistida.index')}}"class="btn btn-secondary"> Voltar </a>
    </p>
</div>
</div>
</form>

@endsection