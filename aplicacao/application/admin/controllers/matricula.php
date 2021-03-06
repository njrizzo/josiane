<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matricula extends CI_Controller {

	
	public function __construct() {
        parent::__construct();
 $this->load->model('Matricula_m','matricula_m');

    $this->load->model('Admin_m','admin_m',TRUE);
   $this->admin_m->logged();
   
 
}
 
	

	public function index()
	
	{
	


Redirect('matricula/listar');



	}
	
	
	public function cadastrar()
	
	{
	$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
	$this -> form_validation ->set_rules('datamat','DATA','trim|required');
	$this -> form_validation ->set_rules('situacao','Estado','trim|required');
	$this -> form_validation ->set_rules('codserv','Servidor','trim|required');
	$this -> form_validation ->set_rules('codturma','Turma','trim|required');
	
	    if ($this->form_validation->run() == FALSE)
                {
					        $turmas = $this->matricula_m->retorna_turma();
							
                        	
	$option = "<option value=''></option>";
	foreach($turmas -> result()  as $linha) {
	$option .= "<option value='$linha->codturma' >$linha->nometurma</option>";			
		}
				$datav['options_turmas'] = $option;

		
		
                        	$this->load->view('matricula/matri_cad', $datav);
                        	

                       
                }
                else
                {
					
                     $dados=elements(array('datamat','codserv','situacao','codturma'), $this ->input->post());
                  
              
                    $this->matricula_m->inserir($dados);
             
                
		$this->load->view('matricula/matri_cad',$data);

}
	
	
	}
	//retorna os servidores inscritos de acordo com a turma selecionada
	public function busca_servidores_inscritos($id){
		
	
		
		$servidores = $this->matricula_m->retorna_serv_turma();
		
		$option = "<option value=''></option>";
		foreach($servidores -> result() as $linha) {
			$option .= "<option value='$linha->codserv'>$linha->nomeserv</option>";			
		}
		
		echo $option;
	}
	
	

	


	public function editar()
	{
	$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
	$this -> form_validation ->set_rules('datamat','DATA','trim|required');
	$this -> form_validation ->set_rules('situacao','Estado','trim|required');
	$this -> form_validation ->set_rules('codserv','Servidor','trim|required');
	$this -> form_validation ->set_rules('codturma','Turma','trim|required');

	    if ($this->form_validation->run() == FALSE)
                {
					$datav['servs'] = $this->matricula_m->retorna_serv();
                        	$datav['turmas'] = $this->matricula_m->retorna_turma();
                        	$this->load->view('matricula/matri_atu', $datav);
					
                }
                else
                {
             $dados=elements(array('datamat','codserv','situacao','codturma'), $this ->input->post());
                  
                  
                
                $this->matricula_m->atualizar_do($dados,array('codmatricula' => $this->input->post('$idmatri')));
             
                
		$this->load->view('matricula/matri_atu', $datav);

}
		}
		
		
		

		
		public function deletar()
	{
		$datav['servs'] = $this->matricula_m->retorna_serv();
                        	$datav['turmas'] = $this->matricula_m->retorna_turma_del();
                        	$this->load->view('matricula/matri_del', $datav);
		
   
		if($this->input->post('$idmatri')>0):

	 $this->matricula_m->deletar_do(array('codmatricula' => $this->input->post('$idmatri')));
	 
	 endif;
	  
		}

public function listar(){
			
			
			 $this->load->library('pagination');
	$maximo = 8;
	$inicio = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");
	$config['base_url'] = base_url('administrador.php/matricula/listar');
	$config['total_rows'] =$this->matricula_m->contaRegistros();
	$config['per_page'] =  $maximo;
	//$config['first_link'] = 'Primeiro';
	//$config['last_link'] = 'Último';
	$config['next_link'] = 'Próximo';
	$config['prev_link'] = 'Anterior';
	$this->pagination->initialize($config);
	
	$datas['page'] = $this->pagination->create_links();
	$datas['query2'] = $this->matricula_m->do_pesquisa($maximo, $inicio);
					
	$this->load->view('matricula/matri_v', $datas);
	
			
			
			}//fimfuncao




	


	
}//endcontroler

