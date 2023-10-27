<div class="modal fade" id="addColaborador" tabindex="-1"
     aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Colaborador</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addColaboradorForm" method="POST" action="{{route('ColaboradorStore')}}">
                    <div class="row">
                        <input type="hidden" name="id" id="id_pro" value="">
                        <div class="col-md-12 col-sm-12">
                            <x-input name="nome" id="addnome" label="Nome" required="true"
                                     type="text" value=""/>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <x-input class="form-control" name="cpf" id="addcpf" label="CPF" required="true"
                                     type="text" value=""/>
                        </div>
                        <div class="col-md-6 col-sm-6">
                        <x-select id="addunidade_id" name="unidade_id" label="Unidade"  :dataset="$unidadesSelect"
                                  required="true"/>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <x-input name="email" id="addemail" label="email"
                                     type="email" value=""/>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" form="addColaboradorForm" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var $inputCpf = $("#addcpf");
        $inputCpf.mask('000.000.000-00', {reverse: true});
    });
</script>
