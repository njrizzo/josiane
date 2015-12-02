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




public function editar()
		{
			 $session_data = $this->session->userdata('logged_in');
			 $data['codserv'] = $session_data['codserv'];
 

		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
		$this -> form_validation ->set_rules('nomeserv','NOME','required|max_length[100]|trim');
		$this -> form_validation ->set_rules('sexo','sexo','required|max_length[100]|trim');
		$this -> form_validation ->set_rules('dltnasc','Data de nascimento','required|trim');
		$this -> form_validation ->set_rules('rgl','Identidade','required|trim');
		$this -> form_validation ->set_rules('cpfl','CPF','required|trim');
		$this -> form_validation ->set_rules('siape','SIAPE','required|trim');
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
		//$this -> form_validation ->set_rules('senha','Senha','required|max_length[10]|trim|min_length[6]');
		$this -> form_validation ->set_rules('siapechefe','Siape do chefe','required|max_length[10]|trim');
		//$this -> form_validation ->set_rules('repetesenha','Repita a Senha','required|max_length[10]|matches[senha]|trim');
		//$this -> form_validation ->set_rules('lembrasenha','Lembrete de Senha','required|max_length[100]|trim');
		if ($this->form_validation->run() == FALSE)
	                {
	                        $this->load->view('servidor/dados_atu', $data);
	                }
	                else
	                {
	                  
	                  $dadoserv=elements(array('nomeserv','sexo','dltnasc','rgl','cpfl','siape','nacilonalidade','naturalidade','estcivil','endereco','numcasa','bairro','cidade','complemento','estado','cep','email','telcontato','telcontato2','redesocial','unidade','setor','funcao','cargo','nomechefe','emailchefe','telchefe','ensino','siapechefe'),$this->input->post());
	                 
	                
	                   $this->serv_m->atualizar_do($dadoserv,array('codserv' => $this->input->post('$idserv')));
	                  
	                
			$this->load->view('servidor/dados_atu', $data);
	
	}
	
	
	
	}
	
	
	
	
	
	
	
	
	
	public function alterar_senha()
		{
			$session_data = $this->session->userdata('logged_in');
			$data['codserv'] = $session_data['codserv'];
			$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
			$this -> form_validation ->set_rules('oldsenha','Senha Atual','trim|required|max_length[20]|callback_check_senha');
			$this -> form_validation ->set_rules('senha','Senha','required|max_length[10]|trim|min_length[6]');
			$this -> form_validation ->set_rules('senha2','Repita a Senha','required|max_length[10]|matches[senha]|trim|min_length[6]');
			$this -> form_validation ->set_rules('lembrasenha','Lembrete de Senha','required|max_length[100]|trim');
		    if ($this->form_validation->run() == FALSE)
	                {
	                        $this->load->view('servidor/sen_atu', $data);
	                }
	                else
	                {
	                  
	                  $dados=elements(array('senha','lembrasenha'),$this->input->post());
	                     $dados['senha'] = MD5($dados['senha']);//coloca a senha em md5 no banco
	                
	                $this->serv_m->atualizar_do($dados,array('codserv' => $this->input->post('$idserv')));
	             
	                
			$this->load->view('servidor/sen_atu', $data);
	
	}
			}
			
			
			
			
			
			
			
			
			
			
				
			function check_senha($password)
 {
   
   $password = $this->input->post('oldsenha');
 
   
   $result = $this->serv_m->confere_senha($password);
 
   if($result)
   {
     $this->form_validation->set_message('check_senha', 'senha ok.');
      return true;
   }
   else
   {
     $this->form_validation->set_message('check_senha', 'Senha não confere.');
     return false;
   }
 }





 }//fimcontroler
?>
