<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
	 *
	 * @return void
	 * @author Christian LLanes
	 **/

class Home_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	function ger_producto_stock()
	{		
		$consult="SELECT sum(cantidad) as total FROM producto"; 
		 	$query = $this->db->query($consult);//mi consulta sql
			//VALIDAR SI TENEMOS REGISTRO 
			if ($query->num_rows() > 0) {
				return $query->result();
			} else
			{
				return false;
			}
	}
	

}

/* End of file home.model.php */
/* Location: ./application/models/home.model.php */