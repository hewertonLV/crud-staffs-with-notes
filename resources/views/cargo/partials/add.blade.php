<div class="modal fade" id="addCargo" tabindex="-1"
     aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Cargo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addCargoForm" method="POST" action="{{route('CargoStore')}}">
                    <div class="row">
                        <input type="hidden" name="id" id="id_pro" value="">
                        <div class="col-md-12 col-sm-12">
                            <x-input name="cargo" id="addnome" label="Nome" required="true"
                                     type="text" value=""/>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" form="addCargoForm" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>

