
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Certificado extends CI_Controller {
 
 function __construct()
 {
   parent::__construct();
  
    $this->load->model('Matricula_m','matricula_m');
 
    $this->load->model('Admin_m','admin_m',TRUE);
   $this->admin_m->logged();
   
}

 
 function index()
 {
	 Redirect('certificado/listar');
  

}
public function listar(){
			
			
			 $this->load->library('pagination');
	$maximo = 8;
	$inicio = (!$this->uri->segment("3")) ? 0 : $this->uri->segment("3");
	$config['base_url'] = base_url('administrador.php/certificado/listar');
	$config['total_rows'] =$this->matricula_m->contaRegistros_certificados();
	$config['per_page'] =  $maximo;
	//$config['first_link'] = 'Primeiro';
	//$config['last_link'] = 'Último';
	$config['next_link'] = 'Próximo';
	$config['prev_link'] = 'Anterior';
	$this->pagination->initialize($config);
	
	$datas['page'] = $this->pagination->create_links();
	$datas['query2'] = $this->matricula_m->do_pesquisa_certificados($maximo, $inicio);
					
	$this->load->view('certificado_v', $datas);
	
			
			
			}//fimfuncao
public function gerar()
	
	{

date_default_timezone_set( 'America/Sao_Paulo' );

$dados=array(
	'data' =>  $data = date('Y-m-d'),
	'chave'=>$chave = sha1(uniqid( mt_rand(), true))
	  );
	      
	                
	                   $this->matricula_m->chave_inserir($dados);
  
 $this->load->library("mpdf/mPDF");
  $id = $this->uri->segment(3);
if ($id==NULL) Redirect('matricula/index'); 
$query = $this ->matricula_m->atualizar($id)->row();
  

   
 $nome = $query->nome;
 $nmodulo = $query->modulo;
 $cargahr  =$query->cargahr; 
 $nomeserv = $query->nomeserv;  
// $nomeserv = ucfirst($nomeserv);  
 //setlocale( LC_ALL, 'pt_BR', 'pt_BR', 'pt_BR.utf-8', 'portuguese' );

   $dataEmitido = strftime( ' %d de %B de %Y', strtotime( date( 'Y-m-d' ) ) );
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
<td width="45"  align="left"><img src="figuras/logor.png"   /></td>
<td   width="745" lign="left"><P>
	<b><h6><font color="#61380B"  >Universidade Federal Rural do Rio de Janeiro<br>
	Decanato de Assuntos Administrativos<br>
	Departamento Pessoal<br>
	Coordenação de Desenvolvimento de pessoas<br> </P></b></font></h6><br></td>
</tr >
 
<tr>
<td  colspan="2" valign="top"  align="center"  ><font color="#61380B" size="7" ><i>Certificado</i></font><br><br><font color="#61380B" size="-1" ><p>Certifico que <strong>'.ucwords($nomeserv).'</strong> , participou do curso <strong>'.$nome.'</strong>,  módulo  <strong>'.$nmodulo.'</strong>, oferecido pela Coordenação de Desenvolviento de Pessoas -DP/DDA, no período de'.$datain.' a '.$datafim.' com carga horaria de '.$cargahr.' horas.<br ></p></font><br></td>
</tr>
<tr>

<td  colspan="2" align="right" valign="top" ><font color="#61380B" size="1">UFRRJ,'.$dataEmitido.'<br></font>  </td>


</tr>
<tr>

<td   width="745" colspan="2" align="center" valign="top" ><img src="figuras/base.png"   /><font color="#61380B" size="1">  Código de Autenticação: '.$chave.' </font></td>

<br>
</tr>
</table>






';
 
        


 

$certificado=new mPDF('utf-8', 'A4-L');

$certificado->WriteHTML($html);
//Colocando o rodape

$certificado->Output();
$certificado->charset_in='windows-1252';
exit;
}







 }

