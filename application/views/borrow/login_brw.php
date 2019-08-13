
<!--DOCTYPE html-->
<html>
<head>
<body>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0"/><!-- META DE RESPONSIVIDADE-->
	<title>Tutorial CodeIgniter</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
	<style>
		main {
			flex: 1 0 auto;
			margin-top: 5%;
		}
		body {
		  background: rgb(38,50,56);
		  background: linear-gradient(90deg, rgba(38,50,56,1) 0%, rgba(55,71,79) 35%, rgba(120,144,156) 100%);
		  display: flex;
		  min-height: 100vh;
		  flex-direction: column; 
		}
		.input-field label {
			color: #263238;
		}
		.input-field input[type=text]:focus:not([readonly]) + label, textarea.materialize-textarea:focus:not([readonly]) + label, .input-field input[type=password]:focus:not([readonly]) + label  {
	     color: #263238;
	   }
			/* label underline focus color */
	   .input-field input[type=text]:focus:not([readonly]), .input-field input[type=password]:focus:not([readonly]) {
	     border-bottom: 1px solid #263238;
	     box-shadow: 0 1px 0 0 #263238;
	   }
	   /* icon prefix focus color */
	   .input-field .prefix.active {
	     color: #263238;
	   }
	   #login {
	   	width: 400px;
       	height: 400px;
       	color: #263238;
       	background: #fff;
       	padding: 15px;
       	box-sizing: border-box;
      	}
	   .material-icons.prefix {
	   	color: #263238;
	   }
	   button[type=submit] {
	   	width: 100%;
	   }
	   h4 {
	   	padding-bottom: 5px;
	   }
	</style>
	<main>
		<div class="container z-depth-4" id="login">
			<h4 class="center">Login</h4>

				<?= form_open('usuarios_brw/autenticar');?>
				<div class="row">
					<div class="input-field col s12">
						<i class="material-icons prefix">account_circle</i>
							<input type="text" name="username" onblur="textLower(this)" autocomplete="off" placeholder="Digite seu Usuário" minlength="3">
						<label for="username">Usuário</label>
					</div>
				</div>
					<div class="row">
						<div class="input-field col s10">
							<i class="material-icons prefix">lock</i>
								<input type="password" name="senha" id="senha" autocomplete="off" placeholder="Digite sua Senha" minlength="6">
							<label for="senha">Senha</label>
						</div>
						<div class= " input-field col s2">
							<button type="button" onclick="showPwd()" class="btn-flat waves-effect waves-light"><i class="large material-icons" onclick="changeIcon(this)">visibility_off</i></button>
						</div>
					</div>
				<div class="center col s12">
					<button type="submit" class="btn waves-effect waves-light red darken-4">Logar</button>
				</div>
				<?= form_close();?>
				<div class="center">
					<a href="<?= base_url('usuarios_brw/registrar')?>" style="color: #263238;">Registrar-se</a>
				</div>
		</div>
		<div>
<?php if ($this->session->flashdata("Sucesso")) { ?>
	<script>
		window.onload = function(){
		    M.toast({html: '<?=$this->session->flashdata("Sucesso")?>', classes: 'red darken-4'})
		};
	</script>
<?php } 
	if ($this->session->flashdata("Erro")) { ?>
		<script>
			window.onload = function(){
		    	M.toast({html: '<?=$this->session->flashdata("Erro")?>', classes: 'red darken-4'})
		  	};
		</script>
<?php } ?>
		</div>
	</main>
