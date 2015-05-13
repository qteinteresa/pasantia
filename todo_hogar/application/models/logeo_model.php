<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logeo_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}

	public function logeo($usser ,$pass)
	{
			$this->db->select('*');// selecionar todo
            $this->db->from('usuario'); // de la tabla Usuario
			$this->db->where('usuario',$usser);// donde el nombre de usuario sea igual 
			$this->db->where('pass',$pass);// el pass igual
			$consulta = $this->db->get();

			if($consulta->num_rows > 0){
				$consulta = $consulta->row();
				return $consulta;
				
			} else{
				
			}
			      // $resultado = $consulta->row();
			      // return $resultado;

			
	}
	//cheque si existe el usuario
	public	function check_nombre($usuario)
	{
		# code...
		$this->db->select('usuario');
		$this->db->where('usuario',$usuario);
		$consulta = $this->db->get('usuario');
		if ($consulta->num_rows()> 0) {
			# code...
			return true;
		}

	}
	//chequea si existe el pass
	public	function check_pass($pass)
	{
		# code...
		$this->db->select('pass');
		$this->db->where('pass',$pass);
		$consulta = $this->db->get('usuario');
		if ($consulta->num_rows()> 0) {
			# code...
			return true;
		}

	}

}

/* End of file logeo_model.php */
/* Location: ./application/models/logeo_model.php */