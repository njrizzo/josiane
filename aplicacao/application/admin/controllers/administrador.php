<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrador extends CI_Controller {

	
	
	public function __construct() {
        parent::__construct();
 
     $this->load->model('Admin_m','admin_m',TRUE);
 $this->admin_m->logged();
 
}
 
	
	
	public function index()
	
	{
	Redirect('administrador/listar');
	}
	public function cadastrar()
	
	{
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
	$this -> form_validation ->set_rules('nome','NOME','trim|required|max_length[100]');
	$this -> form_validation ->set_rules('email','Email','trim|required|max_length[80]');
	$this -> form_validation ->set_rules('usuario','Login','trim|required|max_length[20]');
	$this -> form_validation ->set_rules('senha','Senha','trim|required|max_length[20]');
	$this -> form_validation ->set_rules('senha2','Repita a senha','trim|required|matches[senha]');
	$this -> form_validation ->set_rules('lembrasenha','Lemnrete de senha','trim|required|max_length[80]');
	    if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('admin/admin_cad');
                }
                else
                {
                  
                  $dados=elements(array('nome','email','senha','usuario','lembrasenha'),$this->input->post());
                  $dados['senha'] = MD5($dados['senha']);//coloca a senha em md5 no banco
                
                    $this->admin_m->inserir($dados);
             
                
		$this->load->view('admin/admin_cad');

}
	
	}
	
	
	
	

	
	

	public function editar()
	{
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
	$this -> form_validation ->set_rules('nome','NOME','trim|required|max_length[100]');
	$this -> form_validation ->set_rules('email','Email','trim|required|max_length[80]');
	//$this -> form_validation ->set_rules('usuario','Login','trim|required|max_length[20]');
	//$this -> form_validation ->set_rules('password','Senha','trim|required|max_length[100]');
	//$this -> form_validation ->set_rules('senha2','Repita a senha','trim|required|matches[password]');
	//$this -> form_validation ->set_rules('lembrasenha','Lemnrete de senha','trim|required|max_length[80]');
	    if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('admin/admin_atu');
                }
                else
                {
                  
                  $dados=elements(array('nome','email'),$this->input->post());
                  
                
                $this->admin_m->atualizar_do($dados,array('id' => $this->input->post('$idadm')));
             
                
		$this->load->view('admin/admin_atu');

}
		}
		
		
		
	public function alterar_senha()
	{
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
	$this -> form_validation ->set_rules('usuario','Login','trim|required|max_length[20]');
	$this -> form_validation ->set_rules('oldsenha','Senha Atual','trim|required|max_length[20]|callback_check_senha');
	$this -> form_validation ->set_rules('senha','Nova Senha','trim|required|max_length[20]');
	$this -> form_validation ->set_rules('senha2','Repita a senha','trim|required|matches[senha]');
	$this -> form_validation ->set_rules('lembrasenha','Lembrete de senha','trim|required|max_length[80]');
	    if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('admin/admin_sen');
                }
                else
                {
                  
                  $dados=elements(array('senha','lembrasenha','usuario'),$this->input->post());
                   $dados['senha'] = MD5($dados['senha']);//coloca a senha em md5 no banco
                
                $this->admin_m->atualizar_do($dados,array('id' => $this->input->post('$idadm')));
             
                
		$this->load->view('admin/admin_sen');

}
		}
		
function check_senha($password)
 {
 
   $password = $this->input->post('oldsenha');
 
  
   $result = $this->admin_m->confere_senha($password);
 
   if($result)
   {
     $this->form_validation->set_message('check_senha', 'senha ok.');
   }
   else
   {
     $this->form_validation->set_message('check_senha', 'Senha não confere.');
     return false;
   }
 }
		
		public function deletar()
	{
		 $this->load->view('admin/admin_del');
		if($this->input->post('$idadm')>0):

	 $this->admin_m->deletar_do(array('id' => $this->input->post('$idadm')));
	 	
	 	
	 endif;
	  
		}







public function listar(){
			
			
			
	$datas['query2'] = $this->admin_m->do_pesquisa();
					
	$this->load->view('admin/admin_v', $datas);
	
			
			
			}//endfuncao
	
}//endcontroler

