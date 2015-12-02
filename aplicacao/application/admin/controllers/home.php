<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
   $this->load->model('admin_m','',TRUE);
   $this->admin_m->logged();
 }
 
 function index()
 {
	
	 $session_data = $this->session->userdata('logged_adm');
     $data['usuario'] = $session_data['usuario'];
     $this->load->view('menu', $data);
	
 }

 function logout()
 {
   $this->session->unset_userdata('logged_adm');
  // $this->session->sess_destroy('logged_adm');
   //session_destroy('logged_adm');
   redirect('login', 'refresh');
 }
 


public function creditos(){
	$this->load->view('creditos_view');
	
	}

 }//fimcontroler
?>
