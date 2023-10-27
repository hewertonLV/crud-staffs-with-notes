<div class="modal fade" id="addUnidade" tabindex="-1"
     aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Unidade</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addUnidadeForm" method="POST" action="{{route('UnidadeStore')}}">
                    <div class="row">
                        <input type="hidden" name="id" id="id_pro" value="">
                        <div class="col-md-12 col-sm-12">
                            <x-input name="nome_fantasia" id="addnome" label="Nome Fantasia" required="true"
                                     type="text" value=""/>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <x-input name="razao_social" id="addcnpj" label="Razão Social" required="true"
                                     type="text" value=""/>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <x-input name="cnpj" id="addunidade_id" label="CNPJ" required="true"
                                     type="text" value=""/>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" form="addUnidadeForm" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var $inputCpf = $("#addcnpj");
        $inputCpf.mask('00.000.000/0000-00', {reverse: true});
    });
</script>
