<?php

	session_start();
	include_once 'conexao.php';

	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
	$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
	$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_NUMBER_INT);
	$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_NUMBER_INT);

	$querySelect = $link->query("select email from clientes");
	$array_emails = [];

	$querySelect = $link->query("select cpf from clientes");
	$array_cpfs = [];


	//Verificando e-mails existentes
	while($emails = $querySelect->fetch_assoc()):
		$emails_existentes = $emails['email'];
		array_push($array_emails,$emails_existentes);
	endwhile;


	if(in_array($email, $array_emails)):
		$_SESSION['msg'] = "<p class='center red-text'>".'Já existe um cliente cadastrador com esse e-mail'."</p>";
		header("Location:../");

	else:
		$queryInsert = $link->query("insert into clientes values(default, '$nome','$email','$telefone','$cpf')");
		$affected_rows = mysqli_affected_rows($link);

		if($affected_rows > 0):

			$_SESSION['msg'] = "<p class='center green-text'>".'Cadastro efetuado com sucesso!'."<br>";
			header("Location:../");
		endif;

	endif;

	//Verificando CPFs existentes
	while($cpfs = $querySelect->fetch_assoc()):
		$cpfs_existentes = $cpfs['cpf'];
		array_push($array_cpfs, $cpfs_existentes);
	endwhile;



	if(in_array($cpf, $array_cpfs)):
		$_SESSION['msg'] = "<p class= 'center red-text'>". 'Já existe um cliente cadastrado com esse CPF'."</p>";
		header("Location:../");

	else:
		$queryInsert= $link->query("insert into clientes values(default, '$nome', '$email', $telefone', '$cpf')");
		$affected_rows = mysqli_affected_rows($link);

		if($affected_rows > 0):

			$_SESSION['msg'] = "<p class='center green-text'>". 'Cadastro efetuado com sucesso!'."<br>";
			header("Location:../");

		endif;

	endif;

?>