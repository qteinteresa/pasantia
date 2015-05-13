<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
	 *
	 * @return void
	 * @author Christian LLanes
	 **/
class proveedor_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

     function getProveedor($limit, $start)
     {
          $this->db->limit($limit, $start);
          $query = $this->db->get('proveedor');
          return $query->result_array();
     }

	function  add_proveedor($id_proveedor,$ruc,$razon_social,$direccion,$telefono,$mail,$pag_web,$cuenta_bancaria,$vendedor,$limite_credito)
	{
	$data = array(
	'id_proveedor' => $id_proveedor,
	'ruc' => $ruc,
	'razon_social' => $razon_social,
	'direccion' => $direccion,
	'telefono' => $telefono,
	'mail' => $mail,
	'pag_web' => $pag_web,
	'cuenta_bancaria' => $cuenta_bancaria,
	'vendedor' => $vendedor,
	'limite_credito' => $limite_credito,
	
	);
		/*$data = array(
				'ci' => $_data[1],
				'nombre' => $_data[2],
				'apellido' => $_data[3],
				'direccion' => $_data[4],
				);*/
		//aqui se realiza la inserción, si queremos devolver
		$this->db->insert('proveedor',$data);

	}
	function edit ($id_proveedor){
	$this->db->where('id_proveedor',$id_proveedor);
	
	
	$query = $this->db->get('proveedor');//mi consulta sql
	//VALIDAR SI TENEMOS REGISTRO 
	if ($query->num_rows() > 0) {
		return $query->result();
	} else
		return false;

	}
	function save_edit($id_proveedor,$data){
		$this->db->where('id_proveedor',$id_proveedor);
		$this->db->update('proveedor',$data);

	}
	function delete ($id){
		$this->db->where('id_proveedor',$id);
		$this->db->delete('proveedor');//mi consulta sql
		$query = $this->db->get('proveedor');//mi consulta sql
		
	}
	function check_ruc($ruc)
	{
		# code...
		$this->db->select('ruc');
		$this->db->where('ruc',$ruc);
		$consulta = $this->db->get('proveedor');
		if ($consulta->num_rows()> 0) {
			# code...
			return true;
		}

	}
}

/* End of file Pais_Model.php */
/* Location: ./application/models/Pais_Model.php */