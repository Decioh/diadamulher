@extends('layouts.main')

@section('title', 'Agendar')

@section('content')  

<form action="{{ route('assistida.store')}}" method="POST">
    @csrf
    
    <div class="cadastro mt-3">
        <p class="fw-bold fs-5">Dados pessoais: </p>
        <div class="cadastron mt-3">
            <label class="form-label" for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" required>
        </div>
        <div class="cadastrotel mt-3"> 
            <label class="form-label" for="tel">Telefone:</label>
            <input type="text" id="tel" name="tel" maxlength="11" required>
        </div> 
        <div class="cidade mt-3"> 
            <label class="form-label" for="email">E-mail:</label>
            <input type="text" id="email" name="email" required>
        </div>
        <div class="mt-3">
            <label class="form-label" for="cidade">Cidade:</label>
            <select name="cidade" id="cidade">
                @foreach ($cidades as $cidade)
                    <option value="{{ $cidade->id }}">{{ $cidade->RA }}</option>
                @endforeach
            </select>
        </div>
        <div class="mt-3">
            <label>Lanches <input type="text" name="lanche" placeholder="0"></label>
        </div>
        <div class="mt-3">
            <label> Acompanhada <input type="checkbox" name="acompanhada" value="1"></label>
        </div>
        <div class="container p-5">
            <div class="mb-3 form-check col ">
              <label class="mx-3"> Defensoria Pública <input type="checkbox" name="defensoria_publica" value="1"></label>
              <label class="mx-3"> CRAS <input  type="checkbox" name="cras" value="1"></label>
              <label class="mx-3"> CODHAB <input  type="checkbox" name="codhab" value="1"></label>
              <label class="mx-3"> SENAC <input  type="checkbox" name="senac" value="1"></label>
            </div>
            <div class="mb-3 form-check form-check-inline">
                <label class="mx-3"> SESC Consulta       <input type="checkbox" name="sesc_consulta" value="1"></label>
                <label class="mx-3"> SESC Sensibilização <input type="checkbox" name="sesc_sens" value="1"></label>
                <label class="mx-3"> SESC Mamografia     <input type="checkbox" name="sesc_mamografia" value="1"></label>
                <label class="mx-3"> SESC Odonto         <input type="checkbox" name="sesc_odonto" value=1></label>
            </div>
            <div class="mb-3 form-check form-check-inline">
                <label class="mx-3"> SESC Inserção DIU   <input type="checkbox" name="sesc_insercao_diu" value=1></label>
                <label class="mx-3"> SESC Citopatológico <input type="checkbox" name="sesc_citopatologico" value=1></label>
                <label class="mx-3"> SESC Enfermagem     <input type="checkbox" name="sesc_enfermagem" value="1"></label>
            </div><br>
            <div class="mb-3 form-check form-check-inline">
                <label class="mx-3"> SEDET               <input type="checkbox" name="sedet" value="1"></label>
                <label class="mx-3"> Secretaria da mulher <input type="checkbox" name="secretaria_da_mulher" value="1"></label>
                <label class="mx-3"> Secretaria de Saúde <input type="checkbox" name="sec_saude" value="1"></label>
            </div><br>
            <div class="mb-3 form-check form-check-inline">
                <label class="mx-3"> Sejus Subav         <input type="checkbox" name="sejus_subav" value="1"></label>
                <label class="mx-3"> Delegacia da mulher <input type="checkbox" name="delegacia_da_mulher" value="1"></label>
                <label class="mx-3"> Fiocruz             <input type="checkbox" name="fiocruz" value="1"></label>
            </div>
        </div>
        <div class="mb-3 form-check form-check-inline">
            <label> Demanda não Atendida <input class="mx-2" type="checkbox" name="demanda_n_atendida" value="1"></label>
            <label> QUAL? <input type="text" name="qual"></label>
        </div>
        <br>
        <div class="form-group">
            <p>
                <input type="submit" class="btn btn-success" value="Cadastrar" >
                <input type="reset" class="btn btn-secondary" value="Limpar" >
            </p>
        </div>
    </div>
</form>

@endsection