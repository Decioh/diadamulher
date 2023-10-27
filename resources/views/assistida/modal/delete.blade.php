
<div class="modal fade" id="ModalDelete" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Deletando assistida {{$assistida->nome }}</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div>
            <p>
               Se essa assistida for deletada, seus atendimentos e serviços também serão deletados!<br><b>Essa ação não pode ser desfeita!</b><br>
               Quantidade de servicos: {{$servicos->count()}}.
            </p>
        </div>
        <div class="modal-body">
            <form action="{{ route('assistida.destroy', $assistida->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <p>Você tem certeza que quer deletar a assistida <br> <b>{{$assistida->nome}}</b><br></p>
                <button type="submit" class="btn btn-danger delete-btn">Deletar assistida</button>
            </form>
        </div>
      </div>
    </div>
  </div>

