
<div class='container'>
    <h2>Cadastro de EPI's</h2>
    <form method="post" action="<?= base_url('epi/cadastrar')?>">
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" class="form-control" id="descricao" name="descricao" required>
        </div>
        <div class="form-group">
            <label for="ca">C.A (Certificação):</label>
            <input type="text" class="form-control" id="ca" name="ca" required>
        </div>
        <div class="form-group">
            <label for="vencimento">Data vencimento:</label>
            <input type="text" class="form-control" id="vencimento" name="vencimento" required>
        </div>
		<button type="submit" class="btn btn-success">Cadastrar</button>
        <button type="reset" class="btn btn-default">Resetar</button>
    </form>
</div>

<script>
	$(document).ready(function(){
		$('#vencimento').mask('00/00/0000');
	});
	
</script>