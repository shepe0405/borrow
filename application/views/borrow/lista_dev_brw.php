<main>
	<div class="center container">
<?php 
	if ($this->session->flashdata("Sucesso")) { ?>
	<script>
		window.onload = function(){
		    M.toast({html: '<?=$this->session->flashdata("Sucesso")?>', classes: 'blue-grey darken-4'})
		  };
	</script>
<?php } ?>
<?php 
	if ($this->session->flashdata("Erro")) { ?>
	<script>
		window.onload = function(){
		    M.toast({html: '<?=$this->session->flashdata("Erro")?>', classes: 'red darken-4'})
		  };
	</script>
<?php } ?>
		<h4>Devoluções</h4>
		<table class="centered" id="tabela">
			<thead>
				<tr>
					<th><input type="text" id="search" placeholder="Pesquise por Item"></th>
					<th><input type="text" id="search_cont" placeholder="Pesquise por Contato"></th>
					<th><input type="text" id="search_data" placeholder="Pesquise por Data"></th>
					<th><input type="text" id="search_sit" placeholder="Pesquise por Situação"></th>
				</tr>
				<tr>
					<th>ITEM</th>
					<th>CONTATO</th>
					<th>DATA DE DEVOLUÇÃO</th>
					<th>SITUAÇÃO</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($emprestimos as $brw) { ?>
				<tr>
					<td class="modal-trigger" href="#brw_mais<?= $brw->id?>"><?= $brw->item?></td>
					<td class="modal-trigger" href="#brw_mais<?= $brw->id?>"><?= $brw->contato?></td>
					<td class="modal-trigger" href="#brw_mais<?= $brw->id?>"><?=date('d/m/Y', strtotime($brw->data_dev)) ?></td>
					<td>Devolvido</td>
				</tr>
				<div class="modal" id="brw_mais<?= $brw->id?>">
					<div class="modal-content">
						<?= '<a href="'.base_url('borrow/delBrw/'.$brw->id).'" class="waves-effect waves-light btn-flat right"><i class="large material-icons red-text">delete_forever</i></a>' ?>
						<p class="divider"></p>
						<div class="row">
							<p class="col s4"><b>Item: </b><?= $brw->item?></p>
							<p class="col s4"><b>Contato: </b><?= $brw->contato?></p>
						</div>
						<p class="divider"></p>
						<div class="row">
							<p class="col s4"><b>Data de Empréstimo: </b><?= date('d/m/Y', strtotime($brw->data))?></p>
							<p class="col s4"><b>Devolvido no dia: </b> <?=date('d/m/Y', strtotime($brw->data_dev)) ?></p>
							<p class="col s4"><b>Situação: </b>Devolvido</p>
						</div>
						<p class="divider"></p>
						<div class="row">
							<p class="col s12"><b>Detalhes: </b><?= $brw->detalhes?></p>
						</div>
					</div>
					<div class="modal-footer">
						<a href="#!" class="modal-close btn red accent-4 waves-effect waves-light">Fechar</a>
					</div>
				</div>
			<?php } ?>
			</tbody>
		</table><br>
		<div class="left">
			<a href="<?=base_url('borrow/')?>" class="btn waves-effect waves-light blue-grey darken-4">Empréstimos</a>
			<a href="<?=base_url('borrow/addBrw')?>" class="btn waves-effect waves-light red darken-4">Adicionar</a>
		</div>
	</div>
</main>