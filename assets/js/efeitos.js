$(document).ready( function() {
  	// alert bootstrap
    window.setTimeout(function() {
        $(".alert").fadeTo(10000, 500).slideUp(500, function() {
            $(this).remove(); 
        });
    });

    // para excluir membros da equipe em tempo real
  	$(".btn-danger").click(function() {
    	var id = $(this).attr('id'); // é o id excluir do button 
    	var el = $(this).parent().parent(); // para voltar 2 elementos antes do button que e td e tr 
    	$.ajax({
    		method: "POST",
    		data:{id: id },
    		url:'deletar.php' // arquivo externo
			}).done(function() { // faça isso
      		el.fadeOut(function() { // para dar um efeito de desaparecer
       			el.remove(); // para remover o elemento 
    		});
		})
    });


    // verifica se os campos de email e senha foram preenchidos para fazer login no index
    $("#btnLogin").click( function() { 
        var campoVazio = false; // para não enviar o form enquanto o os campos não forem preenchidos
        var campoEmail = $("#formLogin #email").val(); // formLogin é o id no form, #email é o id no input email 
        var campoPass = $("#formLogin #pass").val();

        if(campoEmail == "" ) {
            $(".campo_email").html('<span style="color: red; font-size: 12px;">insira o email de cadastro</span>');
            $("#email, .input-group-text").css("border-color", "#A94442");
                campoVazio = true;
        }else {
            $("#email, .input-group-text").css("border-color", "#28a745");
        }

        if(campoPass == "" ) {
            $(".campo_pass").html('<span style="color: red; font-size: 12px;">insira uma senha</span>');
            $("#pass, .input-group-text").css("border-color", "#A94442");
                campoVazio = true;
        }else {
            $("#pass, .input-group-text").css("border-color", "#28a745");
        }

        if(campoVazio) {
            return false;
        }
    });


    // verifica se os campos de nome, email e pass foram preenchidos para cadastrar os usuarios
    $("#btnCadastrar").click( function() { 
        var campoVazio = false; // para não enviar o form enquanto o os campos não forem preenchidos
        var campoNome = $("#formCadastro #cadNome").val(); 
        var campoEmail = $("#formCadastro #cadEmail").val();
        var campopass = $("#formCadastro #cadpass").val();
        var confpass = $("#formCadastro #confpass").val();

        if(campoNome == "" ) { // id no input usuario
            $(".campo_nome").html('<span style="color: red; font-size: 12px;">insira um nome</span>');
            $("#cadNome").css("border-color", "#A94442");
            campoVazio = true;
        }else {
            $("#cadNome").css("border-color", "#28a745");
        }

        if(campoEmail == "" ) { // id no input usuario
            $(".campo_email").html('<span style="color: red; font-size: 12px;">insira um email válido</span>');
            $("#cadEmail").css("border-color", "#A94442");
            campoVazio = true;
        }else {
            $("#cadEmail").css("border-color", "#28a745");
        }

        if(campopass == "" ) {
            $(".campo_pass").html('<span style="color: red; font-size: 12px;">insira uma pass</span>');
            $("#cadpass").css("border-color", "#A94442");
            campoVazio = true;
        }else {
            $("#cadpass").css("border-color", "#28a745");
        }

        if(confpass == "" ) {
            $(".conf_pass").html('<span style="color: red; font-size: 12px;">insira uma pass</span>');
            $("#confpass").css("border-color", "#A94442");
            campoVazio = true;
        }else {
            $("#confpass").css("border-color", "#28a745");
        }

        if(campoVazio) return false;
        
    });
});


      // qdo clicar no campo esqueceu a pass
    //   $("#esquecipass").on("click", function() {
      // $("#formLogin").addClass("esqueceu"); // faz referencia

    //       $("#formLogin .desc").html("Digite seu email de cadastro para recuperar sua pass");
    //       $("#formLogin #btnLogin").html("Enviar"); // muda o nome do btn de logar para enviar
    //       $("#formLogin .pass, .campo_pass").hide(); // qdo clicar no btn esqueci pass ocutar o input pass 
    //       $(this).hide(); // esconde o link esqueceu a pass?
    //   });



