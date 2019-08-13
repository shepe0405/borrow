<?php if (! defined('BASEPATH')) exit('No direct script acces allowed'); ?>

<main>
	<div class="container">
		<h4 class="center">Novo</h4>
		<?= form_open('borrow/salvarBrw'); ?>
		<div class="row">
			<div class="input-field col s6 m6 l6 xl6">
				<i class="material-icons prefix">file_upload</i>
					<input type="text" name="item" required minlength="3" placeholder="Digite o Nome do Item">
				<label for="item">Nome do Item</label>
			</div>
			<div class="input-field col s6 m6 l6 xl6">
				<i class="material-icons prefix">account_circle</i>
					<input type="text" name="contato" minlength="3" required placeholder="Digite o Nome do Contato">
				<label for="contato">Nome do Contato</label>
			</div>
		</div>
		<div class="row">
			<div class="input-field col s6 m6 l6 xl6">
		       	<i class="material-icons prefix">event</i>
		            <input type="text" required name="data" class="datepicker">
		        <label for="data">Data de Empréstimo</label>
		    </div>
		    <div class="input-field col s6 m6 l6 xl6">
		        <i class="material-icons prefix">alarm</i>
		            <input type="text" readonly class="datepicker" name="devolucao">
		        <label for="devolucao">Data de Devolução</label>
		    </div>
		</div>
		<div class="row">
		  	<div class="input-field col s12">
				<i class="material-icons prefix">border_color</i>
					<textarea class="materialize-textarea" name="detalhes" data-length="255"></textarea>
				<label for="detalhes">Detalhes</label>
			</div>
		</div>
			
			<input type="hidden" name="situacao" value="1">
			<button type="submit" class="btn waves-effect waves-light red darken-4">Cadastrar</button>
			<input type="hidden" name="user_id" value="<?= $this->session->userdata("Logado")['id'] ?>">
			<a href="<?= base_url('borrow/')?>" class="btn waves-light waves-effect blue-grey darken-4">Empréstimos</a>
		<?= form_close(); ?>

	</div>
</main>