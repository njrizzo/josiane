<?php
Class User extends CI_Model
{
	
	public function __construct()
        {
                parent::__construct();
        }
	function login($username, $password)
	{
		$this -> db -> select('*');
		$this -> db -> from('users');
		$this -> db -> where('username = ' . "'" . $username . "'"); 
		$this -> db -> where('password = ' . "'" . MD5($password) . "'"); 
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
	
	
	
	public function inserir($dados=NULL)
        {
		if($dados!=NULL):
		
		$this->db->insert('users',$dados);
		$this->session->set_flashdata('cadastrook','Cadastro efetuado com sucesso');
		redirect('administrador/cadastrar');
		endif;
		
echo $this->db->affected_rows();
		
		
		}
	
	
	
	
	
	
	public function do_pesquisa() {
 
   $query2 = $this->db->get('users');
   if ($query2->num_rows() > 0)
        {
            return $query2->result();
        }
        else
        {
            return false;
        }
}
	
		
public function atualizar($codcurso=NULL)
    {
      if($codcurso!=NULL):
      $this->db->where('id',$codcurso);
     
      $this->db->limit(1);
     
      return   $this->db->get('users');
      
      
     
      
      else:
      
      return FALSE;
     
      endif; 
    }



public function atualizar_do($dados=NULL,$condicao=NULL)
    {
      if($dados!=NULL && $condicao!=NULL):
		
		$this->db->update('users',$dados,$condicao);
		
		 $this->session->set_flashdata('editarok','Alteração efetuada com sucesso');
		
		redirect(current_url());
		endif;
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
public function deletar_do($condicao=NULL)
    {
      if($condicao!=NULL):
		$this->db->delete('users',$condicao);
		$this->session->set_flashdata('excluirok','Registro excluído com sucesso');
		
		redirect('administrador/listar');
		
		endif;
    }
	
	
	
	
	
}//endmodel



?>
