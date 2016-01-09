<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso extends CI_Controller {

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
 $this->load->model('Curso_m','curso_m');
     $this->load->model('Admin_m','admin_m',TRUE);
   $this->admin_m->logged();
 
}
 
	
	
	public function index()
	
	{
	Redirect('curso/listar');
	}
	public function cadastrar()
	
	{
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
	$this -> form_validation ->set_rules('nome','NOME','trim|required|max_length[100]');
	$this -> form_validation ->set_rules('modulo','Modulo','trim|required|max_length[100]');
	$this -> form_validation ->set_rules('descricao','Descrição','trim|required|max_length[100]');
	$this -> form_validation ->set_rules('cargahr','Carga horária','trim|required|numeric');
	$this -> form_validation ->set_rules('areatema','Área temática','trim|required|max_length[100]');
	$this -> form_validation ->set_rules('competencia','Competência','trim|required|max_length[100]');
	$this -> form_validation ->set_rules('estado','Estado','trim|required');
	    if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('curso/curso_cad');
                }
                else
                {
                  
                  $dados=elements(array('nome','modulo','descricao','cargahr','areatema','competencia','estado'),$this->input->post());
                  
                
                    $this->curso_m->inserir($dados);
             
                
		$this->load->view('curso/curso_cad');

}
	
	}
	
	
	
	

	
	public function consultar()
	{
		$data['cursos'] = $this->curso_m->selecionar();

        $this->load->view('curso/curso_pes', $data);	


	
		}

	public function editar()
	{
		$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
	$this -> form_validation ->set_rules('nome','NOME','trim|required|max_length[100]');
	$this -> form_validation ->set_rules('modulo','Modulo','trim|required|max_length[100]');
	$this -> form_validation ->set_rules('descricao','Descrição','trim|required|max_length[100]');
	$this -> form_validation ->set_rules('cargahr','Carga horária','trim|required|numeric');
	$this -> form_validation ->set_rules('areatema','Área temática','trim|required|max_length[100]');
	$this -> form_validation ->set_rules('competencia','Competência','trim|required|max_length[100]');
	$this -> form_validation ->set_rules('estado','Estado','trim|required');
	    if ($this->form_validation->run() == FALSE)
                {
                        $this->load->view('curso/curso_atu');
                }
                else
                {
                  
                  $dados=elements(array('nome','modulo','descricao','cargahr','areatema','competencia','estado'),$this->input->post());
                  
                
                $this->curso_m->atualizar_do($dados,array('codcurso' => $this->input->post('$idcurso')));
             
                
		$this->load->view('curso/curso_atu');

}
		}
		
		
		

		
		public function deletar()
	{
		 $this->load->view('curso/curso_del');
		if($this->input->post('$idcurso')>0):

	 $this->curso_m->deletar_do(array('codcurso' => $this->input->post('$idcurso')));
	 	// else:
	 	 //$this->curso_m->deletar_do(array('codcurso' => $this->input->post('$idcurso')));
	 	
	 endif;
	  
		}







public function listar(){
			
			
			 $this->load->library('pagination');
	$maximo = 4;
	$inicio = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");
	$config['base_url'] = base_url('administrador.php/curso/listar');
	$config['total_rows'] =$this->curso_m->contaRegistros();
	$config['per_page'] =  $maximo;
	$config['first_link'] = 'Primeiro';
	$config['last_link'] = 'Último';
	$config['next_link'] = 'Próximo';
	$config['prev_link'] = 'Anterior';
	$this->pagination->initialize($config);
	
	$datas['page'] = $this->pagination->create_links();
	$datas['query2'] = $this->curso_m->do_pesquisa($maximo, $inicio);
					
	$this->load->view('curso/curso_v', $datas);
	
			
			
			}//endfuncao
	
}//endcontroler

