<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome_m extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function conteoo()
	{
		// return	$this->db->query("SELECT count('*') FROM productos ");
	}

	public function buscar_productom()
	{
		return	$this->db->query("SELECT * FROM productos,categorias_productos WHERE productos.categoria_producto = id_categoria_productos  ");
	}

	function buscar_filtro($buscar)
	{
		return $this->db->query("select * from productos,categorias_productos 
		WHERE CONCAT_WS(' ', productos.nombre_producto,productos.codigo_producto,productos.marca_producto,productos.precio_producto,
		productos.descripcion_producto,
		categorias_productos.nombre_categoria_productos) LIKE '%$buscar%' and categorias_productos.id_categoria_productos = categoria_producto ");
	}

	public function selectcategoria()
	{
		return $this->db->query('select * from categorias_productos where activo_categoria_productos = 1 	');
	}

	public function getproductos($array = null)
	{
		if (!$array) {
			return  $this->db->query("select nombre_categoria_productos,id_categoria_productos from categorias_productos where activo_categoria_productos = '1'");
		} else {
			$this->db->select('codigo_producto');
			$this->db->from('productos');
			$this->db->where('codigo_producto', $array['codigo_producto']);
			$re = $this->db->get();
			if ($re->row_array() > 0) {
				return 'cod';
			} else {
				$this->db->select('nombre_producto');
				$this->db->from('productos');
				$this->db->where('nombre_producto', $array['nombre_producto']);
				$re = $this->db->get();
				if ($re->row_array() > 0) {
					return 'nom';
				} else {
					$this->db->insert('productos', $array);
				}
			}
		}
	}

	public function traer_datos_producto_editar($va)
	{
		return $this->db->query("select * from productos,categorias_productos where productos.id ='$va'");
	}

	public function updatepr($arrayProducto, $id)
	{
		$conf = '';
		$conf2 = '';
		$coo = $arrayProducto['codigo_producto'];
		$nom = $arrayProducto['nombre_producto'];
		$re =	$this->db->query("SELECT * FROM productos WHERE codigo_producto ='$coo'");
		$re3 =	$this->db->query("SELECT * FROM productos WHERE nombre_producto ='$nom'");

		if ($re->row_array() > 0) {
			foreach ($re->result() as $key) {
				if ($key->codigo_producto == $coo && $key->id == $id) {
					$conf = 'ok';
				} else {
					$conf = 'no';
				}
			}
		} else {
			$conf = 'ok';
		}

		if ($re3->row_array() > 0) {
			foreach ($re3->result() as $key) {
				if ($key->nombre_producto == $nom && $key->id == $id) {
					$conf2 = 'ok';
				} else {
					$conf2 = 'no';
				}
			}
		} else {
			$conf2 = 'ok';
		}

		if ($conf == 'no') {
			return 'cn';
		} else {
			if ($conf2 == 'no') {
				return 'nn';
			} else {
				if ($conf == 'ok' && $conf2 == 'ok') {
					$this->db->where('id', $id);
					$this->db->update('productos', $arrayProducto);
					return 'ok';
				}
			}
		}
	}

	public function action_eliminar($va)
	{
		$id = $va;
		return	$this->db->query("DELETE FROM productos WHERE productos.id = '$id' ");
		// return $id;
	}










	// // public function buscar_product()
	// // {
	// // 	return  $this->db->query("select * from productos,categorias_productos where categoria_producto = codigo_categoria_productos ORDER BY productos.fecha_registro DESC ");
	// // }

	// // aqui envia la informacion para pintar la tabla de productos{{}}
	// public function lsitar_tabla()
	// {
	// 	return  $this->db->query("select * from productos,categorias_productos where categoria_producto = codigo_categoria_productos ORDER BY productos.fecha_registro DESC ");
	// }



	// public function getproductos($array = null)
	// {
	// 	if (!$array) {
	// 		return  $this->db->query("select nombre_categoria_productos,id_categoria_productos from categorias_productos where activo_categoria_productos = 1");
	// 	} else {
	// 		$this->db->select('codigo_producto');
	// 		$this->db->from('productos');
	// 		$this->db->where('codigo_producto', $array['codigo_producto']);
	// 		$re = $this->db->get();
	// 		if ($re->row_array() > 0) {
	// 			return 'cod';
	// 		} else {
	// 			$this->db->select('nombre_producto');
	// 			$this->db->from('productos');
	// 			$this->db->where('nombre_producto', $array['nombre_producto']);
	// 			$re = $this->db->get();
	// 			if ($re->row_array() > 0) {
	// 				return 'nom';
	// 			} else {
	// 				$this->db->insert('productos', $array);
	// 			}
	// 		}# code...
	// 	}
	// }

	// public function action_eliminar($va)
	// {
	// 	$id = $va;
	// 	return	$this->db->query("DELETE FROM productos WHERE productos.id = '$id' ");
	// 	// return $id;
	// }











	// // CATEGORIA

	public function buscar_categoria_m()
	{
		$this->db->select('*');
		$this->db->from('categorias_productos');
		return $this->db->get();
	}

	public function traer_datos_categoria_editar($va)
	{
		return $this->db->query("select * from categorias_productos where id_categoria_productos ='$va'");
	}

	// eliminar
	public function action_eliminar2($va)
	{
		$this->db->query("DELETE FROM categorias_productos WHERE id_categoria_productos = $va ");
	}







	public function getproductos2($array)
	{
		$codigo = $array['codigo_categoria_productos'];
		$nombre = $array['nombre_categoria_productos'];
		$r = $this->db->query("SELECT * FROM categorias_productos WHERE codigo_categoria_productos = '$codigo'");
		if ($r->row_array() > 0) {
			return 'cod';
		} else {
			$r2 = $this->db->query("SELECT * FROM categorias_productos WHERE nombre_categoria_productos = '$nombre'");
			if ($r2->row_array() > 0) {
				return 'nom';
			} else {
				$this->db->insert('categorias_productos', $array);
			}
		}
	}




	public function updatepr2($arrayProducto, $id)
	{
		$conf = '';
		$conf2 = '';
		$coo = $arrayProducto['codigo_categoria_productos'];
		$nom = $arrayProducto['nombre_categoria_productos'];
		$re =	$this->db->query("SELECT * FROM categorias_productos WHERE codigo_categoria_productos ='$coo'");
		$re3 =	$this->db->query("SELECT * FROM categorias_productos WHERE nombre_categoria_productos ='$nom'");

		if ($re->row_array() > 0) {
			foreach ($re->result() as $key) {
				if ($key->codigo_categoria_productos == $coo && $key->id_categoria_productos == $id) {
					$conf = 'ok';
				} else {
					$conf = 'no';
				}
			}
		} else {
			$conf = 'ok';
		}

		if ($re3->row_array() > 0) {
			foreach ($re3->result() as $key) {
				if ($key->nombre_categoria_productos == $nom && $key->id_categoria_productos == $id) {
					$conf2 = 'ok';
				} else {
					$conf2 = 'no';
				}
			}
		} else {
			$conf2 = 'ok';
		}

		if ($conf == 'no') {
			return 'cn';
		} else {
			if ($conf2 == 'no') {
				return 'nn';
			} else {
				if ($conf == 'ok' && $conf2 == 'ok') {
					$this->db->where('id_categoria_productos', $id);
					$this->db->update('categorias_productos', $arrayProducto);
					return 'ok';
				}
			}
		}
	}

	public function buscarfiltro2($buscar)
	{
		return $this->db->query("select * from categorias_productos WHERE CONCAT_WS(' ',nombre_categoria_productos,codigo_categoria_productos,descripcion_categoria_productos)
		 LIKE '%$buscar%' ");
	}


	public function activa_des($id, $valor)
	{

		$this->db->query("UPDATE categorias_productos SET activo_categoria_productos = '$valor' WHERE id_categoria_productos = '$id'");
	}
}
