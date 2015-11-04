<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Serv_m extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }



        public function inserir($dadoserv=NULL)
        {
		if($dadoserv!=NULL):
		
		$this->db->insert('servidor',$dadoserv);
		$this->session->set_flashdata('cadservok','Cadastro efetuado com sucesso');
		redirect('servidor/cadastrar');
		endif;
		
echo $this->db->affected_rows();
		
		
		}



	
public function atualizar($codserv=NULL)
    {
      if($codserv!=NULL):
      $this->db->where('codserv',$codserv);
      //$this->db->order_by('codcurso', 'ASC');
      $this->db->limit(1);
      return $this->db->get('servidor');
      
      else:
      
      return FALSE;
     
      endif; 
    }



public function atualizar_do($dados=NULL,$condicao=NULL)
    {
      if($dados!=NULL && $condicao!=NULL):
		
		$this->db->update('servidor',$dados,$condicao);
		
		 $this->session->set_flashdata('editarok','Alteração efetuada com sucesso');
		//redirect("curso/editar/$id");
		redirect(current_url());
		endif;
    }


public function deletar_do($condicao=NULL)
    {
      if($condicao!=NULL):
		$this->db->delete('servidor',$condicao);
		$this->session->set_flashdata('excluirok','Registro excluído com sucesso');
		
		redirect('servidor/listar');
		endif;
    }

	
	/*
public function do_pesquisa() {
  $match = $this->input->post('pesquisar');
  //$this->db->order_by('codserv', 'ASC');
  $this->db->like('nomeserv',$match);
  $this->db->or_like('sexo',$match);
  $this->db->or_like('siape',$match);
  $this->db->or_like('email',$match);
   $this->db->or_like('telcontato',$match);
   $this->db->or_like('nomechefe',$match);
   $this->db->or_like('emailchefe',$match);
    $this->db->or_like('ensino',$match);
    $this->db->or_like('setor',$match);
   $this->db->or_like('cargo',$match);
    $this->db->or_like('funcao',$match);
   //$this->db->limit(5);
   $query = $this->db->get('servidor');
   if ($query->num_rows() > 0)
        {
            return $query2->result();
        }
        else
        {
            return false;
        }
}
	
	*/
	function contaRegistros()
{
 return $this->db->count_all_results('servidor');
}
	
	function retornaServ($maximo, $inicio)
{
	 $match = $this->input->post('pesquisar');
  $this->db->order_by('nomeserv', 'ASC');
  $this->db->like('nomeserv',$match);
  $this->db->or_like('sexo',$match);
  $this->db->or_like('siape',$match);
  $this->db->or_like('email',$match);
  $this->db->or_like('telcontato',$match);
  $this->db->or_like('unidade',$match);
  $this->db->or_like('nomechefe',$match);
  $this->db->or_like('emailchefe',$match);
  $this->db->or_like('ensino',$match);
  $this->db->or_like('cidade',$match);
  $this->db->or_like('estado',$match);
  $this->db->or_like('bairro',$match);
  $this->db->or_like('cpfl',$match);
  $this->db->or_like('rgl',$match);
  $this->db->or_like('estcivil',$match);
  $this->db->or_like('setor',$match);
  $this->db->or_like('cargo',$match);
  $this->db->or_like('funcao',$match);
  // $this->db->limit($maximo);
 $query = $this->db->get('servidor', $maximo, $inicio);
 return $query->result();
}
	
}//endmodel



