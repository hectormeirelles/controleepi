<div class='container'>
    <h2><?= $epi['descricao']." - ".$epi['ca']?></h2>
    <table class="table table-striped" id="tabela">
        <thead>
            <tr>
                <th>Funcionário</th>
                <th style="text-align: center">Entrega</th>
                <th style="text-align: center">Devolução</th>
                <th style="text-align: center">Devolver</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($historicos as $historico): ?>
            <tr>
                <td style="vertical-align: middle"><?= $historico['nome'] ?></td>
                <td style="vertical-align: middle; text-align: center">
					<?php $datetime = explode(' ', $historico['entrega']);
						$data = implode("/", array_reverse(explode("-", $datetime[0])));
						echo $datetime[1]." ".$data; ?>
				</td>
                <td style="vertical-align: middle; text-align: center">
					<?php if(isset($historico['devolucao'])): 
						$datetime = explode(' ', $historico['devolucao']);
						$data = implode("/", array_reverse(explode("-", $datetime[0])));
						echo $datetime[1]." ".$data;
					endif;?>
				</td>
				<?php if(!isset($historico['devolucao'])): ?>
					<td style="vertical-align: middle; text-align: center"><a class="btn-form" href="<?= base_url('historico/devolver/').$historico['id']?>"><img src="<?= base_url('imagens/epis.png')?>" width="40" height="40"></a></td>
				<?php else: ?>
					<td></td>
				<?php endif; ?>
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