<div class='container'>
    <h2>Listagem de EPI's disponíveis</h2>
    <table class="table table-striped" id="tabela">
        <thead>
            <tr>
                <th>Descrição</th>
                <th style="text-align: center">C.A</th>
                <th style="text-align: center">Vencimento</th>
                <th style="text-align: center">Alocação</th>
                <th style="text-align: center">Alterar</th>
                <th style="text-align: center">Histórico</th>
				<th style="text-align: center">Colaborador</th>
				<th style="text-align: center">Entregar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($epis as $epi): ?>
                <tr>
                    <td style="vertical-align: middle"><?= $epi['descricao'] ?></td>
                    <td style="vertical-align: middle; text-align: center"><?= $epi['ca'] ?></td>
                    <td style="vertical-align: middle; text-align: center"><?= implode("/", array_reverse(explode("-", $epi['vencimento']))) ?></td>
                    <td style="vertical-align: middle; text-align: center"> Estoque </td>
					<td style="vertical-align: middle; text-align: center"><a class="btn-form" href="<?= base_url('epi/edicao/').$epi['id']?>"><img src="<?= base_url('imagens/edit-epi.png')?>" width="40" height="40"></a></td>
					<td style="vertical-align: middle; text-align: center"><a class="btn-form" href="<?= base_url('historico/epi/').$epi['id']?>"><img src="<?= base_url('imagens/historic.png')?>" width="40" height="40"></a></td>
					<form method="POST" action="<?= base_url('historico/entregar')?>">
						<td style="vertical-align: middle; text-align: center">
							<input type="hidden" name="id_epi" value="<?= $epi['id'] ?>">
							<select name="id_funcionario" class="selectpicker" data-live-search="true" data-max-options="1">
								<?php foreach($funcionarios as $funcionario): ?>
									<option value="<?=$funcionario['id']?>"><?=$funcionario['nome']?></option>
								<?php endforeach; ?>
							</select>
						</td>
						<td style="vertical-align: middle; text-align: center"><button type="submit" class="btn-form"><img src="<?= base_url('imagens/send-func.png')?>" width="40" height="40"></button></td>
					</form>
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
    