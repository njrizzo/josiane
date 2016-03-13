<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Matricula_m extends CI_Model {

        public function __construct()
        {
                parent::__construct();
               
        }

//função que retorna o nome do servidor
public function retorna_serv()
{


        $query = $this->db->query("select s.codserv, nomeserv  from servidor s, inscricao i where s.codserv=i.codserv and situacao ='autorizado'");
      
        if ($query->num_rows() > 0)
        {
           
           foreach($query->result() as $row)
           $arrDatos[$row->codserv] = $row->nomeserv;

        $query->free_result();
        return $arrDatos;
           
        }
        else
        {
            return false;
        }

}

//funcao que retorna turmas abertas 
public function retorna_turma()
{

 $this->db->order_by('codturma', 'ASC');
 $this->db->where('datainicio >=', 'now()'  );
        $query = $this->db->get('turma');
        if ($query->num_rows() > 0)
        {
           
           foreach($query->result() as $row)
           $arrDatos[$row->codturma] = $row->nometurma;

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

     return $this->db->get();
       
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



//funcao auxilir paginacao
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





//funcao paginacao	
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
	
	
//insere a chave no banco de dados para gerar certificados	
public function chave_inserir($dados=NULL)
        {
		if($dados!=NULL):
		
		$this->db->insert('certificados',$dados);
		//$this->session->set_flashdata('editarok','Alteração efetuada com sucesso');
		///Redirect('cadastro/enviarEmail');
		endif;
		
echo $this->db->affected_rows();
		
		
		}





//autenticar certificados
function verificarChave	($chave)
	{
		$this -> db -> select('*');
		$this -> db -> from('certificados');
		$this -> db -> like('chave' ,$chave, 'none'); 
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
		{
			return $query->result();

		}
		else
		{
			return false;
		}
	}
	
	
	
}//endmoodel



