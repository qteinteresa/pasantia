<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
	 *
	 * @return void
	 * @author Christian LLanes
	 **/
class factura_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	// function lista_pais (){
	// 	$consulta = $this->db->get('pais')->num_rows();
	// 	return $consulta=>result();

	// }
	function  add_factura($codigo,$cantidad,$tipo_iva,$precio,$valor_iva)
	{
	$data = array(
		'id_detalle' =>'',
		'cantidad' => $cantidad,
		'producto' =>  $codigo,
		'tipo_iva' => $tipo_iva,
		'precio' => $precio,
		'iva' => $valor_iva,
		);
		
		$this->db->insert('detalle',$data);

	}
	function edit ($num_factura)
	{
	$this->db->select('detalle.cantidad,detalle.precio,producto.descripcion,detalle.tipo_iva,detalle.iva,detalle.num_factura');
	
	
	$this->db->where('factura.num_factura',$num_factura);
	$query = $this->db->get(' detalle INNER JOIN factura ON detalle.num_factura =factura.num_factura inner join producto on detalle.producto=producto.id_producto');//mi consulta sql
	//VALIDAR SI TENEMOS REGISTRO 
	if ($query->num_rows() > 0) {
		return $query->result();
	} else
		return false;

	}
	
	
	//////////////////////////////////////////////////77
	function buscar ($dato_buscar)
	{
	
	//$this->db->where('factura.num_factura',$dato_buscar);
	$this->db->like('cliente.nombre', $dato_buscar, 'before');
	$query = $this->db->get(' factura INNER JOIN cliente ON cliente.ci =factura.ci');//mi consulta sql
	//VALIDAR SI TENEMOS REGISTRO 
	if ($query->num_rows() > 0) {
		return $query->result();
	} else
		return false;

	}
	///////////////////////////////////////////////////
	function save_edit($id_proveedor,$data){
		$this->db->where('id_proveedor',$id_proveedor);
		$this->db->update('proveedor',$data);

	}
	function delete ($id_proveedor){
		$this->db->where('id_proveedor',$id);
		$this->db->delete('proveedor');//mi consulta sql
		$query = $this->db->get('proveedor');//mi consulta sql
		
	}
	//////////////////////////////////////////////////////////77
	public function datos_cliente()
	{
		$this->db->order_by('ci','asc');
		$ci = $this->db->get('cliente');
		if($ci->num_rows()>0)
		{
			return $ci->result();
		}
		$this->db->order_by('codigo','asc');
		$codigo = $this->db->get('producto');
		if($codigo->num_rows()>0)
		{
			return $codigo->result();
		}
		
	}
	public function datos_producto()
	{
		$this->db->order_by('codigo','asc');
		$codigo = $this->db->get('producto');
		if($codigo->num_rows()>0)
		{
			return $codigo->result();
		}
		
	}
	

	
		
	
	
	//////////////////////////////////////////////////////////7
}

/* End of file Pais_Model.php */
/* Location: ./application/models/Pais_Model.php */