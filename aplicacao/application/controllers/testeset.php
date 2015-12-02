
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI
class Testeset extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
     $this->load->library('mpdf/mpdf');


   
}

 
 function index()
 {//load our new PHPExcel library
 
    $this->load->model('serv_m');

  //$data = $this->matricula_m->do_pesquisa();
 $query8=$this->serv_m->teste();
  
	$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
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
		$this -> form_validation ->set_rules('ensino','Forma&ccedil;&atilde;o','required');
		$this -> form_validation ->set_rules('telchefe','Telefone do chefe','required');
		//$this -> form_validation ->set_rules('senha','Senha','required|max_length[10]');
		$this -> form_validation ->set_rules('siapechefe','Siape do chefe','required|max_length[10]');
		//$this -> form_validation ->set_rules('repetesenha','Repita a Senha','required|max_length[10]|matches[senha]');
		//$this -> form_validation ->set_rules('lembrasenha','Lembrete de Senha','required|max_length[100]');
		    if ($this->form_validation->run() == FALSE)
	                {
	                        $this->load->view('testeset_view');
	                }
	                else
	                {
	                  
	                  $dados=elements(array('nomeserv','sexo','dltnasc','rgl','cpfl','siape','nacilonalidade','naturalidade','estcivil','endereco','numcasa','bairro','cidade','complemento','estado','cep','email','telcontato','unidade','setor','funcao','cargo','nomechefe','emailchefe','telchefe','ensino','senha','siapechefe','lembrasenha'),$this->input->post());
	                  
	                
	                $this->serv_m->atualizar_do($dados,array('codserv' => $this->input->post('$idserv')));
	             
	                
			$this->load->view('testeset_view');
	
	}
			}
			
			



 }

