<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
	 *
	 * @return void
	 * @author Christian LLanes
	 **/
class empleado_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

     function getEmpleado($limit, $start)
     {
          $this->db->limit($limit, $start);
          $query = $this->db->get('empleado');
          return $query->result_array();
     }

	function  add_empleado($ci,$nombre_empleado,$apellido_empleado,$direccion,$telefono,$sueldo,$cargo)
	{
	$data = array(
	'ci' => $ci,
	'nombre' => $nombre_empleado,
	'apellido' => $apellido_empleado,
	'direccion' => $direccion,
	'telefono' => $telefono,
	'sueldo' => $sueldo,
	'cargo' => $cargo,
	
	);

		$this->db->insert('empleado',$data);

	}
	function add_user($_data)
	{
		# code...
		$this->db->insert('usuario',$_data);
	}
	// verificar si existe algun empleado con usuario
	function edit ($id){
	$this->db->where('id_empleado',$id);
	$query = $this->db->get('usuario');//mi consulta sql
	return $query->result();
	}
	////editar solo empleado
	function edit_empleado($id2)
	{
		$this->db->where('id_empleado',$id2);
		$consulta = $this->db->get('empleado');//mi consulta sql
		return $consulta->result();
	}
	// editar empleado_user
	function edit_empleado_user($id)
	{
		$consult="SELECT empleado.id_empleado , empleado.ci , empleado.nombre, empleado.apellido, empleado.direccion, empleado.telefono, empleado.sueldo, 
				empleado.cargo, usuario.id_usuario, usuario.usuario as user, usuario.pass as password 
    			from empleado,usuario 
    			where empleado.id_empleado=usuario.id_empleado 
			 	and empleado.id_empleado =".$id;
			$consulta = $this->db->query($consult);//mi consulta sql
			//VALIDAR SI TENEMOS REGISTRO 
			if ($consulta->num_rows() > 0) {
				return $consulta->result();
			} else
			{
				return false;
			}
	}

	// guardar empleado
	function save_edit($id,$data){
		$this->db->where('id_empleado',$id);
		$this->db->update('empleado',$data);

	}
	function save_user($id2, $_data)
	{
		$this->db->where('id_usuario',$id2);
		$this->db->update('usuario',$_data);
	}
	// eliminar un registro de empleado
	function delete ($id){
		$this->db->where('id_empleado',$id);
		$this->db->delete('empleado');//mi consulta sql
		$query = $this->db->get('empleado');//mi consulta sql
		
	}
	/////////eliminar empleado y user
	public function delete_user($id)
	{
		$this->db->where('id_empleado',$id);
		$this->db->delete('usuario');//mi consulta sql
		$query = $this->db->get('usuario');//mi consulta sql

	}
	//verificar si ya existe la cedula del empleado
		function check_ci($ci)
	{
		$this->db->select('ci');
		$this->db->where('ci',$ci);
		$consulta = $this->db->get('empleado');
		if ($consulta->num_rows()> 0) {
			# code...
			return true;
		}

	}
	///verificar si ya existe usuario registrado
			function check_usuario($usuario)
	{
		$this->db->select('usuario');
		$this->db->where('usuario',$usuario);
		$consulta = $this->db->get('usuario');
		if ($consulta->num_rows()> 0) {
			# code...
			return true;
		}

	}

}

/* End of file Pais_Model.php */
/* Location: ./application/models/Pais_Model.php */