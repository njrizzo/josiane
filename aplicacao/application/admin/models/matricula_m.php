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

public function retorna_turma()//funcão usada na hora de cadastrar matricula, retorna todas as turmas que ainda não começaram
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

public function retorna_turma_del()//funcão usada na hora de deletar,  retorna a turma da matricula
{

 $this->db->order_by('codturma', 'ASC');

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









        public function inserir($dados=NULL)
        {
		if($dados!=NULL):
		
			  
		$this->db->insert('matricula',$dados);
	
		$this->session->set_flashdata('cadastrook','Matricula efetuada com sucesso');
		redirect('matricula/cadastrar');
		endif;
		
echo $this->db->affected_rows();
		
		
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



public function atualizar_do($dados=NULL,$condicao=NULL)
    {
      if($dados!=NULL && $condicao!=NULL):
		
		$this->db->update('matricula',$dados,$condicao);
		
		 $this->session->set_flashdata('editarok','Alteração efetuada com sucesso');
		
		redirect(current_url());
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

				function contaRegistros()
{
 return $this->db->count_all_results('matricula');
}
	
public function do_pesquisa($maximo, $inicio) {
  $match = $this->input->post('pesquisar');
  
     
     $this->db->order_by('datamat', 'desc');
  $this->db->or_like('situacao',$match);
  $this->db->or_like('nometurma',$match);
  $this->db->or_like('nome',$match);
  $this->db->or_like('modulo',$match);
  $this->db->or_like('nomeserv',$match);
  $this->db->or_like('setor',$match);
  $this->db->or_like('unidade',$match);
  $this->db->or_like('cargo',$match);
  $this->db->or_like('ensino',$match);
  $this->db->or_like('funcao',$match);
  $this->db->or_like('siape',$match);
  $this->db->or_like('bairro',$match);
  $this->db->or_like('nomechefe',$match);
  $this->db->or_like('emailchefe',$match);
  $this->db->or_like('ensino',$match);
  $this->db->or_like('cidade',$match);
  $this->db->or_like('servidor.estado',$match);
  $this->db->or_like('cpfl',$match);
  $this->db->or_like('rgl',$match);
  $this->db->or_like('estcivil',$match);
$this->db->select('*');
$this->db->from('matricula');
$this->db->join('turma', ' turma.codturma = matricula.codturma');
$this->db->join('servidor', ' servidor.codserv = matricula.codserv');
$this->db->join('curso', ' curso.codcurso = turma.codcurso');
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



