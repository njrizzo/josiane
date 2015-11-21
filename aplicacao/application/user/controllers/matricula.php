<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matricula extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct() {
        parent::__construct();
 $this->load->model('matricula_m');
 $this->load->model('serv_m','',TRUE);
   $this->serv_m->logged();
   
 
}
 
	

	public function index()
	
	{
	


redirect('matricula/listar');



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
	$maximo = 2;
	$inicio = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");
	$config['base_url'] = base_url('matricula/listar');
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

