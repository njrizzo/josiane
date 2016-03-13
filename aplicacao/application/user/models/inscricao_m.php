<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Inscricao_m extends CI_Model {

        public function __construct()
        {
                parent::__construct();
              
        }
//não permite acesso direto ao link de autorizacao de inscricoes
	 function logged() {
        $logged = $this->session->userdata('loggedd');

        if (!isset($logged) || $logged != true) {
            echo 'Voce nao tem permissao para entrar nessa pagina.';
          // Redirect('login', 'Refresh');
            die();
        }
    }







public function retorna_curso()//retorna os cursos ativos
{

		


 $this->db->order_by('codcurso', 'ASC');
 $this->db->where('estado', 'ativo');
       $consulta = $this->db->get('curso');
        return $consulta;
	}




	
	
	
	
	
	
	
	
	
public function retorna_turma() //funcão usada na hora da inscrição para retornar as turmas abertas de acordo com o curso escolhido
{

$codigo = $this->input->post("codigo");
		
            
            
 $this->db->order_by('codturma', 'ASC');
 $this->db->where('datainicio >=', 'now()'  );
 $this->db->where('codcurso', $codigo);
 
$consulta = $this->db->get("turma");
		
		return $consulta; 

}
	
	
	
	


public function retorna_turma_all() //funcão usada na hora de editar turmas, retorna todas as turmas que ainda não encerraram
{

 $this->db->order_by('codturma', 'ASC');
$this->db->where('datafim >=', 'now()'  );
        $query = $this->db->get('turma');
      
        if ($query->num_rows() > 0)
        {
           
           foreach($query->result() as $row)
           $arrDatos[$row->codturma] =$row->nometurma;

        $query->free_result();
        return $arrDatos;
           
        }
        else
        {
            return false;
        }

}



public function retorna_turma_del() //funcão usada na hora de deletar inscrições, retorna a turma da inscrição
{

 $this->db->order_by('codturma', 'ASC');
        $query = $this->db->get('turma');
       
        if ($query->num_rows() > 0)
        {
           
           foreach($query->result() as $row)
           $arrDatos[$row->codturma] =$row->nometurma;

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
		
			  
		$this->db->insert('inscricao',$dados);
	
		
		Redirect('inscricao/send_mail');
		
		endif;
		
echo $this->db->affected_rows();
		
		
		}

function retorna_last_inscricao()//funcao que retorna a ultima inscricao e envia email para o servidor e para o chefe
{
	
	$this->db->order_by('codinscricao', 'DESC'); 
 $this->db->select('*');
$this->db->from('inscricao');
$this->db->join('turma', ' turma.codturma = inscricao.codturma');
$this->db->join('servidor', ' servidor.codserv = inscricao.codserv');
$this->db->join('curso', ' curso.codcurso = turma.codcurso');
	$this->db->limit(1);

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


	
public function atualizar($codinscricao=NULL)
    {
      if($codinscricao!=NULL):
      $this->db->where('codinscricao',$codinscricao);
      //$this->db->order_by('codcurso', 'ASC');
      $this->db->limit(1);
      $this->db->select('*');
$this->db->from('inscricao');
$this->db->join('turma', ' turma.codturma = inscricao.codturma');
$this->db->join('servidor', ' servidor.codserv = inscricao.codserv');

     return $this->db->get();
      
      else:
      
      return FALSE;
     
      endif; 
    }



public function atualizar_do($dados=NULL,$condicao=NULL)
    {
      if($dados!=NULL && $condicao!=NULL):
		
		$this->db->update('inscricao',$dados,$condicao);
		
		 $this->session->set_flashdata('editarok','Alteração efetuada com sucesso');
		 $this->session->set_flashdata('ok', 'Resposta salva com sucesso!');

		Redirect(current_url());

		endif;
    }


public function deletar_do($condicao=NULL)
    {
      if($condicao!=NULL):
		$this->db->delete('inscricao',$condicao);
		$this->session->set_flashdata('excluirok','Inscriçaõ cancelada com sucesso');
		
		Redirect('inscricao/listar');
		endif;
    }
//funcao que retorna a ultima inscricao e envia email para o servidor e para o chefe
			function contaRegistros($serv)
{
	
	
	$this->db->select('*');
$this->db->from('inscricao');
$this->db->join('turma', ' turma.codturma = inscricao.codturma');
$this->db->join('servidor', ' servidor.codserv = inscricao.codserv');
$this->db->join('curso', ' curso.codcurso = turma.codcurso');
$this->db->where('inscricao.codserv',$serv);
 return $this->db->count_all_results();
}
	
	
	
	
	
//paginacao	
public function do_pesquisa($maximo, $inicio, $codserv) {

  

   
 $this->db->select('*');
$this->db->from('inscricao');
$this->db->join('turma', ' turma.codturma = inscricao.codturma');
$this->db->join('servidor', ' servidor.codserv = inscricao.codserv');
$this->db->join('curso', ' curso.codcurso = turma.codcurso');
$this->db->where('inscricao.codserv',$codserv);
 $this->db->order_by('datains', 'desc');
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
	
	
	
	
	
	
	
	
	
	

	
		
	
	
	
}//end



