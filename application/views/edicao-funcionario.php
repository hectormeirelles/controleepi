<div class='container'>
    <h2>Cadastro de Funcionários</h2>
    <form method="post" action="<?= base_url('funcionario/editar')?>">
        <input type="hidden" name="id" id="id" value="<?= $funcionario['id'];?>">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" name="nome" id="nome" maxlength="100" value="<?= $funcionario['nome'];?>" required>
        </div>
        <div class="form-group">
            <label for="admissao">Data de admissão:</label>
            <input type="text" class="form-control" name="admissao" id="admissao" value="<?= $funcionario['admissao'];?>" required>
        </div>
        <div class="form-group">
            <label for="funcao">Função:</label>
            <input type="text" class="form-control" name="funcao" id="funcao" maxlength="100" value="<?= $funcionario['funcao'];?>" required>
        </div>
        <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" class="selectpicker">
                    <option value="1" <?php if($funcionario['status'] == 1) echo "selected";?>>Ativo</option>
                    <option value="0" <?php if($funcionario['status'] == 0) echo "selected";?>>Inativo</option>
                </select>
		</div>
		<button type="submit" class="btn btn-success">Alterar</button>
        <button type="reset" class="btn btn-default">Resetar</button>
    </form>
    
</div>

<script>
	$(document).ready(function(){
		$('#admissao').mask('00/00/0000');
	});
	
</script>