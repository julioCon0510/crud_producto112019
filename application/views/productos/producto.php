<div class="producto">
	<div style="display:flex">
		<div style="width:100%;margin: auto">
			<h3>Productos </h3>
		</div>
		<div style="width:100%;text-align:right">
			<button class="btn btn-light" data-toggle="modal" data-target="#exampleModal">Agregar producto
				<i class="fas fa-plus-circle"></i>
			</button>
		</div>
	</div>
</div>
<!-- donde se realiza el filtro -->
<div style="width:100%" class="mt-2">
	<nav style="box-shadow: 0 0 0.1em gray;height:auto;border-radius:5px">
		<div style="display: flex;">
			<div style="width:100%;margin: auto" class="m-1">
				<!-- <input type="range" class="form-control "> -->
			</div>
			<div style="width:100%;" class="m-1">
				<input type="text" class="form-control" placeholder="Buscar producto,codigo,categoria,marca" id="buscar_filtro">
			</div>
		</div>
	</nav>
</div>
<!-- tabla de productos -->
<div style="width:100%;height:60vh" class="table-responsive">
	<table style="width:100%" class="table sortable" cellspacing="0" cellpadding="0">
		<thead>
			<tr>
				<th>#</th>
				<th>Código </th>
				<th>Nombre</th>
				<th>Categoría</th>
				<th>Descripción</th>
				<th>Marca</th>
				<th>Precio</th>
				<th> Acción</th>
			</tr>
		</thead>
		<tbody id="lista_filtro">

		</tbody>
	</table>
</div>
<?php echo $this->pagination->create_links() ?>
<!-- paginacion -->



<!-- modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Agregando el producto</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<div class="row">
						<div class="col-6">
							<label for=""> Código</label>
							<input class="form-control" type="text" placeholder="" id="cod_producto" maxlength="10" onkeypress="return sololetras(event);" minlength="4">
							<small id="cod" class="validacion"> </small>
						</div>
						<div class="col-6">
							<label for="">Nombre</label>
							<input class="form-control" type="text" placeholder="" id="n_producto">
							<small id="nom" class="validacion"> </small>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="">Categoría</label>
					<select name="" class="form-control" id="cate_producto">
						<?php foreach ($listar_categoria->result() as $key) { ?>
							<option value="<?= $key->id_categoria_productos ?>"> <?= $key->nombre_categoria_productos ?> </option>
						<?php } ?>
					</select>
					<small id="cate" class="validacion"> </small>
				</div>
				<div class="form-group">
					<label for="">Descripción</label>
					<small id="des" class="validacion"> </small>
					<div> <textarea class="form-control" name="" id="des_producto" cols="" rows=""></textarea>
					</div>
				</div>
				<div class="row">
					<div class="col-6">
						<label for=""> Marca</label>
						<input class="form-control" type="text" id="marca_producto" placeholder="">
						<small id="marca" class="validacion"> </small>

					</div>
					<div class="col-6">
						<label for="">Precio</label>
						<input class="form-control" type="text" id="precio_producto" placeholder="" onkeypress="return solonumeros(event);">
						<small id="precioo" class="validacion"> </small>
					</div>
				</div>
			</div>
			<div class="modal-footer" style="width:100%">
				<div style="margin: auto;display:flex">
					<div> <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancelar</button></div>
					<div id="editar">
						<button class="btn btn-primary ml-2" id="enviar" onclick="validar(0,3)">Guardar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
