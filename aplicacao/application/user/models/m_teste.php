

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_teste extends CI_Model{

function __construct()
{
parent::__construct();
}

public function retorna_curso()
{

 $this->db->order_by('codcurso', 'ASC');
 //$this->db->where('estado', 'ativo');
        $query = $this->db->get('curso');
        if ($query->num_rows() > 0)
        {
           
           foreach($query->result() as $row)
           $arrDatos[htmlspecialchars($row->codcurso, ENT_QUOTES)] = 
htmlspecialchars($row->nome, ENT_QUOTES);

        $query->free_result();
        return $arrDatos;
           
        }
        else
        {
            return false;
        }
	}

public function retorna_turma($essa) //funcão usada na hora de cadastrar novas turmas, apenas as turmas que ainda não começaram
{

 //$this->db->order_by('codturma', 'ASC');
 //$this->db->where('datainicio >=', 'now()'  );
       
      //  $this->db->select('*');
//$this->db->from('turma');
//$this->db->join('curso', 'curso.codcurso = turma.codcurso');
       //$id_departamento = $this->input->post("codcurso");
 
$this->db->where("codcurso", $essa);
       
        $query = $this->db->get('turma');
        if ($query->num_rows() > 0)
        {
           
           foreach($query->result() as $row)
           $arrDatos[htmlspecialchars($row->codturma, ENT_QUOTES)] = htmlspecialchars($row->nometurma, ENT_QUOTES);
           
        $query->free_result();
        return $arrDatos;
           
        }
        else
        {
            return false;
        }

}

}//endmodel



