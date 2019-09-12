<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Landing_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}


	public function index()
	{

		$data['result'] = $this->Landing_model->$this->load->view('landing/landing');
	}

	public function createdata()
	{
		$data = array(
			'correo' => $_POST['correo'],
			'contraseña' => $_POST['contraseña'],
			'roles' => 'users',
		);
		$this->db->insert('usuario', $data);
	}

	public function getdata()
	{
		$query = $this->db->query('select * from usuario');
		return $query->result();
	}

	public function getdata_id($id)
	{
		$query = $this->db->query('select * from usuario where usuario_id=' . $id);
		return $query->row();
	}

	public function updatedata($id)
	{
		$data = array(
			'correo' => $_POST['correo'],
			'contraseña' => $_POST['contraseña'],
			'roles' => 'users',
		);
		$this->db->where('usuario_id', $id);
		$this->db->update('usuario', $data);
	}

	
	public function delete($id)
	{
		$this->db->where('usuario_id', $id);
		$this->db->delete('usuario');
	}
}
