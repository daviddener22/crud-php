<?php
session_start();
include_once 'includes/header.inc.php';
include_once 'includes/menu.inc.php';

?>

<div class="row container">
	<div class="col s12">
		<h5 class="light">Edição de Registros</h5><hr>
	</div>
</div>


	<?php

		include_once 'banco_de_dados/conexao.php';
		$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
		$_SESSION['id'] = $id;
		$querySelect = $link->query("select * from clientes where id='$id'");

		while($registros = $querySelect->fetch_assoc()):
			$nome = $registros['nome'];
			$email = $registros['email'];
			$telefone = $registros['telefone'];
			$cpf = $registros['cpf'];
		endwhile;
	?>

	<div class="row container">
				<p>&nbsp;</p>
					<form action="banco_de_dados/update.php" method="post" class="col s12">
						<fieldset class="formulario" style="padding: 15px">
							<h5 class="light center"><b>Alteração dos Dados</b></h5>

							<!-- Campo Nome -->
							<div class="input-field col s12">
							<input type="text" name="nome" id="nome" value="<?php echo $nome ?>" maxlength="40" required autofocus">
							<label for="nome">Nome do Cliente</label>
							</div>

							<!-- Campo e-mail -->
							<div class="input-field col s12">
							<input type="email" name="email" id="email" value="<?php echo $email ?>" maxlength="50" required>
							<label for="email">E-mail do Cliente</label>
							</div>

							<!-- Campo telefone -->
							<div class="input-field col s12">
							<input type="tel" name="telefone" id="telefone" value="<?php echo $telefone ?>" maxlength="11" placeholder="Somente os números" required>
							<label for="telefone">Telefone do Cliente</label>
							</div>

							<!-- Campo cpf -->
							<div class="input-field col s12">
							<input type="text" name="cpf" id="cpf" value="<?php echo $cpf ?>" maxlength="11" placeholder="Somente os números" required>
							<label for="email">CPF do Cliente</label>
							</div>

							<div class="input-field col s12">
								<input type="submit" value="alterar" class="btn blue">
								<a href="consultas.php" class="btn red">cancelar</a>
							</div>

						</fieldset>
					</form>
				</div>


<?php include_once 'includes/footer.inc.php'?>