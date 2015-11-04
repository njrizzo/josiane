
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//session_start(); //we need to call PHP's session object to access it through CI
class Testeselect extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
    
 $this->load->model('m_teste');

   
}

 public function index()
{
$datav['servs'] = $this->m_teste->retorna_curso();
	$essa = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");
	$datav['turmas'] = $this->m_teste->retorna_turma($essa);
                        	$this->load->view('teste_v', $datav);
}
 
public function carregaturma()
{
	$datav['servs'] = $this->m_teste->retorna_curso();
	$essa = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");
	$datav['turmas'] = $this->m_teste->retorna_turma($essa);
                        	$this->load->view('teste_v', $datav);
	
	}
 
}//fimcontroler
