<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria_Model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		//Do your magic here
	}
	function check_categoria($categoria)
	{
		# code...
		$this->db->select('categoria');
		$this->db->where('categoria',$categoria);
		$consulta = $this->db->get('categoria');
		if ($consulta->num_rows()> 0) {
			# code...
			return true;
		}

	}
    
     function getCategoria($limit, $start)
     {
          $this->db->limit($limit, $start);
          $query = $this->db->get('categoria');
          return $query->result_array();
     }

     ////////////////////////////////////////////////

	 function add_categoria($categoria)
	{
		$data = array(
			"categoria" => $categoria
		 );
		$this->db->insert('categoria',$data);

	}
	 function edit ($id)
	{
			$this->db->where('id_categoria',$id);
			$query = $this->db->get('categoria');//mi consulta sql
			//VALIDAR SI TENEMOS REGISTRO 
			if ($query->num_rows() > 0) {
				return $query->result();
			} else
			{
				return false;
			}
	}
     function save_edit($id,$data)
    {
    	# code...
    	$this->db->where('id_categoria',$id);
		$this->db->update('categoria',$data);

    }
     function delete($id)
    {
    	# code...
    	$this->db->where('id_categoria',$id);
		$this->db->delete('categoria');//mi consulta sql
		$query = $this->db->get('categoria');//mi consulta sql
    }
     function get_bird($q)
    {
	    $this->db->select('bird');
	    $this->db->like('bird', $q);
	    $query = $this->db->get('birds');
	    if($query->num_rows > 0)
	    {
	      foreach ($query->result_array() as $row)
	      {
	        $row_set[] = htmlentities(stripslashes($row['bird'])); //build an array
	      }
	      echo json_encode($row_set); //format the array into json data
    	}
 	}
	

}

/* End of file Categoria_Model.php */
/* Location: ./application/models/Categoria_Model.php */