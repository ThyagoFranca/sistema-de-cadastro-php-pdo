<?php
	// chama o script valida-cpf.php
	require_once("valida-cpf.php");

	if(isset($_POST["cpf"]) && !empty($_POST["cpf"])) {
		
		$cpf = filter_input(INPUT_POST, "cpf", FILTER_SANITIZE_STRING);

		//verifica se o cpf é valido
		if(validaCPF($cpf)) {
			echo "CPF válido";
		}else {
			header("Location: signup.php?erro_cpf=1"); 
			exit();
		}

		// inicia a variavel como false
		$cpf_exist = false;

		$sql = $conexao->prepare(" SELECT cpf FROM usuarios WHERE cpf = ? ");
		$sql->execute([$cpf]);

		if($sql->rowCount()) {
			$dados_user = $sql->fetchAll(PDO::FETCH_ASSOC)[0];

			// verifica se existe o mesmo cpf no banco
			if(isset($dados_user["cpf"])) {
				$cpf_exist = true; 
			}

		}else {
			echo "Erro ao tentar localizar o número de CPF"; 
		}

		// se o cpf existe mostre o erro na url
		if($cpf_exist) {
			$retorno = "";

			if($cpf_exist) {
				$retorno.= "cpf_exist=1";
			}

			header('Location: signup.php?' . $retorno); 
			exit();
		}


		$sql = $conexao->prepare(" INSERT INTO tabela ( cpf ) VALUES( ? ) ");

		if($sql->execute([ $_POST["cpf"] ])) {
		 	header("Location: index.php?sucess=1");
		}
	}else {
		header("Location: signup.php?erro_cad=1");
	}
