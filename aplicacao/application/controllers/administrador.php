<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {

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
 
  $this->load->model('user','',TRUE);
 $this->user->logged();
 
}
 
	
	
	public function index()
	
	{
	redirect('administrador/listar');
	}
	public function cadastrar()
	
	{
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
	$this -> form_validation ->set_rules('nome','NOME','trim|required|max_length[100]');
	$this -> form_validation ->set_rules('username','Login','trim|required|max_length[10]');
	$this -> form_validation ->set_rules('password','Senha','trim|required|max_length[100]');
	$this -> form_validation ->set_rules('senha2','Repita a senha','trim|required|matches[password]');
	$this -> form_validation ->set_rules('lembrasenha','Lemnrete de senha','trim|required|max_length[80]');
	    if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('admin/admin_cad');
                }
                else
                {
                  
                  $dados=elements(array('nome','password','username','lembrasenha'),$this->input->post());
                  $dados['password'] = MD5($dados['password']);//coloca a senha em md5 no banco
                
                    $this->user->inserir($dados);
             
                
		$this->load->view('admin/admin_cad');

}
	
	}
	
	
	
	

	
	

	public function editar()
	{
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
	$this -> form_validation ->set_rules('nome','NOME','trim|required|max_length[100]');
	$this -> form_validation ->set_rules('username','Login','trim|required|max_length[10]');
	//$this -> form_validation ->set_rules('password','Senha','trim|required|max_length[100]');
	//$this -> form_validation ->set_rules('senha2','Repita a senha','trim|required|matches[password]');
	//$this -> form_validation ->set_rules('lembrasenha','Lemnrete de senha','trim|required|max_length[80]');
	    if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('admin/admin_atu');
                }
                else
                {
                  
                  $dados=elements(array('nome','username'),$this->input->post());
                  
                
                $this->user->atualizar_do($dados,array('id' => $this->input->post('$idadm')));
             
                
		$this->load->view('admin/admin_atu');

}
		}
		
		
		

		
		public function deletar()
	{
		 $this->load->view('admin/admin_del');
		if($this->input->post('$idadm')>0):

	 $this->user->deletar_do(array('id' => $this->input->post('$idadm')));
	 	
	 	
	 endif;
	  
		}







public function listar(){
			
			
			
	$datas['query2'] = $this->user->do_pesquisa();
					
	$this->load->view('admin/admin_v', $datas);
	
			
			
			}//endfuncao
	
}//endcontroler

