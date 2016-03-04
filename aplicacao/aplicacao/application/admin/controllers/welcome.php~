<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
	public function index()
	{
		$this->load->model("m_departamentos_produtos");
		
		$departamentos = $this->m_departamentos_produtos->retorna_departamentos();
		
		$option = "<option value=''></option>";
		foreach($departamentos -> result() as $linha) {
			$option .= "<option value='$linha->codcurso'>$linha->modulo</option>";			
		}
		
		$variaveis['options_departamentos'] = $option;
		
		$this->load->view('welcome_message', $variaveis);
	}
	public function busca_produtos_by_departamento($id){
		
		$this->load->model("m_departamentos_produtos");
		
		$produtos = $this->m_departamentos_produtos->retorna_produtos_by_departamento();
		
		$option = "<option value=''></option>";
		foreach($produtos -> result() as $linha) {
			$option .= "<option value='$linha->codturma'>$linha->nometurma</option>";			
		}
		
		echo $option;
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */
