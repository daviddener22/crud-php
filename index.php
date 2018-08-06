<?php session_start() ?>

		<?php include_once 'includes/header.inc.php' ?>

			<?php include_once 'includes/menu.inc.php' ?>

			<div class="row container">
				<p>&nbsp;</p>
					<form action="banco_de_dados/create.php" method="post" class="col s12">
						<fieldset class="formulario" style="padding: 15px">
							<h5 class="light center"><b>Cadastro de Clientes</b></h5>


							<?php

								if(isset($_SESSION['msg'])):
									echo $_SESSION['msg'];
									session_unset();
								endif;

								if(isset($_SESSION['msg_cpf'])):
									echo $_SESSION['msg_cpf'];
									session_unset();
								endif;

							?>

							<!-- Campo Nome -->
							<div class="input-field col s12">
							<input type="text" name="nome" id="nome" maxlength="40" required autofocus">
							<label for="nome">Nome do Cliente</label>
							</div>

							<!-- Campo e-mail -->
							<div class="input-field col s12">
							<input type="email" name="email" id="email" maxlength="50" required>
							<label for="email">E-mail do Cliente</label>
							</div>

							<!-- Campo telefone -->
							<div class="input-field col s12">
							<input type="tel" name="telefone" id="telefone" maxlength="12" placeholder="Somente os números" required>
							<label for="telefone">Telefone do Cliente</label>
							</div>

							<!-- Campo cpf -->
							<div class="input-field col s12">
							<input type="text" name="cpf" id="cpf" maxlength="11" placeholder="Somente os números" required>
							<label for="email">CPF do Cliente</label>
							</div>

							<div class="input-field col s12">
								<input type="submit" value="Cadastrar" class="btn blue">
								<input type="reset" value="Limpar" class="btn red">
							</div>

						</fieldset>
					</form>
				</div>

		<?php include_once 'includes/footer.inc.php' ?>