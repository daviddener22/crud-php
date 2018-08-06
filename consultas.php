<?php include_once 'includes/header.inc.php' ?>
<?php include_once 'includes/menu.inc.php' ?>


<div class="row container">

	<div class="col s12">
		
		<h5 class="light">Consultas</h5><hr>

		<table class="striped">
			<thead>
				<tr>
					<th>Nome</th>
					<th>E-mail</th>
					<th>Telefone</th>
					<th>CPF</th>
				</tr>
			</thead>
			<tbody>
				
				<?php

					include_once 'banco_de_dados/read.php'

				?>

			</tbody>
		</table>
	</div>

</div>


<div class="col s12" >

	<div class="light center">

			<?php echo "<a href='exportar.php?id=$id' class='btn blue'><b>Exportar em csv</b></center></a>"?>

		</div>
	</div>

<?php include_once 'includes/footer.inc.php' ?>