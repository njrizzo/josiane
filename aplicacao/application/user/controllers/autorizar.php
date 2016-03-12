
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Autorizar extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
  
 $this->load->model('Inscricao_m','inscricao_m',TRUE);
 $this->inscricao_m->logged();
 
}

 
 function index()
 {
	  $session_data = $this->session->userdata('loggedd');
$this->load->view("autorizar/autorizar_view", $session_data);     



}

	
function logout()
 {
   $this->session->unset_userdata('loggedd');
   session_destroy();
 
   Redirect('login', 'Refresh');
 }	
	
	
	
	
	
	//autorizacao do chefe, inscricao no curso 
	public function confirmar($sip,$cod){
		
			$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
		$this -> form_validation ->set_rules('situacao','Resposta','required|trim');
		$this -> form_validation ->set_rules('justificativa','Justificativa','trim|max_length[100]');
		if ($this->form_validation->run() == FALSE)
	                {
						
							 $session_data = $this->session->userdata('logged_autrz');
     

	                        $this->load->view('autorizar/autorizar_view',$session_data);
	                     
	                        
	                }
	                else
	                {
	                  
                  
	                   $dados=elements(array('situacao'), $this ->input->post());
                  if($dados['situacao']=='negado')://se for negado apresentar justificativa
                  
                  $dados['justificativa'] = $this ->input->post('justificativa');
                endif;
                $this->inscricao_m->atualizar_do($dados,array('codinscricao' => $this->uri->segment(4)));
	          
			$this->load->view('autorizar/autorizar_view',$session_data);
	
	}
	
}
	
	
	
	
	
	
	
	
	
 }//endcontroler

?>
