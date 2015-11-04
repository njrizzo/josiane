<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Matricula extends CI_Controller {

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
 $this->load->model('matricula_m');

  $this->load->model('user','',TRUE);
   $this->user->logged();
   
 
}
 
	

	public function index()
	
	{
	


redirect('matricula/listar');



	}
	
	
	public function cadastrar()
	
	{
	$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
	$this -> form_validation ->set_rules('datamat','DATA','required');
	$this -> form_validation ->set_rules('situacao','Estado','required');
	$this -> form_validation ->set_rules('codserv','Servidor','required');
	$this -> form_validation ->set_rules('codturma','Turma','required');
	
	    if ($this->form_validation->run() == FALSE)
                {
                        	$datav['servs'] = $this->matricula_m->retorna_serv();
                        	$datav['turmas'] = $this->matricula_m->retorna_turma();
                        	$this->load->view('matricula/matri_cad', $datav);
                        	

                       
                }
                else
                {
					
                     $dados=elements(array('datamat','codserv','situacao','codturma'), $this ->input->post());
                  
                
                    $this->matricula_m->inserir($dados);
             
                
		$this->load->view('matricula/matri_cad',$data);

}
	
	
	}
	
	
	
	

	


	public function editar()
	{
	$this->form_validation->set_error_delimiters('<span style="color:red">', '</span>');
	$this -> form_validation ->set_rules('datamat','DATA','required');
	$this -> form_validation ->set_rules('situacao','Estado','required');
	$this -> form_validation ->set_rules('codserv','Servidor','required');
	$this -> form_validation ->set_rules('codturma','Turma','required');

	    if ($this->form_validation->run() == FALSE)
                {
					$datav['servs'] = $this->matricula_m->retorna_serv();
                        	$datav['turmas'] = $this->matricula_m->retorna_turma();
                        	$this->load->view('matricula/matri_atu', $datav);
					
                }
                else
                {
             $dados=elements(array('datamat','codserv','situacao','codturma'), $this ->input->post());
                  
                  
                
                $this->matricula_m->atualizar_do($dados,array('codmatricula' => $this->input->post('$idmatri')));
             
                
		$this->load->view('matricula/matri_atu', $datav);

}
		}
		
		
		

		
		public function deletar()
	{
		$datav['servs'] = $this->matricula_m->retorna_serv();
                        	$datav['turmas'] = $this->matricula_m->retorna_turma();
                        	$this->load->view('matricula/matri_del', $datav);
		
   
		if($this->input->post('$idmatri')>0):

	 $this->matricula_m->deletar_do(array('codmatricula' => $this->input->post('$idmatri')));
	 
	 endif;
	  
		}

public function listar(){
			
			
			 $this->load->library('pagination');
	$maximo = 5;
	$inicio = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");
	$config['base_url'] = base_url('index.php/matricula/listar');
	$config['total_rows'] =$this->matricula_m->contaRegistros();
	$config['per_page'] =  $maximo;
	//$config['first_link'] = 'Primeiro';
	//$config['last_link'] = 'Último';
	$config['next_link'] = 'Próximo';
	$config['prev_link'] = 'Anterior';
	$this->pagination->initialize($config);
	
	$datas['page'] = $this->pagination->create_links();
	$datas['query2'] = $this->matricula_m->do_pesquisa($maximo, $inicio);
					
	$this->load->view('matricula/matri_v', $datas);
	
			
			
			}//fimfuncao


public function gerar_cert()
	
	{


  $this->load->library('mpdf/mpdf');
 
  $id = $this->uri->segment(3);
if ($id==NULL) redirect('matricula/index'); 
$query = $this ->matricula_m->atualizar($id)->row();
  

   
 $nome = $query->nome;
 $cargahr  =$query->cargahr; 
 $nomeserv = $query->nomeserv;  
// $nomeserv = ucfirst($nomeserv);  
 setlocale( LC_ALL, 'pt_BR', 'pt_BR.iso-8859-1', 'pt_BR.utf-8', 'portuguese' );

date_default_timezone_set( 'America/Sao_Paulo' );
   $data = strftime( ' %d de %B de %Y', strtotime( date( 'Y-m-d' ) ) );
   $datafim =  strftime( ' %d de %B de %Y',  strtotime( date( 'Y-m-d',strtotime($query->datafim) ) ) );
    $datain =  strftime( '  %d de %B ',  strtotime( date( 'Y-m-d',strtotime($query->datainicio) ) ) );
  $html = '
<style type="text/css">
	<!--
table {
  border-collapse: collapse;
  font-size:30pt; 
 
background-image: url("figuras/fundo.png");
}
 th {
 width: 189px; 

  background-image: url("figuras/lado.png");
  }


-->
</style>
<table border="0"   >
     
     
       <tr   >
<th  rowspan="4"   ></th>
<td width="45"  lign="left"><img src="  '.base_url().'figuras/logor.png"   /></td>
<td   width="745" lign="left"><P>
	<b><h6><font color="#61380B"  >Universidade Federal Rural do Rio de Janeiro<br>
	Decanato de Assuntos Administrativos<br>
	Departamento Pessoal<br>
	Coordenação de Desenvolvimento de pessoas<br> </P></b></font></h6><br></td>
</tr >
 
<tr>
<td  colspan="2" valign="top"  align="center"  ><font color="#61380B" size="7" ><i>Certificado</i></font><br><br><font color="#61380B" size="-1" ><p>Certifico que <strong>'.ucwords($nomeserv).'</strong> , participou do curso <strong>'.$nome.'</strong>, oferecido pela Coordenação de Desenvolviento de Pessoas -DP/DDA, no período de'.$datain.' a '.$datafim.' com carga horaria de '.$cargahr.' horas.<br ></p></font><br></td>
</tr>
<tr>

<td  colspan="2" align="right" valign="top" ><font color="#61380B" size="1">UFRRJ,'.$data.'<br></font>  </td>


</tr>
<tr>

<td   width="745" colspan="2" align="center" valign="top" ><img src="  '.base_url().'figuras/base.png"   />  </td>

<br>
</tr>
</table>






';
 
        


 

$mpdf=new mPDF('utf-8', 'A4-L');

$mpdf->WriteHTML($html);
//Colocando o rodape

$mpdf->Output();
$mpdf->charset_in='windows-1252';
exit;
}




	


	
}//endcontroler

