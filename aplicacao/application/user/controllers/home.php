<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->model('serv_m','',TRUE);
   $this->serv_m->logged();
   
	 
 }
 
 function index()
 {
	 $session_data = $this->session->userdata('logged_in');
     $data['cpfl'] = $session_data['cpfl'];
     $data['codserv'] = $session_data['codserv'];
      $data['nomeserv'] = $session_data['nomeserv'];
     $this->load->view('menu', $data);
	
 }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('login', 'refresh');
 }
 


public function dados(){
	 $session_data = $this->session->userdata('logged_in');
  
     $data['codserv'] = $session_data['codserv'];
 
	$this->load->view('servidor/dados_view', $data);
	
	}

 }//fimcontroler
?>
