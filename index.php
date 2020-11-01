<?php
    session_start();
    $erro = isset($_GET["erro"]) ? $_GET["erro"] : 0;

    //se existir uma sessao ativa manda pra dashboard
    if(isset($_SESSION["nome_user"]) && isset($_SESSION["id_user"])) {
        header("Location: dashboard.php"); 
    }
?>
<!DOCTYPE html>
    <html lang="pt-br">
    
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <title>Painel de Login</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>

    <body>

        <section id="sign">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-12 text-center py-5">
                        <img class="img-fluid logo" src="assets/images/logo-sing.png" alt="Logo da empresa">
                    </div>

                    <div class="col-md-5 col-12">
                        <form id="formLogin" method="POST" action="login.php">
                            <p class="desc text-center py-2">Acesse usando suas credenciais</p>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                                </div>
                                <div class="campo_email"></div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="senha input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-lock-open"></i></span>
                                    </div>
                                    <input type="password" class="pass form-control" name="pass" id="pass" placeholder="Password" required>
                                </div>
                                <div class="campo_pass"></div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-3" id="btnLogin">Logar</button> 
                            </div>

                            <?php
                                if ($erro == 1) {
                                    echo '<span style="color: red; text-align: center; display: block; font-size: 13px; margin-top: 10px;">Usuário e ou senha inválidos</span>';
                                }
                            ?>
                        </form>
                        
                        <div class="row mt-3 mb-5">
                            <div class="col-md-6">
                                <a class="links" id="esqueciSenha" href="forgot.php">Esqueceu a senha?</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <a class="links" href="signup.php">Criar conta</a>
                            </div>
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