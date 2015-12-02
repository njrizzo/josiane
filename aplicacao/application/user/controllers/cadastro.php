
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cadastro extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
  
   $this->load->model('serv_m');
 $this->load->model('inscricao_m');
   
}

 
 function index()
 {
$this->load->view('servidor/serv_cad');       



}
public function cadastrar()
		
		{
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
		$this -> form_validation ->set_rules('nomeserv','NOME','required|max_length[100]|trim');
		$this -> form_validation ->set_rules('sexo','sexo','required|max_length[100]|trim');
		$this -> form_validation ->set_rules('dltnasc','Data de nascimento','required|trim');
		$this -> form_validation ->set_rules('rgl','Identidade','required|numeric|exact_length[9]|trim');
		$this -> form_validation ->set_rules('cpfl','CPF','required|numeric|exact_length[11]|trim|is_unique[servidor.cpfl]');
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
	                
	                   $this->serv_m->inserir_user($dadoserv);
	                  
	                
			$this->load->view('servidor/serv_cad');
	
	}
		
		}
		
		
public function lembrar_senha(){
	
	$this->load>view('servidor/lembrar_s_view');
	
	}
	
	
	
	
	
	
	
	
	public function conferir(){
		
 
   $this->form_validation->set_rules('chefesiape', 'SIAPE', 'trim|required|callback_check_database');
   
 
   if($this->form_validation->run() == FALSE)
   {
     //validação falhou redicionado para a página de login
     $this->load->view('autorizar/autoz_login');
   }
   else
   {
     //Validação ok!
   
      $chefesiape = $this->input->post('chefesiape');
      $siape=$this->uri->segment("3");

	  //$siape = $this->input->post('siape');
	  $this->serv_m->confereSiape($siape, $chefesiape);
      
      
   }
	
	
	
	}
	
	
	function check_database($siape)
 {
   //verificação no banco de dados
   $siape=$this->uri->segment("3");

//$siape = $this->input->post('siape');
 $chefesiape = $this->input->post('chefesiape');
   //consulta
   $result = $this->serv_m->confereSiape($siape, $chefesiape);
 
   if($result)
   {
    
    	 $this->load->view("autorizar/autorizar_view");
    
    
     return TRUE;
   }
   else
   {
     $this->form_validation->set_message('check_database', 'Siape não confere com o Servidor cadastrado.');
     
     return false;
   }
 }
	
	
	
	
	
	
	
	
	
	
	public function autorizar($sip,$cod){
		
			$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
		$this -> form_validation ->set_rules('situacao','Resposta','required|trim');
		$this -> form_validation ->set_rules('motivo','Justificativa','trim|max_length[100]');
		if ($this->form_validation->run() == FALSE)
	                {
	                        $this->load->view("autorizar/autorizar_view");
	                     
	                        
	                }
	                else
	                {
	                  
                  
	                   $dados=elements(array('situacao'), $this ->input->post());
                  if($dados['situacao']=='negado'):
                  
                  $dados['motivo'] = $this ->input->post('motivo');
                endif;
                $this->inscricao_m->atualizar_do($dados,array('codinscricao' => $this->uri->segment(4)));
	                
			$this->load->view("autorizar/autorizar_view");
	
	}
	
}
	
	
	
	
	
	
	
	
	
 }//endcontroler

