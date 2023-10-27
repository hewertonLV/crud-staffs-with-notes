<div class="modal fade" id="editColaborador" tabindex="-1"
     aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Colaborador</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editColaboradorForm" method="POST" action="{{route('ColaboradorUpdate')}}">
                    @method('PUT')
                    <div class="row">
                        <input type="hidden" name="id" id="editId" value="">
                        <div class="col-md-12 col-sm-12">
                            <x-input name="nome" id="editNome" label="Nome" required="true"
                                     type="text" value=""/>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <x-input name="cpf" id="editCpf" label="CPF" required="true"
                                     type="text" value=""/>
                        </div>
                        <div class="col-md-6 col-sm-6">
                                <x-select id="editUnidade_id" name="unidade_id" label="Unidade"  :dataset="$unidadesSelect"
                                          required="true"/>
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <x-input name="email" id="editEmail" label="email"
                                     type="email" value=""/>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" form="editColaboradorForm" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        var $editCpf = $("#editCpf");
        $editCpf.mask('000.000.000-00', {reverse: true});
    });
    $(document).ready(function () {
        let editId = $('#editId');
        let editNome = $('#editNome');
        let editCpf = $('#editCpf');
        let editUnidade_id = $('#editUnidade_id');
        let editEmail = $('#editEmail');

        $("button[id^='colaboratorEdit']").click(function () {
            let getEvent = $(this);
            editId.val(getEvent.data('id'));
            editNome.val(getEvent.data('nome'));
            editCpf.val(getEvent.data('cpf'));
            editUnidade_id.val(getEvent.data('unidade_id'));
            editEmail.val(getEvent.data('email'));
        });
    });
</script>
