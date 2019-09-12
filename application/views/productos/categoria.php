<div class="producto">
	<div style="display:flex">
		<div style="width:100%;margin: auto">
			<h3>Categorías</h3>
		</div>
		<div style="width:100%;text-align:right">
			<button class="btn btn-light" data-toggle="modal" data-target="#exampleModalLong">Categoría
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
				<input type="text" class="form-control" placeholder="Buscar producto,codigo,categoria,marca" id="buscar_filtro2">
			</div>
		</div>
	</nav>
</div>

<!-- tabla de productos -->
<div style="width:100%;height:60vh" class="table-responsive">
	<table style="width:100%" class="table sortable" cellspacing="0" cellpadding="0" id="">
		<thead>
			<tr>
				<th>#</th>
				<th>Código </th>
				<th>Nombre Categoría</th>
				<th>Descripción</th>
				<th>Activo</th>
				<th> Acción</th>
			</tr>
		</thead>
		<tbody id="lista_filtro2">

		</tbody>
	</table>
</div>
<!-- paginacion -->
<nav aria-label="Page navigation example">
	<ul class="pagination">
		<li class="page-item">
			<a class="page-link" href="#" aria-label="Previous">
				<span aria-hidden="true">&laquo;</span>
			</a>
		</li>
		<li class="page-item"><a class="page-link" href="#">1</a></li>
		<li class="page-item"><a class="page-link" href="#">2</a></li>
		<li class="page-item"><a class="page-link" href="#">3</a></li>
		<li class="page-item">
			<a class="page-link" href="#" aria-label="Next">
				<span aria-hidden="true">&raquo;</span>
			</a>
		</li>
	</ul>
</nav>

<!-- modla -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Agreagando una categoría</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<div class="row">
						<div class="col-6">
							<label for=""> Código</label>
							<input class="form-control" type="text" placeholder="" id="cod_producto2" maxlength="10" onkeypress="return sololetras2(event);" minlength="4">
							<small id="cod2" class="validacion"> </small>
						</div>
						<div class="col-6">
							<label for="">Nombre</label>
							<input class="form-control" type="text" placeholder="" id="n_producto2">
							<small id="nom2" class="validacion"> </small>
						</div>
					</div>
				</div>
				<div class="form-group">
					<label for="">Descripción</label>
					<small id="des2" class="validacion"> </small>
					<div> <textarea class="form-control" name="" id="des_producto2" cols="" rows=""></textarea>
					</div>
				</div>
			</div>
			<div class="modal-footer" style="width:100%">
				<div style="margin: auto;display:flex">
					<div> <button type="reset" class="btn btn-secondary" data-dismiss="modal">Cancelar</button></div>
					<div id="editar2">
						<button class="btn btn-primary ml-2" id="enviar2">Guardar</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
