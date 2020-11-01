<?php

    // usando o if ternário para retornar o erro na url
    $erro_cpf = isset($_GET["erro_cpf"]) ? $_GET["erro_cpf"] : 0;
    $cpf_exist = isset($_GET["cpf_exist"]) ? $_GET["cpf_exist"] : 0;
?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Painel de cadastro CPF com PHP e PDO</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
	
	</head>

	<body>

        <section id="sign">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-5 col-12">

						<form id="formCadastro" method="POST" action="register.php">
                            <p class="desc text-center mb-5">Preencha o formulário</p>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" name="nome" placeholder="Nome Completo" id="nome" pattern="[a-zA-Záãâéêíîóôõú\s]+$" required>
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                                        </div>
                                        <input type="tel" class="form-control" maxlength="11" name="phone" placeholder="11999999999" id="phone" pattern="[0-9]+$" required>
                                    </div>
                                </div>
                            </div><!-- form-row -->

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="E-mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        </div>
                                        <input type="text" class="form-control" maxlength="11" name="cpf" placeholder="CPF: 12345678911" id="cpf" pattern="\d{3}\d{3}\d{3}\d{2}" required>
                                    </div>

                                    <?php

                                        // aqui verifica se o cpf é inválido
                                        if($erro_cpf == 1) {
                                            echo '<span style="color: red; font-size: 12px; text-align: center; display: block;">CPF inválido, digite um CPF válido!</span>';
                                        } 

                                        // aqui verifica se o cpf ja existe no banco
                                        if($cpf_exist == 1) {
                                            echo '<span style="color: red; font-size: 12px; text-align: center; display: block;">Número de CPF já existe</span>';
                                        }
                                    ?>
                                </div>
                            
                                <div class="form-group col-md-6">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                                        </div>
                                        <input type="password" class="form-control" name="pass" id="pass" placeholder="Senha" required>
                                    </div>
                                </div>
                            </div><!-- form-row -->

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-3" id="btnCadastrar">Cadastrar</button>
                            </div>

                        </form>
                        <div class="mt-3 mb-5">
                            <a class="links" href="index.php">Já tenho conta</a>
                        </div>

		    		</div><!-- /col-md-5 -->
		    	</div><!-- /row -->
			</div><!-- /container -->
        </section><!-- /sing-up -->
	
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

	</body>
</html>