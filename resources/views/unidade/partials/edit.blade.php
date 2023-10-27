<div class="modal fade" id="editUnidade" tabindex="-1"
     aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Unidade</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editUnidadeForm" method="POST" action="{{route('UnidadeUpdate')}}">
                    @method('PUT')
                    <div class="row">
                        <input type="hidden" name="id" id="editId" value="">
                        <div class="col-md-12 col-sm-12">
                            <x-input name="nome_fantasia" id="editNome" label="Nome Fantasia" required="true"
                                     type="text" value=""/>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <x-input name="razao_social" id="editRazao" label="Razão Social" required="true"
                                     type="text" value=""/>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <x-input name="cnpj" id="editCnpj" label="CNPJ" required="true"
                                     type="text" value=""/>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" form="editUnidadeForm" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var $editCnpj = $("#editCnpj");
        $editCnpj.mask('00.000.000/0000-00', {reverse: true});
        let editId = $('#editId');
        let editNome = $('#editNome');
        let editRazao = $('#editRazao');
        let editCnpj = $('#editCnpj');

        $("button[id^='unidadeEdit']").click(function () {
            let getEvent = $(this);
            console.log(getEvent.data('id'));
            editId.val(getEvent.data('id'));
            editNome.val(getEvent.data('nome_fantasia'));
            editRazao.val(getEvent.data('razao_social'));
            editCnpj.val(getEvent.data('cnpj'));
        });
    });
</script>
