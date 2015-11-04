<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscricao extends CI_Controller {

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
 $this->load->model('inscricao_m');
 $this->load->model('user','',TRUE);
 $this->user->logged();
   
 
}
 
	

	public function index()
	
	{
	

							//$datav['cursos'] =  $this->inscricao_m->retorna_curso();
                        	
                        	//$this->load->view('inscritos/ins_cad', $datav);
redirect('inscricao/listar');


	}
	
	
	public function cadastrar()
	
	{
	$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
	$this -> form_validation ->set_rules('datains','DATA','required');
	$this -> form_validation ->set_rules('situacao','Estado','required');
	$this -> form_validation ->set_rules('codserv','Servidor','required');
	$this -> form_validation ->set_rules('codturma','Turma','required');
	$this -> form_validation ->set_rules('situacao','Estado','required');
	    if ($this->form_validation->run() == FALSE)
                { 			
					
							$datav['cursos'] =  $this->inscricao_m->retorna_curso();
							$essa = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");
							$datav['turmas'] = $this->inscricao_m->retorna_turma($essa);
                        	$datav['servs'] = $this->inscricao_m->retorna_serv();
                        	
                        	$this->load->view('inscritos/ins_cad', $datav);
                        	

                       
                }
                else
                {
					
                     $dados=elements(array('datains','codserv','situacao','codturma','motivo'), $this ->input->post());
                  
                
                    $this->inscricao_m->inserir($dados);
             
                
		    $this->load->view('inscritos/ins_cad',$datav);

}
	
	
	}
	
	
	
	

	


	public function editar()
	{
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
$this -> form_validation ->set_rules('datains','DATA','required');
	$this -> form_validation ->set_rules('situacao','Estado','required');

	    if ($this->form_validation->run() == FALSE)
                {
							$datav['servs'] = $this->inscricao_m->retorna_serv();
                        	$datav['turmas'] = $this->inscricao_m->retorna_turma_all();
                        	$this->load->view('inscritos/ins_atu', $datav);
					
                }
                else
                {
             $dados=elements(array('datains','codserv','situacao','codturma','motivo'), $this ->input->post());
                  
                  
                
                $this->inscricao_m->atualizar_do($dados,array('codinscricao' => $this->input->post('$idins')));
             
                
		$this->load->view('inscritos/ins_atu', $datav);

}
		}
		
		
		

		
		public function deletar()
	{
		$datav['servs'] = $this->inscricao_m->retorna_serv();
                        	$datav['turmas'] = $this->inscricao_m->retorna_turma();
                        	$this->load->view('inscritos/ins_del', $datav);
		
   
		if($this->input->post('$idins')>0):

	 $this->inscricao_m->deletar_do(array('codinscricao' => $this->input->post('$idins')));
	 
	 endif;
	  
		}

public function listar(){
			
			
			 $this->load->library('pagination');
	$maximo = 5;
	$inicio = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");
	$config['base_url'] = base_url('index.php/inscricao/listar');
	$config['total_rows'] =$this->inscricao_m->contaRegistros();
	$config['per_page'] =  $maximo;
	//$config['first_link'] = 'Primeiro';
	//$config['last_link'] = 'Último';
	$config['next_link'] = 'Próximo';
	$config['prev_link'] = 'Anterior';
	$this->pagination->initialize($config);
	
	$datas['page'] = $this->pagination->create_links();
	$datas['query2'] = $this->inscricao_m->do_pesquisa($maximo, $inicio);
					
	$this->load->view('inscritos/ins_v', $datas);
	
			
			
			}//fimfuncao

public function enviar_email(){
	
$this->load->helper('email');
     //CAPTURA O VALOR DA CAIXA DE TEXTO 'E-mail Remetente'
		//$para = $this->input->post('txt_para', TRUE);    //CAPTURA O VALOR DA CAIXA DE TEXTO 'E-mail de Destino'
		//$msg = $this->input->post('txt_msg', TRUE);      //CAPTURA O VALOR DA CAIXA DE TEXTO 'Mensagem'
		$this->load->library('email');  
		$this->email->initialize(); // Aqui carrega todo config criado anteriormente                 //CARREGA A CLASSE EMAIL DENTRO DA LIBRARY DO FRAMEWORK
		$this->email->from('josiane@pet-si.ufrrj.br', 'Teste');                //ESPECIFICA O FROM(REMETENTE) DA MENSAGEM DENTRO DA CLASSE
		$this->email->to('josidim@gmail.com');                         //ESPECIFICA O DESTINATÁRIO DA MENSAGEM DENTRO DA CLASSE  
		$this->email->subject('Teste de Email');         //ESPECIFICA O ASSUNTO DA MENSAGEM DENTRO DA CLASSE
		$this->email->message('testando emauil foi?');	                 //ESPECIFICA O TEXTO DA MENSAGEM DENTRO DA CLASSE
		$this->email->send();                            //AÇÃO QUE ENVIA O E-MAIL COM OS PARÂMETROS DEFINIDOS ANTERIORMENTE
		echo $this->email->print_debugger();   
	
}








}//endcontroler

