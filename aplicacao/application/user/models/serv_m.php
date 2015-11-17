<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Serv_m extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }


function login($username, $password)
	{
		$this -> db -> select('*');
		$this -> db -> from('servidor');
		$this -> db -> where('cpfl = ' . "'" . $username . "'"); 
		$this -> db -> where('senha = ' . "'" . MD5($password) . "'"); 
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
		{
			return $query->result();
			echo $this->db->affected_rows();
		}
		else
		{
			return false;
		}


	}
	
	
	
	
	 function logged() {
        $logged = $this->session->userdata('logged_in');

        if (!isset($logged) || $logged != true) {
            echo 'Voce nao tem permissao para entrar nessa pagina.';
            echo anchor('', 'Efetuar Login');
            die();
        }
    }
	
      
		
		

 public function inserir_user($dadoserv=NULL)
        {
		if($dadoserv!=NULL):
		
		$this->db->insert('servidor',$dadoserv);
		$this->session->set_flashdata('cadservok','Cadastro efetuado com sucesso');
		redirect('cadastro/cadastrar');
		endif;
		
echo $this->db->affected_rows();
		
		
		}

	
public function atualizar($codserv=NULL)
    {
      if($codserv!=NULL):
      $this->db->where('codserv',$codserv);
     
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
	
	
	
		public function confere_senha($senha=NULL)
    {
      if($senha!=NULL):
      
		$this -> db -> select('*');
		$this -> db -> from('servidor');
	 
		$this -> db -> where('senha = ' . "'" . MD5($senha) . "'"); 
		$this -> db -> limit(1);

		$query = $this -> db -> get();

		if($query -> num_rows() == 1)
		{
			return $query->result();
			echo $this->db->affected_rows();
		}
		else
		{
			return false;
		}
		endif;
    }
	
	
	
}//endmodel



