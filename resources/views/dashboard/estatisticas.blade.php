@extends('layouts.main')

@section('tile', 'Estatisticas')

@section('content')

<div class="container">
    <div class="row align-items-start">
        <div class="col">
            <a style="text-decoration:none" href="/">
            <div class="card mx-auto my-5" style="width: 20rem;">
                <article class="bg-gradient-green rounded">
                    <p class="mx-auto">Assistidas Cadastradas</p>
                    <h3>{{$assistidas}}</h3>       
                </article>
            </div>
            </a>
        </div>
        <div class="col">
            <a style="text-decoration:none" href="{{route('dashboard')}}">
            <div class="card mx-auto my-5" style="width: 20rem;">
            <article class="bg-gradient-blue rounded">
            <p class="mx-auto">Serviços Prestados</p>
            <h3> {{$total}} </h3>           
            </article>
            </div>
            </a>
        </div>
        <div class="col">
            <a style="text-decoration:none" href="{{route('dashboard')}}">
        <div class="card mx-auto my-5" style="width: 20rem;">
            <article class="bg-gradient-orange rounded">
            <p class="mx-auto">Historico de atendimentos</p>
            <h3> {{$servicos}} </h3>           
            </article>
        </div>
        </div>
        </a>
    </div>
</div><br>

<div class="row mx-1 mb-5">
    <section class="graficos col 12 my-5" >            
        <div class="grafico card z-depth-4">
            <span class="d-inline-flex p-2">
                <form action="{{route('dashboard')}}">
                    @csrf
                    <!--input type="submit" class="btn btn-warning btn-sm" value="filtrar" -->
                    <label for="mes_filter">
                        <select class=" form-select form-select-sm my-2 mx-2 " aria-label="Default select example" name="mes_filter" id="mes_filter"> <!--Mudar mes_filter para Carbon::now('M')-->
                            @foreach ($month as $month)
                                <option value="{{ $loop->iteration }}">{{ $month }}</option>
                            @endforeach
                        </select>
                        <label for="começo"><input type="number" value="2023" min="2023" max="2099" step="1" value="{{$ano}}" class="form-control" id="ano" name="ano"></label>
                        <input type="submit" class="btn btn-warning btn-sm mx-3" value="filtrar" >
                        <a href="{{route('dashboard')}}"><input type="button" class="btn btn-secondary btn-sm" value="resetar" ></a>
                    </label>
                </form>
            </span>
                <h5 class="center"> Atendimentos por mês</h5>
                @if($meses == 'nenhum agendamento no Ano selecionado')
                <p style="font-weight:bold">Nenhum histórico no Ano de {{$ano}}</p>
                @endif
                <canvas id="myChart" width="700" height="350{{--175--}}"></canvas>
        </div>           
    </section> 
    <section class="graficos col 12 my-5">            
        <div class="grafico card z-depth-4">
            <span class="d-inline-flex p-2">
                {{--<form action="{{route('dashboard')}}">
                    <input type="hidden" name="ano" value="{{$ano}}">
                    @csrf
                    <label for="mes_filter">
                        <select class=" form-select form-select-sm my-2 mx-2 " aria-label="Default select example" name="mes_filter" id="mes_filter"> <!--Mudar mes_filter para Carbon::now('M')-->
                            @foreach ($month as $month)
                                <option value="{{ $loop->iteration }}">{{ $month }}</option>
                            @endforeach
                        </select>
                        </label>
                    <input type="submit" class="btn btn-warning btn-sm mx-3" value="filtrar" >
                    <a href="{{route('dashboard')}}"><input type="button" class="btn btn-secondary btn-sm" value="resetar" ></a>
                </form>--}}
            </span>
            <h5 class="center mb-2"> Servicos @if($selected_month != 'todos os meses') <span style="font-weight:bold" >{{$selected_month}}</span> @endif</h5>
            @if($total == 0)
                <p style="font-weight:bold">Nenhum histórico para {{$selected_month}} de {{$ano}}</p>
            @endif
            <div>
                <canvas id="myPieChart"  width="850" height="555{{--350--}}"></canvas>
            </div> 
        </div>
    </section>           
</div>  
<div>
    <div>
        <canvas id="myChart"></canvas>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script>
        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
          type: 'bar',
          data: {
            labels: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            datasets: [{
              label: {{$ano}},
              data: [{{$tot_p_mes}}],
              borderWidth: 1,
              backgroundColor: [
                'rgba(255, 204, 204, 0.7)',
                'rgba(204, 255, 204, 0.7)',
                'rgba(204, 204, 255, 0.7)',
                'rgba(255, 255, 204, 0.7)',
                'rgba(255, 204, 255, 0.7)',
                'rgba(204, 255, 255, 0.7)',
                'rgba(255, 230, 204, 0.7)',
                'rgba(230, 255, 204, 0.7)',
                'rgba(204, 255, 230, 0.7)',
                'rgba(230, 204, 255, 0.7)',
                'rgba(255, 255, 230, 0.7)',
                'rgba(255, 230, 255, 0.7)',
            ]
            }]
          },
          options: {
            scales: {
              y: {
                beginAtZero: true
              }
            }
          }
        });
      </script>
</div>
<div>
    
  
     <script>
        document.addEventListener('DOMContentLoaded', function() {
           var ctx = document.getElementById('myPieChart').getContext('2d');
           var myPieChart = new Chart(ctx, {
              type: 'polarArea',
              data: {
                 labels: ["sesc mamografia - {{$sesc_mamografia}}", "defensoria - {{$defensoria}}", "cras - {{$cras}}", "codhab - {{$codhab}}", "senac - {{$senac}}", "sesc consulta - {{$sesc_consulta}}", "sesc sens - {{$sesc_sens}}", "sesc odonto - {{$sesc_odonto}}", "sesc inserção diu - {{$sesc_insercao_diu}}", "sesc citopatologico - {{$sesc_citopatologico}}", "sesc enfermagem - {{$sesc_enfermagem}}", "sedet - {{$sedet}}", "secretaria da mulher - {{$secretaria_da_mulher}}", "sec saude - {{$sec_saude}}", "delegacia da mulher - {{$delegacia_da_mulher}}", "fiocruz - {{$fiocruz}}", "nupemec - {{$nupemec}}", "seped - {{$seped}}", "pmdf - {{$pmdf}}"],
                 datasets: [{
                    data: [{{$sesc_mamografia}}, {{$defensoria}}, {{$cras}},{{$codhab}}, {{$senac}}, {{$sesc_consulta}},{{$sesc_sens}}, {{$sesc_odonto}}, {{$sesc_insercao_diu}},{{$sesc_citopatologico}}, {{$sesc_enfermagem}}, {{$sedet}},{{$secretaria_da_mulher}}, {{$sec_saude}}, {{$delegacia_da_mulher}},{{$fiocruz}},{{$nupemec}},{{$seped}},{{$pmdf}}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.7)',  // Raspberry
                        'rgba(54, 162, 235, 0.7)',  // Sky Blue
                        'rgba(255, 206, 86, 0.7)',  // Sunflower Yellow
                        'rgba(75, 192, 192, 0.7)',  // Teal
                        'rgba(153, 102, 255, 0.7)', // Lavender
                        'rgba(255, 159, 64, 0.7)',  // Pumpkin Orange
                        'rgba(0, 128, 0, 0.7)',    // Forest Green
                        'rgba(128, 0, 128, 0.7)',  // Royal Purple
                        'rgba(255, 0, 0, 0.7)',    // Classic Red
                        'rgba(50, 50, 255, 0.7)',    // Blue
                        'rgba(128, 128, 128, 0.7)', // Slate Gray
                        'rgba(0, 255, 0, 0.7)',    // Vivid Green
                        'rgba(255, 0, 255, 0.7)',  // Magenta
                        'rgba(0, 255, 255, 0.7)',  // Turquoise
                        'rgba(255, 255, 0, 0.7)',  // Golden Yellow
                        'rgba(165, 42, 42, 0.7)',  // Brown
                        'rgba(50, 50, 100, 0.7)',  // Turquoise
                        'rgba(255, 50, 50, 0.7)',  // Golden Yellow
                        'rgba(0, 0, 255, 0.7)'  // Deep Blue
                    ],
                    borderColor: [
                        'rgba(255, 99, 132,  1)',  // Raspberry
                        'rgba(54, 162, 235,  1)',  // Sky Blue
                        'rgba(255, 206, 86,  1)',  // Sunflower Yellow
                        'rgba(75, 192, 192,  1)',  // Teal
                        'rgba(153, 102, 255, 1)', // Lavender
                        'rgba(255, 159, 64,  1)',  // Pumpkin Orange
                        'rgba(0, 128, 0,     1)',    // Forest Green
                        'rgba(128, 0, 128,   1)',  // Royal Purple
                        'rgba(255, 0, 0,     1)',    // Classic Red
                        'rgba(0, 0, 255,     1)',    // Deep Blue
                        'rgba(128, 128, 128, 1)', // Slate Gray
                        'rgba(0, 255, 0,     1)',    // Vivid Green
                        'rgba(255, 0, 255,   1)',  // Magenta
                        'rgba(0, 255, 255,   1)',  // Turquoise
                        'rgba(255, 255, 0,   1)',  // Golden Yellow
                        'rgba(165, 42, 42,   1)',  // Brown
                        'rgba(50, 50, 100,   1)',  // Turquoise
                        'rgba(255, 0, 0,   1)',  // Golden Yellow
                        'rgba(50, 50, 200,   1)'  // blue
                    ],
                    borderWidth: 1
                 }]
              },
              options: {
                 responsive: true,
                 maintainAspectRatio: false,
                 title: {
                    display: true,
                    text: 'My Pie Chart'
                 }
              }
           });
        });
     </script>
    
</div>


@endsection