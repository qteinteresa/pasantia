<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
	 *
	 * @return void
	 * @author Christian LLanes
	 **/
class cliente_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

     function getCliente($limit, $start)
     {
          $this->db->limit($limit, $start);
          $query = $this->db->get('cliente');
          return $query->result_array();
     }

	function  add_cliente($data)
	{
		//aqui se realiza la inserción, si queremos devolver
		$this->db->insert('cliente',$data);

	}
	function edit ($id_cliente){
	$this->db->where('id_cliente',$id_cliente);
	
	
	$query = $this->db->get('cliente');//mi consulta sql
	//VALIDAR SI TENEMOS REGISTRO 
	if ($query->num_rows() > 0) {
		return $query->result();
	} else
		return false;

	}
	function save_edit($id_cliente,$data){
		$this->db->where('id_cliente',$id_cliente);
		$this->db->update('cliente',$data);

	}
	function delete ($id_cliente){
		$this->db->where('id_cliente',$id_cliente);
		$this->db->delete('cliente');//mi consulta sql
		$query = $this->db->get('cliente');//mi consulta sql
		
	}
	function check_ci_cliente($ci)
	{
		# code...
		$this->db->select('ci');
		$this->db->where('ci',$ci);
		$consulta = $this->db->get('cliente');
		if($consulta->num_rows() > 0){
			return true;
		}
	}
}

/* End of file Pais_Model.php */
/* Location: ./application/models/Pais_Model.php */