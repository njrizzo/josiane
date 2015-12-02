<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Turma_m extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }

//função que retorna os cursos ativos na hora de cadastrar novas turmas
public function retorna_curso()
{

 $this->db->order_by('codcurso', 'ASC');
 $this->db->where('estado', 'ativo');
        $query = $this->db->get('curso');
        if ($query->num_rows() > 0)
        {
           
           foreach($query->result() as $row)
           $arrDatos[htmlspecialchars($row->codcurso, ENT_QUOTES)] = 
htmlspecialchars($row->modulo, ENT_QUOTES);

        $query->free_result();
        return $arrDatos;
           
        }
        else
        {
            return false;
        }

}




//função que retorna todos os cursos existente na hora de atualizar novas turmas
public function retorna_curso_all()
{

 $this->db->order_by('codcurso', 'ASC');

        $query = $this->db->get('curso');
        if ($query->num_rows() > 0)
        {
           
           foreach($query->result() as $row)
           $arrDatos[htmlspecialchars($row->codcurso, ENT_QUOTES)] = 
htmlspecialchars($row->modulo, ENT_QUOTES);

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
		
			  
		$this->db->insert('turma',$dados);
	
		$this->session->set_flashdata('cadastrook','Cadastro efetuado com sucesso');
		redirect('turma/cadastrar');
		endif;
		
echo $this->db->affected_rows();
		
		
		}




	
public function atualizar($codturma=NULL)
    {
      if($codturma!=NULL):
      $this->db->where('codturma',$codturma);
      //$this->db->order_by('codcurso', 'ASC');
      $this->db->limit(1);
      $this->db->select('*');
$this->db->from('turma');
$this->db->join('curso', 'curso.codcurso = turma.codcurso');
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
		
		$this->db->update('turma',$dados,$condicao);
		
		 $this->session->set_flashdata('editarok','Alteração efetuada com sucesso');
		
		redirect(current_url());
		endif;
    }


public function deletar_do($condicao=NULL)
    {
      if($condicao!=NULL):
		$this->db->delete('turma',$condicao);
		$this->session->set_flashdata('excluirok','Registro excluído com sucesso');
		
		redirect('turma/listar');
		endif;
    }

		function contaRegistros()
{
 return $this->db->count_all_results('turma');
}
	
public function do_pesquisa($maximo, $inicio) {
  $match = $this->input->post('pesquisar');
  
     
  $this->db->order_by('datainicio', 'desc');
  $this->db->or_like('nometurma',$match);
  $this->db->or_like('diasemana',$match);
  $this->db->or_like('nome',$match);
 
  $this->db->select('*');
  $this->db->from('curso');
  $this->db->join('turma', 'curso.codcurso = turma.codcurso');
  $this->db->limit($maximo,$inicio);


 $query2 = $this->db->get();
return $query2->result();
       

}
	
	
	
	
	
	
	
}//fimmodel



