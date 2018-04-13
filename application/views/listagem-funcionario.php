<div class='container'>
    <h2>Listagem de funcionários</h2>
    <table class="table table-striped" id="tabela">
        <thead>
            <tr>
                <th>Nome</th>
                <th style="text-align: center">Admissão</th>
                <th style="text-align: center">Função</th>
                <th style="text-align: center">Alterar</th>
                <th style="text-align: center">EPI's</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($funcionarios as $funcionario): ?>
                <tr>
                    <td style="vertical-align: middle"><?= $funcionario['nome'] ?></td>
                    <td style="vertical-align: middle; text-align: center"><?= implode("/", array_reverse(explode("-", $funcionario['admissao']))) ?></td>
                    <td style="vertical-align: middle; text-align: center"><?= $funcionario['funcao'] ?></td>
                    <td style="vertical-align: middle; text-align: center"><a class="btn-form" href="<?= base_url('funcionario/edicao/').$funcionario['id']?>"><img src="<?= base_url('imagens/edit-func.png')?>" width="40" height="40"></a></td>
                    <td style="vertical-align: middle; text-align: center"><a class="btn-form" href="<?= base_url('historico/funcionario/').$funcionario['id']?>"><img src="<?= base_url('imagens/epis.png')?>" width="40" height="40"></a></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
	$(document).ready(function() {
		$('#tabela').DataTable({
			"ordering": false,
			"language": {
				"sEmptyTable": "Nenhum registro encontrado",
				"sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
				"sInfoEmpty": "Mostrando 0 até 0 de 0 registros.",
				"sInfoFiltered": "(Filtrados de _MAX_ registros)",
				"sInfoPostFix": "",
				"sInfoThousands": ".",
				"sLengthMenu": "_MENU_ resultados por página.",
				"sLoadingRecords": "Carregando...",
				"sProcessing": "Processando...",
				"sZeroRecords": "Nenhum registro encontrado",
				"sSearch": "Pesquisa",
				"decimal": ".",
				"thousands": ",",
				"oPaginate": {
					"sNext": "Próximo",
					"sPrevious": "Anterior",
					"sFirst": "Primeiro",
					"sLast": "Último"
				}
			}
		});
	});
</script>