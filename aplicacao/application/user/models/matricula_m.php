<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Matricula_m extends CI_Model {

        public function __construct()
        {
                parent::__construct();
                //$this->load->helper('date');
        }

//função que retorna os servidore com inscricao cadastradas na hora de cadastrar nova matricula
public function retorna_serv()
{


        $query = $this->db->query("select s.codserv, nomeserv  from servidor s, inscricao i where s.codserv=i.codserv and situacao ='autorizado'");
      
        if ($query->num_rows() > 0)
        {
           
           foreach($query->result() as $row)
           $arrDatos[htmlspecialchars($row->codserv, ENT_QUOTES)] = 
htmlspecialchars($row->nomeserv, ENT_QUOTES);

        $query->free_result();
        return $arrDatos;
           
        }
        else
        {
            return false;
        }

}

public function retorna_turma()
{

 $this->db->order_by('codturma', 'ASC');
 $this->db->where('datainicio >=', 'now()'  );
        $query = $this->db->get('turma');
        if ($query->num_rows() > 0)
        {
           
           foreach($query->result() as $row)
           $arrDatos[htmlspecialchars($row->codturma, ENT_QUOTES)] = 
htmlspecialchars($row->nometurma, ENT_QUOTES);

        $query->free_result();
        return $arrDatos;
           
        }
        else
        {
            return false;
        }

}








      




	
public function atualizar($codmatricula=NULL)
    {
      if($codmatricula!=NULL):
      $this->db->where('codmatricula',$codmatricula);
      //$this->db->order_by('codcurso', 'ASC');
      $this->db->limit(1);
      $this->db->select('*');
$this->db->from('matricula');
$this->db->join('turma', ' turma.codturma = matricula.codturma');
$this->db->join('servidor', ' servidor.codserv = matricula.codserv');
$this->db->join('curso', ' curso.codcurso = turma.codcurso');
//$query = $this->db->get();
     return $this->db->get();
       //return $this->db->query('select * from curso c, turma t  ');
      else:
      
      return FALSE;
     
      endif; 
    }





public function deletar_do($condicao=NULL)
    {
      if($condicao!=NULL):
		$this->db->delete('matricula',$condicao);
		$this->session->set_flashdata('excluirok','Registro excluído com sucesso');
		
		redirect('matricula/listar');
		endif;
    }

				function contaRegistros($serv)
{
	 
 $this->db->select('*');
$this->db->from('matricula');
$this->db->join('turma', ' turma.codturma = matricula.codturma');
$this->db->join('servidor', ' servidor.codserv = matricula.codserv');
$this->db->join('curso', ' curso.codcurso = turma.codcurso');
$this->db->where('matricula.codserv',$serv);
 return $this->db->count_all_results();
}
	
public function do_pesquisa($maximo, $inicio, $codserv) {
  
 $this->db->select('*');
$this->db->from('matricula');
$this->db->join('turma', ' turma.codturma = matricula.codturma');
$this->db->join('servidor', ' servidor.codserv = matricula.codserv');
$this->db->join('curso', ' curso.codcurso = turma.codcurso');
$this->db->where('matricula.codserv',$codserv);
$this->db->order_by('datamat', 'desc');
$this->db->limit($maximo,$inicio);
$query2 = $this->db->get();
 
   if ($query2->num_rows() > 0)
        {
            return $query2->result();
        }
        else
        {
            return false;
        }
}
	
	
	
	
	
	
}



