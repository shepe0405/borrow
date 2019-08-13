<?php if (! defined('BASEPATH') || ! $this->session->userdata("Logado")) exit('No direct script acces allowed'); ?>

<main>
	<div class="container">
		<h4 class="center">Editar Perfil</h4><br>
		<?= form_open('usuarios_brw/salvar')?>
		<div class="row">
				<div class="input-field col s6">
					<i class="material-icons prefix">account_circle</i>
						<input type="text" name="username" id="username" value="<?= $usuarios->username?>"  onblur="textLower(this)" minlength="3" autocomplete="off" required placeholder="Digite seu Nome de Usuário">
					<label for="username">Usuário</label>
				</div>
				<div class="input-field col s6">
					<i class="material-icons prefix">email</i>
						<input type="email" required name="email" value="<?= $usuarios->email?>"  autocomplete="off" onblur="textLower(this)" placeholder="Digite seu E-mail">
					<label form="email">E-mail</label>
				</div>
			</div>
			<button type="submit" class="btn waves-effect waves-light red darken-4">Editar</button>
			<input type="hidden" name="id"  value="<?= $usuarios->id?>">
			<input type="hidden" name="senha"  value="<?= $usuarios->senha?>">
			<?= anchor("borrow/", "Lista de Contatos", array("class" => "btn waves-effect waves-light blue-grey darken-4"))?>
		<?= form_close()?>
		
	</div>
</main>