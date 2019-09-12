<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Productos</title>
	<link rel="stylesheet" href="<?= base_url('assets/') ?>bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/') ?>css/style.css">
	<link href="<?php echo base_url('assets/') ?>ficon/css/all.css" rel="stylesheet">
	<link href="<?php echo base_url('assets/') ?>css/sweetalert2.min.css" rel="stylesheet">


</head>

<body>
	<div class="" style="width: 100%">
		<!-- Header -->
		<div class="header">
			<h2> Administrador de Productos </h2>
		</div>
		<!-- menú -->
		<div style="width: 100%;">
			<div class="row m-2" style="width:99%;">
				<div class="col-2 menu p-3">
					<b class="text-primary"> Menú </b>
					<hr>
					<div class="mt-3"> <a href="<?= base_url() ?>" id="clp"> Productos </a></div>
					<div class="mt-3"> <a href="<?= base_url() ?>welcome/vista_categoria" id="clc"> Categoria productos </a> </div>
				</div>
				<div class="col-10" style="" id="caaaaa">
					<?php $this->load->view('productos/categoria'); ?>
				</div>
			</div>
		</div>
	</div>

	<!-- librerias js -->
	<script src="<?= base_url('assets/') ?>bootstrap/jquery-3.4.1.min.js"></script>
	<script src="<?= base_url('assets/') ?>js/validacion_productos.js"></script>
	<script src="<?= base_url('assets/') ?>js/validar_categoria.js"></script>
	<script src="<?= base_url('assets/') ?>js/filtro.js"></script>
	<script src="<?= base_url('assets/') ?>bootstrap/bootstrap.min.js"></script>
	<script src="<?= base_url('assets/') ?>bootstrap/popper.min.js"></script>
	<script src="<?= base_url('assets/') ?>js/sweetalert2.all.min.js"></script>
	<script src="<?= base_url('assets/') ?>js/sorttable.js"></script>
</body>

</html>
