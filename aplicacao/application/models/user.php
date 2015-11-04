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
            echo 'Voce nao tem permissao para entrar nessa pagina. <a href="http://localhost/test/aplicacao/">Efetuar Login</a>';
            die();
        }
    }
	
	
}



?>
