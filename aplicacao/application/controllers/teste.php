<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Teste extends CI_Controller {

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
	
	
	   function __construct()
    {
        parent::__construct();
        $this->load->model('teste_m');
    }

	public function index()
	{
		//$this->load->view('olamundo');
		
		//echo __FUNCTION__;
		
	
        $data['titulo'] = "SIRH";
        $data['cabecalho'] = "Bacias Hidrográficas";

        $data['bacias'] = $this->teste_m->get_dad();

        $this->load->view('teste', $data);
    }

}
	
	
	
	
	/*
	public function incluir()
	{
		$this->load->view('olamundo2');
	}
}
*/
