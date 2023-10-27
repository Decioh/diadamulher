
<div class="modal fade" id="ModalEdit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Atualizando dados da assistida {{$assistida->nome }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="{{ route('assistida.update',$assistida -> id) }}" method="POST">
                @csrf
            <div class="cadastro"><br>
                <div class="cadastron">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" value="{{$assistida->nome}}" required>
                </div><br>
                <div class="cadastrotel"> 
                    <label for="tel">telefone:</label>
                    <input type="text" id="tel" name="tel" maxlength="11" value="{{$assistida->tel}}">
                </div> <br>
                <div class="cadastroemail"> 
                    <label for="email">e-mail:</label>
                    <input type="text" id="email" name="email"value="{{$assistida->email}}">
                </div> <br>
                <div class="cadastrocidade"> 
                    <select name="cidade" id="cidade" >
                        @foreach ($cidades as $cidade)
                            @if ( $cidade->RA == $cidades[$assistida->cidades_id-1]->RA)
                                <option value="{{ $cidade->id }}" selected> {{ $cidade->RA }}</option>
                            @else
                                <option value="{{ $cidade->id }}"> {{ $cidade->RA }}</option>
                            @endif
                        @endforeach
                    </select>
                </div> <br>
                <div class="form-group">
                    <p>
                        <input type="submit" class="btn btn-success" value="Confirmar alterações" >
                    </p>
                </div>
            </div>
            </form>
        </div>
      </div>
    </div>
  </div>

