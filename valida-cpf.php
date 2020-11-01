<?php
	function validaCPF($num_cpf) {
		// Verifica se um número foi informado
		if(empty($num_cpf) && !is_numeric($num_cpf)) {
			return false;
		}

	    $num_cpf = preg_replace("/[^0-9]/is", "", $num_cpf);

	    // Verifica se foi informado todos os digitos corretamente
	    if (strlen($num_cpf) !== 11) {
        	return false;
    	}

	    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
	    if(preg_match('/([0-9])\1{10}/', $num_cpf)) {
	        return false;
	    }

	    // Faz o calculo para validar o num_cpf
	    for($t = 9; $t < 11; $t++) {
	        for ($d = 0, $c = 0; $c < $t; $c++) {
	            $d += $num_cpf[$c] * (($t + 1) - $c);
	        }
	        $d = ((10 * $d) % 11) % 10;
	        if ($num_cpf[$c] != $d) {
	            return false;
	        }
	    }

	    return true;
	}
