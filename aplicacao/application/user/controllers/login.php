<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
    
     $this->load->model('serv_m','serv_m');
     
 }
 
 function index()
 {
   		 if($this->session->userdata('logged_in')){
   		  Redirect('home', 'Refresh');
   		  }else{
$this->load->view('login_view');
}
 }
 
 
 
 function verifylogin()
 {
   //aqui é feita a validação das credenciais
   
 
   $this->form_validation->set_rules('cpf', 'CPF', 'trim|required');
   $this->form_validation->set_rules('senha', 'Senha', 'trim|required|callback_check_database');
 
   if($this->form_validation->run() == FALSE)
   {
     //validação falhou redicionado para a página de login
     $this->load->view('login_view');
   }
   else
   {
     //Validação ok!
   
      $username = $this->input->post('cpf');
	  $password = $this->input->post('senha');
	  $this->serv_m->login($username, $password);
      
      
   }
 
 }
 
 
   //checando senha no BD 
 
 function check_database($password)
 {
   //verificação no banco de dados
   $username = $this->input->post('cpf');
   $password = $this->input->post('senha');
 
   //consulta
   $result = $this->serv_m->login($username, $password);
 
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'codserv' => $row->codserv,
         'cpfl' => $row->cpfl,
         'nomeserv' => $row->nomeserv
         
       );
       $this->session->set_userdata('logged_in', $sess_array);
       Redirect('home', 'Refresh');
     }
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Usuário ou senha inválidos.');
     return false;
   }
 }
 
 
 
 
}//endcontroler


 

 
?>
