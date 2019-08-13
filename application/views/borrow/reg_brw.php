<?php if (! defined('BASEPATH')) exit('No direct script acces allowed'); ?>
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
		.input-field input[type=text]:focus:not([readonly]) + label, .input-field input[type=email]:focus:not([readonly]) + label, textarea.materialize-textarea:focus:not([readonly]) + label, .input-field input[type=password]:focus:not([readonly]) + label  {
	     color: #263238;
	   }
			/* label underline focus color */
	   .input-field input[type=text]:focus:not([readonly]), .input-field input[type=email]:focus:not([readonly]), .input-field input[type=password]:focus:not([readonly]) {
	     border-bottom: 1px solid #263238;
	     box-shadow: 0 1px 0 0 #263238;
	   }
	   /* icon prefix focus color */
	   .input-field .prefix.active {
	     color: #263238;
	   }
	   #login {
	   	width: 400px;
       	height: 600px;
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
	<div class="container" id="login">
		<h4 class="center">Registrar-se</h4>
			<?= form_open('usuarios_brw/salvar'); ?>
			<div class="row">
				<div class="input-field col s12">
					<i class="material-icons prefix">account_circle</i>
						<input type="text" name="username" id="username"  onblur="textLower(this)" minlength="3" autocomplete="off" required placeholder="Digite seu Nome de Usuário">
					<label for="username">Usuário</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s12">
					<i class="material-icons prefix">email</i>
						<input type="email" required name="email" autocomplete="off" onblur="textLower(this)" placeholder="Digite seu E-mail">
					<label form="email">E-mail</label>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s10">
					<i class="material-icons prefix">lock</i>
						<input type="password" required id="senha" autocomplete="off" id="senha" minlength="6" name="senha" required placeholder="Digite sua Senha">
					<label for="senha">Senha</label>
				</div>
				<div class="input-field col s2">
					<button type="button" onclick="showPwd()" class="btn-flat waves-light waves-effect"><i class="large material-icons"  onclick="changeIcon(this)">visibility_off</i></button>
				</div>
			</div>
			<div class="row">
				<div class="input-field col s10">
					<i class="material-icons prefix">lock_outline</i>
						<input type="password" id="senha01" autocomplete="off" required id="senha01" name="senha01" minlength="6" placeholder="Confirme sua Senha">
					<label for="senha01">Confirme sua Senha</label>
				</div>
				<div class="input-field col s2">
					<button type="button" onclick="showPwd01()" class="btn-flat waves-light waves-effect"><i class="large material-icons" onclick="changeIcon(this)">visibility_off</i></button>
				</div>
			</div>
				<div>
					<button type="submit" onclick="return validar()" class="btn waves-effect waves-light red darken-4">Registrar</button>
				</div>
			<?= form_close(); ?>
			<div class="center"><a href="<?=base_url('usuarios_brw/')?>" style="color: #263238;">Voltar</a></div>
	</div>
</main>

