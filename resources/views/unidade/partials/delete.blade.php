<div class="modal fade" id="excluirModal" tabindex="-1" aria-labelledby="excluirModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="excluirModalLabel">Confirmação de Exclusão</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Você tem certeza de que deseja excluir o Unidade?</p>
            </div>
            <form action="{{ route('UnidadeDelete') }}" id="deleteUnidade" method="POST">
                @method('DELETE')
                <input type="hidden" name="id" id="excluirItemId">

            </form>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" form="deleteUnidade" class="btn btn-danger">Confirmar Exclusão</button>

            </div>
        </div>
    </div>
</div>
<script>

    $(document).ready(function () {
        let id = $('#excluirItemId');

        $("button[id^='delete']").click(function () {
            let getEvent = $(this);
            id.val(getEvent.data('id'));
        });
    });
</script>
