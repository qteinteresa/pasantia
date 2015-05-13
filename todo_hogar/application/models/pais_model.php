<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
	 *
	 * @return void
	 * @author Christian LLanes
	 **/
class Pais_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	// function lista_pais (){
	// 	$consulta = $this->db->get('pais')->num_rows();
	// 	return $consulta=>result();

	// }
	function  add_pais($Descripcion_Pais){
		$data = array(
				'Descripcion_Pais' => $Descripcion_Pais
				);
		//aqui se realiza la inserción, si queremos devolver
		$this->db->insert('pais',$data);

	}
	function edit ($id){
	$this->db->where('Id_Pais',$id);
	$query = $this->db->get('pais');//mi consulta sql
	//VALIDAR SI TENEMOS REGISTRO 
	if ($query->num_rows() > 0) {
		return $query->result();
	} else
	{
		return false;
	}

	}
	function save_edit($id,$data){
		$this->db->where('Id_Pais',$id);
		$this->db->update('pais',$data);

	}
	function delete ($id){
		$this->db->where('Id_Pais',$id);
		$this->db->delete('pais');//mi consulta sql
		$query = $this->db->get('pais');//mi consulta sql
		
	}
}

/* End of file Pais_Model.php */
/* Location: ./application/models/Pais_Model.php */