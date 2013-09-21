<div class="container">
	<table class="table">
		<?php if( isset( $clientes ) && $clientes != false ): ?>

		<thead>
			<th>Usuario</th>
			<th>Primer Nombre</th>
			<th>Segundo Nombre</th>
			<th>Dirección</th>
			<th>Ciudad</th>
			<th>Correo Electrónico</th>
		</thead>
		<tbody>

		<?php foreach ($clientes as $campo): ?>
				
			<tr>
				<td><?php echo $campo['Username'] ?></td>
				<td><?php echo $campo['FirstName'] ?></td>
				<td><?php echo $campo['LastName'] ?></td>
				<td><?php echo $campo['Address'] ?></td>
				<td><?php echo $campo['City'] ?></td>
				<td><?php echo $campo['Email'] ?></td>
			</tr>

		<?php endforeach ?>

		</tbody>

		<?php endif ?>
	</table>
</div>