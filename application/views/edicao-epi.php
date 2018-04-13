
<div class='container'>
    <h2>Cadastro de EPI's</h2>
    <form method="post" action="<?= base_url('epi/editar')?>">
        <input type="hidden" class="form-control" id="id" name="id" value="<?= $epi['id']; ?>">
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" class="form-control" id="descricao" name="descricao" value="<?= $epi['descricao'];?>" required>
        </div>
        <div class="form-group">
            <label for="ca">C.A (Certificação):</label>
            <input type="text" class="form-control" id="ca" name="ca" value="<?= $epi['ca'];?>" required>
        </div>
        <div class="form-group">
            <label for="vencimento">Data vencimento:</label>
            <input type="text" class="form-control" id="vencimento" name="vencimento" value="<?= $epi['vencimento'];?>" required>
        </div>
		<div class="form-group">
			<label for="status">Status:</label>
			<select name="status" class="selectpicker">
				<option value="1" <?php if($epi['status'] == 1) echo "selected"; ?>>Ativo</option>
				<option value="0" <?php if($epi['status'] == 0) echo "selected"; ?>>Inativo</option>
			</select>
		</div>
		<button type="submit" class="btn btn-success">Alterar</button>
        <button type="reset" class="btn btn-default">Resetar</button>
    </form>
</div>

<script>
	$(document).ready(function(){
		$('#vencimento').mask('00/00/0000');
	});
	
</script>