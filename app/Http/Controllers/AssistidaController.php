<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Assistida;
use App\Models\Servico;
use App\Models\Cidade;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller as BaseController;

class AssistidaController extends Controller
{

    public function index(){
        
        $search = request('search');
            if($search){
                $assistidas = DB::table('assistidas')
                    ->where('nome', 'like', '%'.$search.'%')
                    ->orWhere('tel', 'like','%'.$search.'%')->simplePaginate(20);
            }
            else{
                $assistidas = Assistida::orderBy('nome', 'asc')->simplePaginate(20);
            }
        $cidades = DB::table('cidades')->get();
    return view ('home', ['assistidas'=>$assistidas, 'search'=>$search, 'cidades'=>$cidades]);
    }

    public function create()
    {
        $cidades = DB::table('cidades')->get();

        $assistidas = DB::table('assistidas')->get();

      return view('cadastro',['cidades'=>$cidades, 'assistidas'=>$assistidas]);
    }
    public function store(Request $req)
    {
        $assistida = new Assistida();

        $assistida->nome       = $req->nome;
        $assistida->tel        = $req->tel;
        $assistida->cidades_id = $req->cidade;
        $assistida->email      = $req->email;

        $assistida->save();

        $assistida_id = $assistida->id;

        $lanche              = $req->lanche;
        $acompanhada         = isset($req->acompanhada);
        $defensoria_publica  = isset($req->defensoria_publica);
        $cras                = isset($req->cras);
        $codhab              = isset($req->codhab);
        $senac               = isset($req->senac);
        $sesc_consulta       = isset($req->sesc_consulta);
        $sesc_sens           = isset($req->sesc_sens);
        $sesc_mamografia     = isset($req->sesc_mamografia);
        $sesc_odonto         = isset($req->sesc_odonto);
        $sesc_insercao_diu   = isset($req->sesc_insercao_diu);
        $sesc_citopatologico = isset($req->sesc_citopatologico);
        $sesc_enfermagem     = isset($req->sesc_enfermagem);
        $sedet               = isset($req->sedet);
        $secretaria_da_mulher= isset($req->secretaria_da_mulher);
        $sec_saude           = isset($req->sec_saude);
        $sejus_subav         = isset($req->sejus_subav);
        $delegacia_da_mulher = isset($req->delegacia_da_mulher);
        $fiocruz             = isset($req->fiocruz);
        $nupemec             = isset($req->nupemec);
        $pmdf                = isset($req->pmdf);
        $seped               = isset($req->seped);
        $sabin               = isset($req->sabin);
        $demanda_n_atendida  = isset($req->demanda_n_atendida);
        $qual                = $req->qual;

        $servico = new Servico();

        $servico->assistida_id        = $assistida_id;
        $servico->lanche              = $lanche;
        $servico->acompanhada         = $acompanhada;
        $servico->defensoria          = $defensoria_publica;
        $servico->cras                = $cras;
        $servico->codhab              = $codhab;
        $servico->senac               = $senac;
        $servico->sesc_consulta       = $sesc_consulta;
        $servico->sesc_sens           = $sesc_sens;
        $servico->sesc_mamografia     = $sesc_mamografia;
        $servico->sesc_odonto         = $sesc_odonto;
        $servico->sesc_insercao_diu   = $sesc_insercao_diu;
        $servico->sesc_citopatologico = $sesc_citopatologico;
        $servico->sesc_enfermagem     = $sesc_enfermagem;
        $servico->sedet               = $sedet;
        $servico->secretaria_da_mulher= $secretaria_da_mulher;
        $servico->sec_saude           = $sec_saude;
        $servico->sejus_subav         = $sejus_subav;
        $servico->delegacia_da_mulher = $delegacia_da_mulher;
        $servico->fiocruz             = $fiocruz;
        $servico->nupemec             = $nupemec;
        $servico->pmdf                = $pmdf;
        $servico->seped               = $seped;
        $servico->sabin               = $sabin;
        $servico->demanda_n_atendida  = $demanda_n_atendida;
        $servico->qual                = $qual;

        $servico->save();
    return redirect()->route('assistida.index');
    }
    public function show($id) {

        $assistida = Assistida::findOrFail($id);

        $servicos = DB::table('servicos')->where('assistida_id',$id)->orderBy('created_at', 'desc')->get(); 

        $defensoria = Servico::where('assistida_id',$id)->where('defensoria', '=', '1')->get('defensoria');
        $cras = Servico::where('assistida_id',$id)->where('cras', '=', '1')->get('cras');
        $codhab = Servico::where('assistida_id',$id)->where('codhab', '=', '1')->get('codhab');
        $senac = Servico::where('assistida_id',$id)->where('senac', '=', '1')->get('senac');
        $sesc_consulta = Servico::where('assistida_id',$id)->where('sesc_consulta', '=', '1')->get('sesc_consulta');
        $sesc_sens = Servico::where('assistida_id',$id)->where('sesc_sens', '=', '1')->get('sesc_sens');
        $sesc_mamografia = Servico::where('assistida_id',$id)->where('sesc_mamografia', '=', '1')->get('sesc_mamografia');
        $sesc_odonto = Servico::where('assistida_id',$id)->where('sesc_odonto', '=', '1')->get('sesc_odonto');
        $sesc_insercao_diu = Servico::where('assistida_id',$id)->where('sesc_insercao_diu', '=', '1')->get('sesc_insercao_diu');
        $sesc_citopatologico = Servico::where('assistida_id',$id)->where('sesc_citopatologico', '=', '1')->get('sesc_citopatologico');
        $sesc_enfermagem = Servico::where('assistida_id',$id)->where('sesc_enfermagem', '=', '1')->get('sesc_enfermagem');
        $secretaria_da_mulher = Servico::where('assistida_id',$id)->where('secretaria_da_mulher', '=', '1')->get('secretaria_da_mulher');
        $sec_saude = Servico::where('assistida_id',$id)->where('sec_saude', '=', '1')->get('sec_saude');
        $sejus_subav = Servico::where('assistida_id',$id)->where('sejus_subav', '=', '1')->get('sejus_subav');
        $delegacia_da_mulher = Servico::where('assistida_id',$id)->where('delegacia_da_mulher', '=', '1')->get('delegacia_da_mulher');
        $fiocruz = Servico::where('assistida_id',$id)->where('fiocruz', '=', '1')->get('fiocruz');
        $sedet = Servico::where('assistida_id',$id)->where('sedet', '=', '1')->get('sedet');
        $nupemec = Servico::where('assistida_id',$id)->where('nupemec', '=', '1')->get('nupemec');
        $pmdf = Servico::where('assistida_id',$id)->where('pmdf', '=', '1')->get('pmdf');
        $seped = Servico::where('assistida_id',$id)->where('seped', '=', '1')->get('seped');
        $sabin = Servico::where('assistida_id',$id)->where('sabin', '=', '1')->get('sabin');
        $services=null;
        $services = (array)$services;

        if(isset($defensoria[0]))
            array_push($services, $defensoria);
        if(isset($cras[0]))
            array_push($services, $cras);
        if(isset($codhab[0]))
            array_push($services, $codhab);
        if(isset($senac[0]))
            array_push($services, $senac);
        if(isset($sesc_consulta[0]))
            array_push($services, $sesc_consulta);
        if(isset($sesc_sens[0]))
            array_push($services, $sesc_sens);
        if(isset($sesc_mamografia[0]))
            array_push($services, $sesc_mamografia);
        if(isset($sesc_odonto[0]))
            array_push($services, $sesc_odonto);
        if(isset($sesc_insercao_diu[0]))
            array_push($services, $sesc_insercao_diu);
        if(isset($sesc_citopatologico[0]))
            array_push($services, $sesc_citopatologico);
        if(isset($sesc_enfermagem[0]))
            array_push($services, $sesc_enfermagem);
        if(isset($secretaria_da_mulher[0]))
            array_push($services, $secretaria_da_mulher);
        if(isset($sec_saude[0]))
            array_push($services, $sec_saude);
        if(isset($sejus_subav[0]))
            array_push($services, $sejus_subav);
        if(isset($delegacia_da_mulher[0]))
            array_push($services, $delegacia_da_mulher);
        if(isset($fiocruz[0]))
            array_push($services, $fiocruz);
        if(isset($sedet[0]))
            array_push($services, $sedet);
        if(isset($nupemec[0]))
            array_push($services, $nupemec);
        if(isset($pmdf[0]))
            array_push($services, $pmdf);
        if(isset($seped[0]))
            array_push($services, $seped);
        if(isset($sabin[0]))
            array_push($services, $sabin);

        $cidades = DB::table('cidades')->get();

    return view('/assistida/info', ['assistida' => $assistida, 'servicos'=> $servicos,'cidades'=>$cidades, 'services'=>$services]);
    }

    public function update(Request $req){

        $assistida = Assistida::find($req -> id);

        $assistida->nome       = $req->nome;
        $assistida->tel        = $req->tel;
        $assistida->cidades_id = $req->cidade;
        $assistida->email      = $req->email;

        $assistida->save();
        $assistidas = Assistida::orderBy('nome', 'asc')->simplePaginate(20);

    return back()->with('success', 'Atualização realizada!'); 
        
    }
    public function destroy($id){


        DB::table('servicos')->where('assistida_id', $id)
        ->update(['assistida_id' => null]);
        Assistida::destroy('id', $id);


    return redirect()->route('assistida.index')->with('success', 'Assistida deletada'); ;
    }
}
