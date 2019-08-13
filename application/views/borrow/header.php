<?php if (! defined('BASEPATH') || ! $this->session->userdata("Logado")) exit('No direct script acces allowed'); ?>

<!--DOCTYPE html-->
<html>
<head>
<body class="grey lighten-3">
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0"/><!-- META DE RESPONSIVIDADE-->
	<title>Borrow CodeIgniter</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/brw_css.css">
</head>
	<header>
		<nav>
			<div class="nav-wrapper blue-grey darken-4">
				<a href="#" class="brand-logo center">Logo</a>
				<a href="#" data-target="mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
				<ul class="right hide-on-med-and-down">
					<li><a href="<?= base_url('borrow/addBrw')?>">Adicionar</a></li>
					<li><a href="<?= base_url('borrow/devBrw')?>">Devoluções</a></li>
					<li><a href="<?= base_url('borrow/')?>">Emprestados</a></li>
					<?php $not = ($this->borrow_model->get_brw_date_num() == 0) ? "none" : ""; ?>
					<li><a href="<?= base_url('borrow/')?>">Notificações <span class="new badge amber accent-3" data-badge-caption="" style="color: #263238; display: <?= $not ?>"><?= $this->borrow_model->get_brw_date_num(); ?></span></a></li>
					<?= '<li><a href="'.base_url('usuarios_brw/editUser/'.$this->session->userdata('Logado')['id']).'">Editar Perfil</a></li>'?>
					<li><a href="#modal_out" class="modal-trigger">Sair</a></li>
				</ul>
			</div>
		</nav>
		<ul class="sidenav" id="mobile">
			<li>
				<div class="user-view">
					<div class="background"></div>
					<a href="#"><i class="medium material-icons circle">android</i></a>
					<a href="#"><span class="name"><?= ucwords($this->session->userdata('Logado')['username']) ?></span></a>
				</div>
			</li>
			<li class="divider"></li>
			<li><a href="<?= base_url('borrow/addBrw')?>">Adicionar</a></li>
			<li><a href="<?= base_url('borrow/devBrw')?>">Devoluções</a></li>
			<li><a href="<?= base_url('borrow/')?>">Emprestados</a></li>
			<li><a href="<?= base_url('borrow/')?>"><span class="new badge amber accent-3" data-badge-caption="" style="color: #263238; display: <?= $not ?>"><?= $this->borrow_model->get_brw_date_num(); ?></span>Notificações</a></li>
			<?= '<li><a href="'.base_url('usuarios_brw/editUser/'.$this->session->userdata('Logado')['id']).'">Editar Perfil</a></li>'?>
			<li><a href="#modal_out" class="modal-trigger">Sair</a></li>
		</ul>
	</header>
	<div class="modal" id="modal_out">
		<div class="modal-content">
			<h5><b>Deseja sair do Sitema?</b></h5>
		</div>
		<div class="modal-footer">
			<a href="#!" class="btn waves-light waves-effect blue-grey darken-4">Cancelar</a>
			<a href="<?= base_url('usuarios_brw/logout')?>" class="btn waves-effect waves-light red darken-4">Sair</a>
		</div>
	</div>

