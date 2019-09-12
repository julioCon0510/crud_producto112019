<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Welcome_m');
	}

	public function vista_categoria()
	{
		// $re['listar_categoria'] = $this->Welcome_m->selectcategoria();
		$this->load->view('productos/parteB');
	}


	public function index()
	{
		$re['listar_categoria'] = $this->Welcome_m->selectcategoria();
		$this->load->view('productos/home', $re);
	}

	public function buscar_producto()
	{

		$conteo = $this->Welcome_m->conteoo();

		// var_dump($conteo);

		$re = $this->Welcome_m->buscar_productom();
		echo json_encode($re->result());
	}

	public function buscar()
	{

		$buscar = $this->input->post('buscar');
		$res = $this->Welcome_m->buscar_filtro($buscar);
		echo json_encode($res->result());
	}


	// es la encargada de consultar que el producto no exita y a la vez de agregar el producto
	public function consultar_productos()
	{
		$arrayProducto = array(
			'codigo_producto' => $this->input->post('codigo'),
			'nombre_producto' => $this->input->post('nombre'),
			'descripcion_producto' => $this->input->post('des'),
			'marca_producto' => $this->input->post('marca'),
			'categoria_producto' => $this->input->post('cate'),
			'precio_producto' => $this->input->post('precio')
		);
		$resul = $this->Welcome_m->getproductos($arrayProducto);
		echo $resul;
	}



	public function action_editar()
	{
		$va = $this->input->post('id');
		$r = $this->Welcome_m->traer_datos_producto_editar($va);
		echo json_encode($r->result());
	}
	function update()
	{
		$id = $this->input->post('id');
		$arrayProducto = array(
			'codigo_producto' => $this->input->post('codigo'),
			'nombre_producto' => $this->input->post('nombre'),
			'descripcion_producto' => $this->input->post('des'),
			'marca_producto' => $this->input->post('marca'),
			'categoria_producto' => $this->input->post('cate'),
			'precio_producto' => $this->input->post('precio')
		);
		$resul = $this->Welcome_m->updatepr($arrayProducto, $id);

		echo $resul;
	}



	// // eminimar
	public function action_eliminar()
	{
		$va = $this->input->post('id');
		$this->Welcome_m->action_eliminar($va);
	}

	// // CATEGORIA
	// // ////////////////////////////////////

	public function buscar_categoria(Type $var = null)
	{
		$res = $this->Welcome_m->buscar_categoria_m();
		echo json_encode($res->result());
	}

	public function action_editar2()
	{
		$va = $this->input->post('id');
		$r = $this->Welcome_m->traer_datos_categoria_editar($va);
		echo json_encode($r->result());
	}
	function update2()
	{
		$id = $this->input->post('id');
		$arrayProducto = array(
			'codigo_categoria_productos' => $this->input->post('codigo'),
			'nombre_categoria_productos' => $this->input->post('nombre'),
			'descripcion_categoria_productos' => $this->input->post('des'),
		);
		$resul = $this->Welcome_m->updatepr2($arrayProducto, $id);
		echo $resul;
	}

	public function action_eliminar2()
	{
		$valor = $this->input->post('id');
		$v = $this->Welcome_m->action_eliminar2($valor);
		echo $v;
	}

	public function consultar_productos2()
	{
		$arrayProducto = array(
			'codigo_categoria_productos' => $this->input->post('codigo'),
			'nombre_categoria_productos' => $this->input->post('nombre'),
			'descripcion_categoria_productos' => $this->input->post('des'),
		);
		$resul = $this->Welcome_m->getproductos2($arrayProducto);

		echo $resul;
	}

	public function bus()
	{
		$buscar = $this->input->post('buscar2');
		$res = $this->Welcome_m->buscarfiltro2($buscar);
		echo json_encode($res->result());
		// var_dump($res->result());
	}


	public function activa_des()
	{
		$id = $this->input->post('id');
		$valor = $this->input->post('valor');
		$this->Welcome_m->activa_des($id, $valor);
	}
}
	// buscar_productos
	// public function buscar_producto()
	// {
	// 	$res = $this->Welcome_m->lsitar_tabla();
	// 	echo json_encode($res->result());
	// }
