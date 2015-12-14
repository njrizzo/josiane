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
	 $this->load->model('admin_m','',TRUE);
	 $this->admin_m->logged();
	 
	}
	 
		
		
		public function index()
		
		{
		
redirect('servidor/listar');
		
	
		}
		public function cadastrar()
		
		{
			$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
		$this -> form_validation ->set_rules('nomeserv','NOME','required|max_length[100]|trim');
		$this -> form_validation ->set_rules('sexo','sexo','required|max_length[100]|trim');
		$this -> form_validation ->set_rules('dltnasc','Data de nascimento','required|trim');
		$this -> form_validation ->set_rules('rgl','Identidade','required|numeric|max_length[9]|trim');
		$this -> form_validation ->set_rules('cpfl','CPF','required|numeric|max_length[11]|trim|is_unique[servidor.cpfl]');
		$this -> form_validation ->set_rules('siape','SIAPE','required|numeric|trim');
		$this -> form_validation ->set_rules('nacilonalidade','Nacilonalidade ','required|trim');
		$this -> form_validation ->set_rules('naturalidade','Naturalidade ','required|trim');
		$this -> form_validation ->set_rules('estcivil','Estado Civil ','required|trim');
		$this -> form_validation ->set_rules('endereco','Rua ','required|trim');
		$this -> form_validation ->set_rules('numcasa','Número da casa ','required|trim');
		$this -> form_validation ->set_rules('bairro','Bairro','required|trim');
		$this -> form_validation ->set_rules('cidade','Cidade','required|trim');
		$this -> form_validation ->set_rules('complemento','Complemento','trim|max_length[50]');
		$this -> form_validation ->set_rules('redesocial','Rede social','trim|max_length[50]');
		$this -> form_validation ->set_rules('estado','Estado','required|trim');
		$this -> form_validation ->set_rules('cep','CEP','required|trim');
		$this -> form_validation ->set_rules('email','Email','required|valid_email|trim');
		$this -> form_validation ->set_rules('telcontato','Telefone','required|trim');
		$this -> form_validation ->set_rules('telcontato2','Telefone para recado','required|trim');
		$this -> form_validation ->set_rules('unidade','Unidade ','required|trim');
		$this -> form_validation ->set_rules('setor','Setor','required|trim');
		$this -> form_validation ->set_rules('funcao','Função','required|trim');
		$this -> form_validation ->set_rules('cargo','Cargo ','required|trim');
		$this -> form_validation ->set_rules('nomechefe','Nome do chefe','required|trim');
		$this -> form_validation ->set_rules('emailchefe','Email do chefe','required|valid_email|trim');
		$this -> form_validation ->set_rules('telchefe','Telefone do chefe','required|trim');
		$this -> form_validation ->set_rules('ensino','Forma&ccedil;&atilde;o','required|trim');
		$this -> form_validation ->set_rules('senha','Senha','required|max_length[10]|trim|min_length[6]');
		$this -> form_validation ->set_rules('siapechefe','Siape do chefe','required|max_length[10]|trim');
		$this -> form_validation ->set_rules('repetesenha','Repita a Senha','required|max_length[10]|matches[senha]|trim');
		$this -> form_validation ->set_rules('lembrasenha','Lembrete de Senha','required|max_length[100]|trim');
		if ($this->form_validation->run() == FALSE)
	                {
	                        $this->load->view('servidor/serv_cad');
	                }
	                else
	                {
	                  
	                  $dadoserv=elements(array('nomeserv','sexo','dltnasc','rgl','cpfl','siape','nacilonalidade','naturalidade','estcivil','endereco','numcasa','bairro','cidade','complemento','estado','cep','email','telcontato','telcontato2','redesocial','unidade','setor','funcao','cargo','nomechefe','emailchefe','telchefe','ensino','senha','siapechefe','lembrasenha'),$this->input->post());
	                 $dadoserv['senha'] = MD5($dadoserv['senha']);//coloca a senha em md5 no banco
	                
	                   $this->serv_m->inserir($dadoserv);
	                  
	                
			$this->load->view('servidor/serv_cad');
	
	}
		
		}
		
		
		
	
	
		
	
		public function editar()
		{
			$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
			$this -> form_validation ->set_rules('nomeserv','NOME','required|max_length[100]|trim');
		$this -> form_validation ->set_rules('sexo','sexo','required|max_length[100]|trim');
		$this -> form_validation ->set_rules('dltnasc','Data de nascimento','required');
		$this -> form_validation ->set_rules('rgl','Identidade','required|max_length[15]|trim');
		$this -> form_validation ->set_rules('cpfl','CPF','required|max_length[100]|trim|is_unique[servidor.cpfl]');
		$this -> form_validation ->set_rules('siape','SIAPE','required|max_length[100]|trim');
		$this -> form_validation ->set_rules('nacilonalidade','Nacilonalidade ','required|trim');
		$this -> form_validation ->set_rules('naturalidade','Naturalidade ','required|trim');
		$this -> form_validation ->set_rules('estcivil','Estado Civil ','required|trim');
		$this -> form_validation ->set_rules('endereco','Rua ','required|trim');
		$this -> form_validation ->set_rules('numcasa','Número da casa ','required|trim');
		$this -> form_validation ->set_rules('bairro','Bairro','required|trim');
		$this -> form_validation ->set_rules('cidade','Cidade','required|trim');
		$this -> form_validation ->set_rules('complemento','Complemento','trim');
		$this -> form_validation ->set_rules('redesocial','Rede social','trim|max_length[50]');
		$this -> form_validation ->set_rules('estado','Estado','required|trim');
		$this -> form_validation ->set_rules('cep','CEP','required|trim');
		$this -> form_validation ->set_rules('email','Email','required|valid_email|trim');
		$this -> form_validation ->set_rules('telcontato','Telefone','required|trim');
		$this -> form_validation ->set_rules('telcontato2','Telefone para recado','required|trim');
		$this -> form_validation ->set_rules('unidade','Unidade ','required|trim');
		$this -> form_validation ->set_rules('setor','Setor','required|trim');
		$this -> form_validation ->set_rules('funcao','Função','required|trim');
		$this -> form_validation ->set_rules('cargo','Cargo ','required|trim');
		$this -> form_validation ->set_rules('nomechefe','Nome do chefe','required|trim');
		$this -> form_validation ->set_rules('emailchefe','Email do chefe','required|trim');
		$this -> form_validation ->set_rules('ensino','Forma&ccedil;&atilde;o','required|trim');
		$this -> form_validation ->set_rules('telchefe','Telefone do chefe','required|trim');
		//$this -> form_validation ->set_rules('senha','Senha','required|max_length[10]|trim');
		$this -> form_validation ->set_rules('siapechefe','Siape do chefe','required|max_length[10]|trim');
		//$this -> form_validation ->set_rules('repetesenha','Repita a Senha','required|max_length[10]|matches[senha]|trim');
		//$this -> form_validation ->set_rules('lembrasenha','Lembrete de Senha','required|max_length[100]|trim');
		    if ($this->form_validation->run() == FALSE)
	                {
	                        $this->load->view('servidor/serv_atu');
	                }
	                else
	                {
	                  
	                  $dados=elements(array('nomeserv','sexo','dltnasc','rgl','cpfl','siape','nacilonalidade','naturalidade','estcivil','endereco','numcasa','bairro','cidade','complemento','estado','cep','email','telcontato','telcontato2','redesocial','unidade','setor','funcao','cargo','nomechefe','emailchefe','telchefe','ensino','siapechefe'),$this->input->post());
	                  
	                
	                $this->serv_m->atualizar_do($dados,array('codserv' => $this->input->post('$idserv')));
	             
	                
			$this->load->view('servidor/serv_atu');
	
	}
			}
			
			
	public function alterar_senha()
		{
			$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
			$this -> form_validation ->set_rules('oldsenha','Senha Atual','trim|required|max_length[20]|callback_check_senha');
		$this -> form_validation ->set_rules('senha','Senha','required|max_length[10]|trim|min_length[6]');
		$this -> form_validation ->set_rules('senha2','Repita a Senha','required|max_length[10]|matches[senha]|trim|min_length[6]');
		$this -> form_validation ->set_rules('lembrasenha','Lembrete de Senha','required|max_length[100]|trim');
		    if ($this->form_validation->run() == FALSE)
	                {
	                        $this->load->view('servidor/serv_sen');
	                }
	                else
	                {
	                  
	                  $dados=elements(array('senha','lembrasenha'),$this->input->post());
	                     $dados['senha'] = MD5($dados['senha']);//coloca a senha em md5 no banco
	                
	                $this->serv_m->atualizar_do($dados,array('codserv' => $this->input->post('$idserv')));
	             
	                
			$this->load->view('servidor/serv_sen');
	
	}
			}
			
			
			
			
			
			
			
			
			
			
			function check_senha($password)
 {
   
   $password = $this->input->post('oldsenha');
 
   
   $result = $this->serv_m->confere_senha($password);
 
   if($result)
   {
     $this->form_validation->set_message('check_senha', 'senha ok.');//$this->load->view('admin/admin_sen');
      return true;
   }
   else
   {
     $this->form_validation->set_message('check_senha', 'Senha não confere.');
     return false;
   }
 }
			
			
			
			
			
			
			
			public function deletar()
		{
			 $this->load->view('servidor/serv_del');
			if($this->input->post('$idserv')>0):
	
		 $this->serv_m->deletar_do(array('codserv' => $this->input->post('$idserv')));
		 	
		 endif;
		  
			}
	
	
		public function listar(){
			
			
			 $this->load->library('pagination');
	$maximo = 5;
	$inicio = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");
	$config['base_url'] = base_url('administrador.php/servidor/listar');
	$config['total_rows'] =$this->serv_m->contaRegistros();
	$config['per_page'] =  $maximo;
	$config['first_link'] = 'Primeiro';
	$config['last_link'] = 'Último';
	$config['next_link'] = 'Próximo';
	$config['prev_link'] = 'Anterior';
	$this->pagination->initialize($config);
	
	$datas['page'] = $this->pagination->create_links();
	$datas['query2'] = $this->serv_m->retornaServ($maximo, $inicio);
					
	$this->load->view('servidor/serv_v', $datas);
	
			
			
			}//fimfuncao
	
	}//endcontroler
	
	
