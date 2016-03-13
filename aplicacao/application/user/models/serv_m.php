<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Serv_m extends CI_Model {

        public function __construct()
        {
                parent::__construct();
        }

//confere senha para acesso ao sistema
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
	
	
	
	//usuario logado
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
		Redirect('cadastro/cadastrar');
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
		
		Redirect(current_url());
		endif;
    }




/*
public function deletar_do($condicao=NULL)
    {
      if($condicao!=NULL):
		$this->db->delete('servidor',$condicao);
		$this->session->set_flashdata('excluirok','Registro excluído com sucesso');
		
		Redirect('servidor/listar');
		endif;
    }

*/

//confere a senha antiga para fazer a alteraçao
	
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
	
	
	
	
	
	//confere o siape do chefe para fazer autorizacao de inscricao
	function confereSiape($siape, $chefesiape)
	{
		$this -> db -> select('*');
		$this -> db -> from('servidor');
		$this -> db -> where('siape = ' . "'" . $siape. "'"); 
		$this -> db -> where('siapechefe = ' . "'" . $chefesiape. "'"); 
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
	
	
	
	
	
	
	//confere se email esta cadastrado no sistema e envia recuperacao de senha
	function confereEmail($email)
	{
		$this -> db -> select('*');
		$this -> db -> from('servidor');
		$this -> db -> or_like('email' ,$email); 
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
	
	
	



//insere a chave de conferencia no bd
public function recuperar_inserir($dados=NULL)
        {
		if($dados!=NULL):
		
		$this->db->insert('recuperacao',$dados);
		
		Redirect('cadastro/enviarEmail');
		endif;
		
echo $this->db->affected_rows();
		
		
		}
	
	




function retorna_last_recuperacao()//funcao que retorna a ultima inserção na tabela recuperacao e envia email para o servidor com um link
{
	
	$this->db->order_by('codrec', 'DESC'); 
 $this->db->select('*');
$this->db->from('recuperacao');
$this->db->join('servidor','email = utilizador');

	$this->db->limit(1);
 //return $this->db->get();
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
	
	
		function verificarChave($chave)//funcao que confere se a chave de recuperacao existe
{
	
	$this -> db -> select('*');
		$this -> db -> from('recuperacao');
		$this -> db -> where('confirmacao' ,$chave); 
		$this -> db -> where('data  >' , 'now()'); 
		$this -> db -> limit(1);
		$query = $this->db->get();
 
		if($query -> num_rows() == 1)
		{
			
			//$this->db->delete('recuperacao',' confirmacao = ' . "'" . $chave. "'");
			//$this->db->query('delete from recuperacao where confirmacao = "$chave" ');
			return $query->result();
			
		}
		else
		{
			return false;
		}

}
	
	
	
	//insere a nova senha recuperada
	public function modificar_do($dados=NULL,$condicao=NULL,$chave)
    {
      if($dados!=NULL && $condicao!=NULL):
		$this->db->delete('recuperacao',' confirmacao = ' . "'" . $chave. "'");
		$this->db->update('servidor',$dados,$condicao);

		 $this->session->set_flashdata('recuperarok','Nova senha cadastrada com sucesso!');
		
		Redirect(current_url());


		endif;
    }




function apagarChave($chave)//funcao que apaga a chave de recuperacao existente
{
	
	
			
			$this->db->delete('recuperacao',' confirmacao = ' . "'" . $chave. "'");
			//$this->db->query('delete from recuperacao where confirmacao = "$chave" ');
			//return $query->result();
			
		

}
	
}//endmodel



