
<div class='container'>
    <h2><?= $funcionario['nome']?></h2>
    <table class="table table-striped" id="tabela">
        <thead>
            <tr>
                <th>EPI</th>
                <th style="text-align: center">C.A (Certificação)</th>
                <th style="text-align: center">Vencimento</th>
				<th style="text-align: center">Data de entrega</th>
                <th style="text-align: center">Devolver</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($historicos as $historico): ?>
                <tr>
                    <td style="vertical-align: middle"><?= $historico['descricao'] ?></td>
                    <td style="vertical-align: middle; text-align: center"><?= $historico['ca'] ?></td>
                    <td style="vertical-align: middle; text-align: center"><?= implode("/", array_reverse(explode("-", $historico['vencimento']))) ?></td>
					<?php $datetime = explode(' ', $historico['entrega']);
						$data = implode("/", array_reverse(explode("-", $datetime[0])));
					?>
					<td style="vertical-align: middle; text-align: center">
						<?php $datetime = explode(' ', $historico['entrega']);
							$data = implode("/", array_reverse(explode("-", $datetime[0])));
							echo $datetime[1]." ".$data ?>
					</td>
                    <td style="vertical-align: middle; text-align: center"><a class="btn-form" href="<?= base_url('historico/devolver/').$historico['id']?>"><img src="<?= base_url('imagens/send-func.png')?>" width="40" height="40"></a></td>
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