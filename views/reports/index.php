<?php
/** @var array $data */
?>

<h1>Relatório de Contas</h1>

<?php foreach ($data as $date => $bills): ?>
	<h2><?= $date ?></h2>

	<table class="table table-striped table-bordered">
		<thead>
			<tr>
				<td>Data</td>
				<td>Description</td>
				<td>Categoria</td>
				<td>Tipo</td>
				<td>Valor</td>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($bills as $bill): ?>
				<tr>
					<td><?= $bill->date ?></td>
					<td><?= $bill->description ?></td>
					<td><?= $bill->category->name ?></td>
					<td><?= $bill->getTypeText() ?></td>
					<td><?= $bill->amount ?></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
<?php endforeach; ?>

<h2>Total a Pagar: </h2>
<h2>Total a Receber: </h2>