<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Teste_m extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }


/*
        public function inserir($dados=NULL)
        {
		if($dados!=NULL):
		
		$this->db->insert('curso',$dados);
		endif;
		$sql = "INSERT INTO curso (nome, modulo, descricao, cargahr, areatema, competencia, estado ) VALUES (".$this->db->escape($nome).", ".$this->db->escape($modulo).", ".$this->db->escape($descricao).", ".$this->db->escape($cargahr).", ".$this->db->escape($areatema).", ".$this->db->escape($competencia).", ".$this->db->escape($estado).")";
$this->db->query($sql);
echo $this->db->affected_rows();
		
		
		}

   public function inserir()
        {
		
	$sql = "INSERT INTO curso (nome, modulo, descricao, cargahr, areatema, competencia, estado ) VALUES (".$this->db->escape($nome).", ".$this->db->escape($modulo).", ".$this->db->escape($descricao).", ".$this->db->escape($cargahr).", ".$this->db->escape($areatema).", ".$this->db->escape($competencia).", ".$this->db->escape($estado).")";
$this->db->query($sql);
echo $this->db->affected_rows();
		
		
		}


*/



function get_dad()
    {
       
        $query = $this->db->get('curso');
        if ($query->num_rows() > 0)
        {
            return $query->result();
        }
        else
        {
            return false;
        }
    }
	

}



