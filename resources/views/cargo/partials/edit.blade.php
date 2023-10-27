<div class="modal fade" id="editCargo" tabindex="-1"
     aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Cargo</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editCargoForm" method="POST" action="{{route('CargoUpdate')}}">
                    @method('PUT')
                    <div class="row">
                        <input type="hidden" name="id" id="editId" value="">
                        <div class="col-md-12 col-sm-12">
                            <x-input name="cargo" id="editCargoName" label="Nome" required="true"
                                     type="text" value=""/>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                <button type="submit" form="editCargoForm" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        let editId = $('#editId');
        let editCargoName = $('#editCargoName');

        $("button[id^='cargoEdit']").click(function () {
            let getEvent = $(this);
            editId.val(getEvent.data('id'));
            editCargoName.val(getEvent.data('cargo'));
            console.log(getEvent.data('cargo'));
        });
    });
</script>
