<div class='container'>
    <h2>Cadastro de Funcionários</h2>
    <form method="post" action="<?= base_url('funcionario/cadastrar')?>">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" name="nome" id="nome" maxlength="100" required>
        </div>
        <div class="form-group">
            <label for="admissao">Data de admissão:</label>
            <input type="text" class="form-control" name="admissao" id="admissao" required>
        </div>
        <div class="form-group">
            <label for="funcao">Função:</label>
            <input type="text" class="form-control" name="funcao" id="funcao" maxlength="100" required>
        </div>
		<button type="submit" class="btn btn-success">Cadastrar</button>
        <button type="reset" class="btn btn-default">Resetar</button>
    </form>
    
</div>

<script>
	$(document).ready(function(){
		$('#admissao').mask('00/00/0000');
	});
	
</script>