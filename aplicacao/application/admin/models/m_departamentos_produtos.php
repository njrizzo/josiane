<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_departamentos_produtos extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	public function retorna_departamentos()
	{
		//$this->db->order_by("departamentos_nome", "asc");
		$consulta = $this->db->get("curso");
		
		return $consulta;
	}
	
	public function retorna_produtos_by_departamento() {
		
		$id_departamento = $this->input->post("id_departamento");
		
		$this->db->where("codcurso", $id_departamento);
		
		//$this->db->order_by("produtos_nome", "asc");
		
		$consulta = $this->db->get("turma");
		
		return $consulta;
	}
}

