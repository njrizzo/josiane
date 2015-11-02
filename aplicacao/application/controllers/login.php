<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
class Login extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
    //$this->load->model('user','',TRUE);
     $this->load->model('user');
    
 }
 
 function index()
 {
   		 

   $this->load->view('login_view');
 }
 
 
 
 function verifylogin()
 {
   //This method will have the credentials validation
   
 
   $this->form_validation->set_rules('username', 'Usuário', 'trim|required');
   $this->form_validation->set_rules('password', 'Senha', 'trim|required|callback_check_database');
 
   if($this->form_validation->run() == FALSE)
   {
     //Field validation failed.  User redirected to login page
     $this->load->view('login_view');
   }
   else
   {
     //Go to private area
     //redirect('home', 'refresh');
     // $this->load->view('home_view');
      $username = $this->input->post('username');
   $password = $this->input->post('password');
 $this->user->login($username, $password);
      
      
   }
 
 }
 
 
    
 
 function check_database($password)
 {
   //Field validation succeeded.  Validate against database
   $username = $this->input->post('username');
   $password = $this->input->post('password');
 
   //query the database
   $result = $this->user->login($username, $password);
 
   if($result)
   {
     $sess_array = array();
     foreach($result as $row)
     {
       $sess_array = array(
         'id' => $row->id,
         'username' => $row->username
       );
       $this->session->set_userdata('logged_in', $sess_array);
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
}


 

 
?>
