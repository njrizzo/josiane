	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Servidor extends CI_Controller {
	
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
	 $this->load->model('serv_m');
	  $this->load->model('user','',TRUE);
	   $this->user->logged();
	 
	}
	 
		
		
		public function index()
		
		{
			$datas['query2'] = $this->serv_m->do_pesquisa();
$this->load->view('servidor/serv_v', $datas);
		
	
		}
		public function cadastrar()
		
		{
		$this -> form_validation ->set_rules('nomeserv','NOME','required|max_length[100]');
		$this -> form_validation ->set_rules('sexo','sexo','required|max_length[100]');
		$this -> form_validation ->set_rules('dltnasc','Data de nascimento','required');
		$this -> form_validation ->set_rules('rgl','Identidade','required|numeric');
		$this -> form_validation ->set_rules('cpfl','CPF','required|numeric');
		$this -> form_validation ->set_rules('siape','SIAPE','required|numeric');
		$this -> form_validation ->set_rules('nacilonalidade','Nacilonalidade ','required');
		$this -> form_validation ->set_rules('naturalidade','Naturalidade ','required');
		$this -> form_validation ->set_rules('estcivil','Estado Civil ','required');
		$this -> form_validation ->set_rules('endereco','Rua ','required');
		$this -> form_validation ->set_rules('numcasa','Número da casa ','required');
		$this -> form_validation ->set_rules('bairro','Bairro','required');
		$this -> form_validation ->set_rules('cidade','Cidade','required');
		//$this -> form_validation ->set_rules('complemento','Complemento','required');
		$this -> form_validation ->set_rules('estado','Estado','required');
		$this -> form_validation ->set_rules('cep','CEP','required');
		$this -> form_validation ->set_rules('email','Email','required|valid_email');
		$this -> form_validation ->set_rules('telcontato','Telefone','required');
		$this -> form_validation ->set_rules('unidade','Unidade ','required');
		$this -> form_validation ->set_rules('setor','Setor','required');
		$this -> form_validation ->set_rules('funcao','Função','required');
		$this -> form_validation ->set_rules('cargo','Cargo ','required');
		$this -> form_validation ->set_rules('nomechefe','Nome do chefe','required');
		$this -> form_validation ->set_rules('emailchefe','Email do chefe','required|valid_email');
		$this -> form_validation ->set_rules('telchefe','Telefone do chefe','required');
		if ($this->form_validation->run() == FALSE)
	                {
	                        $this->load->view('servidor/serv_cad');
	                }
	                else
	                {
	                  
	                  $dadoserv=elements(array('nomeserv','sexo','dltnasc','rgl','cpfl','siape','nacilonalidade','naturalidade','estcivil','endereco','numcasa','bairro','cidade','complemento','estado','cep','email','telcontato','unidade','setor','funcao','cargo','nomechefe','emailchefe','telchefe','ensino'),$this->input->post());
	                  //$dadoserv['dltnasc'] = date('Y-m-d', strtotime($dadoserv['dltnasc']));
	                
	                   $this->serv_m->inserir($dadoserv);
	                    //echo "'.$dadoserv.'";
	             //echo "foi doutor";
	            // echo random_element($dadoserv);
	                
			$this->load->view('servidor/serv_cad');
	
	}
		
		}
		
		
		
	
	
		
	
		public function editar()
		{
			$this -> form_validation ->set_rules('nomeserv','NOME','required|max_length[100]');
		$this -> form_validation ->set_rules('sexo','sexo','required|max_length[100]');
		$this -> form_validation ->set_rules('dltnasc','Data de nascimento','required');
		$this -> form_validation ->set_rules('rgl','Identidade','required|max_length[15]');
		$this -> form_validation ->set_rules('cpfl','CPF','required|max_length[100]');
		$this -> form_validation ->set_rules('siape','SIAPE','required|max_length[100]');
		$this -> form_validation ->set_rules('nacilonalidade','Nacilonalidade ','required');
		$this -> form_validation ->set_rules('naturalidade','Naturalidade ','required');
		$this -> form_validation ->set_rules('estcivil','Estado Civil ','required');
		$this -> form_validation ->set_rules('endereco','Rua ','required');
		$this -> form_validation ->set_rules('numcasa','Número da casa ','required');
		$this -> form_validation ->set_rules('bairro','Bairro','required');
		$this -> form_validation ->set_rules('cidade','Cidade','required');
		//$this -> form_validation ->set_rules('complemento','Complemento','required');
		$this -> form_validation ->set_rules('estado','Estado','required');
		$this -> form_validation ->set_rules('cep','CEP','required');
		$this -> form_validation ->set_rules('email','Email','required');
		$this -> form_validation ->set_rules('telcontato','Telefone','required');
		$this -> form_validation ->set_rules('unidade','Unidade ','required');
		$this -> form_validation ->set_rules('setor','Setor','required');
		$this -> form_validation ->set_rules('funcao','Função','required');
		$this -> form_validation ->set_rules('cargo','Cargo ','required');
		$this -> form_validation ->set_rules('nomechefe','Nome do chefe','required');
		$this -> form_validation ->set_rules('emailchefe','Email do chefe','required');
		$this -> form_validation ->set_rules('telchefe','Telefone do chefe','required');
		    if ($this->form_validation->run() == FALSE)
	                {
	                        $this->load->view('servidor/serv_atu');
	                }
	                else
	                {
	                  
	                  $dados=elements(array('nomeserv','sexo','dltnasc','rgl','cpfl','siape','nacilonalidade','naturalidade','estcivil','endereco','numcasa','bairro','cidade','complemento','estado','cep','email','telcontato','unidade','setor','funcao','cargo','nomechefe','emailchefe','telchefe','ensino'),$this->input->post());
	                  
	                
	                $this->serv_m->atualizar_do($dados,array('codserv' => $this->input->post('$idserv')));
	             
	                
			$this->load->view('servidor/serv_atu');
	
	}
			}
			
			
	
			
			public function deletar()
		{
			 $this->load->view('servidor/serv_del');
			if($this->input->post('$idserv')>0):
	
		 $this->serv_m->deletar_do(array('codserv' => $this->input->post('$idserv')));
		 	// else:
		 	 //$this->curso_m->deletar_do(array('codcurso' => $this->input->post('$idcurso')));
		 endif;
		  
			}
	
	
	
		
	
	 public function pesquisar()
	{
	$datas['query2'] = $this->serv_m->do_pesquisa();
	$this->load->view('servidor/serv_v', $datas);
	}
	
	
	
	}
	
	
