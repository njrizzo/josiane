<?php
class Membership_model extends CI_Model {
public function __construct()
        {
                parent::__construct();
        }
    # VALIDA USUÁRIO
    function validate() {
		 $this -> db -> select('*');
		$this -> db -> from('membership');
        $this->db->where('username', $this->input->post('username')); 
        $this->db->where('password', md5($this->input->post('password')));
        $this->db->where('status', 1); // Verifica o status do usuário
$this -> db -> limit(1);
       
 $query2 = $this->db->get();
        if ($query2->num_rows == 1) { 
			return $query2->result();
            return true; // RETORNA VERDADEIRO
        }else
		{
			return false;
		}
    }

    # VERIFICA SE O USUÁRIO ESTÁ LOGADO
    function logged() {
        $logged = $this->session->userdata('logged');

        if (!isset($logged) || $logged != true) {
            echo 'Voce nao tem permissao para entrar nessa pagina. <a href="https://www.oficinadanet.com.br/login">Efetuar Login</a>';
            die();
        }
    }
}
