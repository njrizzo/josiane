<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matricula extends CI_Controller {

	
	public function __construct() {
        parent::__construct();
 $this->load->model('matricula_m','matricula_m');
 $this->load->model('Serv_m','serv_m',TRUE);
   $this->serv_m->logged();
   
 
}
 
	

	public function index()
	
	{
	


Redirect('matricula/listar');



	}
	
	
	
	
	
	
	

	


	
		
		
		

		
		public function deletar()
	{
		$datav['servs'] = $this->matricula_m->retorna_serv();
                        	$datav['turmas'] = $this->matricula_m->retorna_turma();
                        	$this->load->view('matricula/matri_del', $datav);
		
   
		if($this->input->post('$idmatri')>0):

	 $this->matricula_m->deletar_do(array('codmatricula' => $this->input->post('$idmatri')));
	 
	 endif;
	  
		}

public function listar(){
			
			
	 $session_data = $this->session->userdata('logged_in');
  
     $datas['codserv'] = $session_data['codserv'];

			 $this->load->library('pagination');
	$maximo = 8;
	$inicio = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");
	$config['base_url'] = base_url('usuario.php/matricula/listar');
	$config['total_rows'] =$this->matricula_m->contaRegistros($datas['codserv']);
	$config['per_page'] =  $maximo;
	//$config['first_link'] = 'Primeiro';
	//$config['last_link'] = 'Último';
	$config['next_link'] = 'Próximo';
	$config['prev_link'] = 'Anterior';
	$this->pagination->initialize($config);
	
	$datas['page'] = $this->pagination->create_links();
	$datas['query2'] = $this->matricula_m->do_pesquisa($maximo, $inicio, $datas['codserv']);
					
	$this->load->view('matricula/matri_v', $datas);
	
			
			
			}//fimfuncao







	


	
}//endcontroler

