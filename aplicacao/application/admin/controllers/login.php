<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
    
     $this->load->model('admin_m');
    
 }
 
 function index()
 {
   		 if($this->session->userdata('logged_adm')){
   		  redirect('home', 'refresh');
   		  }else{
$this->load->view('login_view');
}
 }
 
 
 
 function verifylogin()
 {
   //aqui é feita a validação das credenciais
   
 
   $this->form_validation->set_rules('usuario', 'Usuário', 'trim|required');
   $this->form_validation->set_rules('senha', 'Senha', 'trim|required|callback_check_database');
 
   if($this->form_validation->run() == FALSE)
   {
     //validação falhou redicionado para a página de login
     $this->load->view('login_view');
   }
   else
   {
     //Validação ok!
   
      $username = $this->input->post('usuario');
	  $password = $this->input->post('senha');
	  $this->admin_m->login($username, $password);
      
      
   }
 
 }
 
 
    
 
 function check_database($password)
 {
   //verificação no banco de dados
   $username = $this->input->post('usuario');
   $password = $this->input->post('senha');
 
   //consulta
   $result = $this->admin_m->login($username, $password);
 
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'usuario' => $row->usuario
       );
       $this->session->set_userdata('logged_adm', $sess_array);
       redirect('home', 'refresh');
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
